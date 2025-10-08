<?php

namespace App\Services;

use App\Models\CongeAvailability;
use App\Models\Fonctionnaire;
use App\Models\Relicat;
use App\Models\TypeConge;
use Carbon\Carbon;

class CongeAvailabilityService
{
    /**
     * Update or create congé availability records for a fonctionnaire
     * 
     * @param int $fonctionnaireId
     * @param int $typeCongeId
     * @param int $year
     * @param int $joursUtilises
     * @return CongeAvailability
     */
    public function updateAvailability(int $fonctionnaireId, int $typeCongeId, int $year, int $joursUtilises = 0): CongeAvailability
    {
        $fonctionnaire = Fonctionnaire::findOrFail($fonctionnaireId);
        $typeConge = TypeConge::findOrFail($typeCongeId);
        $joursTotalParAn = $typeConge->jours;
        
        // Get or create availability records for all years from 2025 to the current year
        $startYear = 2025;
        $endYear = max($year, date('Y'));
        
        // Initialize carry-over days
        $joursReportes = 0;
        
        for ($currentYear = $startYear; $currentYear <= $endYear; $currentYear++) {
            // Get or create the availability record for this year
            $availability = CongeAvailability::firstOrNew([
                'fonctionnaire_id' => $fonctionnaireId,
                'type_conge_id' => $typeCongeId,
                'year' => $currentYear,
            ]);
            
            // Set the total days for this year
            $availability->jours_total = $joursTotalParAn;
            
            // Set the carried over days from the previous year
            $availability->jours_reportes = $joursReportes;
            
            // Calculate total available days
            $availability->jours_disponibles = $joursTotalParAn + $joursReportes;
            
            // Calculate days used for this year
            if ($currentYear == $year) {
                // For the target year, add the new days used
                $availability->jours_utilises += $joursUtilises;
            } else {
                // For other years, calculate from relicats
                $joursDejaUtilises = $this->calculateDaysUsed($fonctionnaireId, $typeCongeId, $currentYear);
                $availability->jours_utilises = $joursDejaUtilises;
            }
            
            // Calculate remaining days
            $availability->jours_restants = $availability->jours_disponibles - $availability->jours_utilises;
            
            // Save the availability record
            $availability->save();
            
            // Carry over remaining days to the next year
            $joursReportes = max(0, $availability->jours_restants);
        }
        
        // Return the availability record for the requested year
        return CongeAvailability::where([
            'fonctionnaire_id' => $fonctionnaireId,
            'type_conge_id' => $typeCongeId,
            'year' => $year,
        ])->first();
    }
    
    /**
     * Calculate days used for a specific year
     * 
     * @param int $fonctionnaireId
     * @param int $typeCongeId
     * @param int $year
     * @return int
     */
    private function calculateDaysUsed(int $fonctionnaireId, int $typeCongeId, int $year): int
    {
        $joursUtilises = 0;
        
        // Get all relicats for this fonctionnaire, type of congé, and year
        $relicats = Relicat::where('fonctionnaire_id', $fonctionnaireId)
            ->where('type_conge_id', $typeCongeId)
            ->whereNotNull('date_conge')
            ->get();
        
        foreach ($relicats as $relicat) {
            $relicatYear = Carbon::parse($relicat->date_conge)->year;
            
            if ($relicatYear == $year) {
                $joursUtilises += $relicat->nbr_jours_disponibles;
            }
        }
        
        return $joursUtilises;
    }
    
    /**
     * Check if there are enough days available for a congé
     * 
     * @param int $fonctionnaireId
     * @param int $typeCongeId
     * @param int $year
     * @param int $joursRequested
     * @return bool
     */
    public function hasEnoughDaysAvailable(int $fonctionnaireId, int $typeCongeId, int $year, int $joursRequested): bool
    {
        // Get or update the availability record
        $availability = $this->updateAvailability($fonctionnaireId, $typeCongeId, $year);
        
        // Check if there are enough days available
        return $availability->jours_restants >= $joursRequested;
    }
    
    /**
     * Get the number of days available for a congé
     * 
     * @param int $fonctionnaireId
     * @param int $typeCongeId
     * @param int $year
     * @return int
     */
    public function getDaysAvailable(int $fonctionnaireId, int $typeCongeId, int $year): int
    {
        // Get or update the availability record
        $availability = $this->updateAvailability($fonctionnaireId, $typeCongeId, $year);
        
        // Return the number of days available
        return $availability->jours_restants;
    }
    
    /**
     * Get all availabilities for a fonctionnaire
     * 
     * @param int $fonctionnaireId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllAvailabilities(int $fonctionnaireId)
    {
        return CongeAvailability::where('fonctionnaire_id', $fonctionnaireId)
            ->orderBy('year', 'asc')
            ->orderBy('type_conge_id', 'asc')
            ->get();
    }
}

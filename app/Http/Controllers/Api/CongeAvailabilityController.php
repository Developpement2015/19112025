<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CongeAvailability;
use App\Services\CongeAvailabilityService;
use Illuminate\Http\Request;

class CongeAvailabilityController extends Controller
{
    /**
     * The CongeAvailabilityService instance.
     *
     * @var CongeAvailabilityService
     */
    protected $congeAvailabilityService;

    /**
     * Create a new controller instance.
     *
     * @param CongeAvailabilityService $congeAvailabilityService
     * @return void
     */
    public function __construct(CongeAvailabilityService $congeAvailabilityService)
    {
        $this->congeAvailabilityService = $congeAvailabilityService;
    }

    /**
     * Get the availability for a fonctionnaire, type of congé, and year.
     *
     * @param int $fonctionnaireId
     * @param int $typeCongeId
     * @param int $year
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAvailability($fonctionnaireId, $typeCongeId, $year)
    {
        // Get or update the availability record
        $availability = $this->congeAvailabilityService->updateAvailability($fonctionnaireId, $typeCongeId, $year);

        // Return the availability data
        return response()->json([
            'fonctionnaire_id' => $availability->fonctionnaire_id,
            'type_conge_id' => $availability->type_conge_id,
            'year' => $availability->year,
            'jours_total' => $availability->jours_total,
            'jours_reportes' => $availability->jours_reportes,
            'jours_disponibles' => $availability->jours_disponibles,
            'jours_utilises' => $availability->jours_utilises,
            'jours_restants' => $availability->jours_restants,
        ]);
    }
}

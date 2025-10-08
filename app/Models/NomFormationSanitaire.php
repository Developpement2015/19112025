<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class NomFormationSanitaire extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'nom',
        'nom_arabe',
        'niveau_categorie_formation_id',
        'arrondissement_commune_id'
    ];

    protected $with = ['arrondissement_commune.ville.region', 'niveaucategorieformation.type_categorie_formation.categorieFormation'];

    public function niveaucategorieformation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(NiveauCategorieFormation::class, 'niveau_categorie_formation_id');
    }

    public function arrondissement_commune(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ArrondissementCommune::class, 'arrondissement_commune_id');
    }

    /**
     * Get the region name and its Arabic translation.
     *
     * @return string
     */
    // public function getRegionAttribute(): string
    // {
    //     // Check if 'ville' and 'region' are loaded
    //     if ($this->ville && $this->ville->region) {
    //         return $this->ville->region->nom . ' - ' . $this->ville->region->nom_arabe;
    //     }
    //     return 'Region not available';
    // }

    /**
     * Get the formatted ville information including its Arabic translation.
     *
     * @return string
     */
    // public function getVilleAttribute(): string
    // {
    //     // Check if 'ville' is loaded
    //     if ($this->ville) {
    //         // return $this->ville->nom . ' - ' . $this->ville->nom_arabe;
    //     }
    //     return 'Ville not available';
    // }

    /**
     * Get the formatted niveau formation information.
     *
     * @return string
     */
    public function getNiveauFormationAttribute(): string
    {
        return optional($this->niveaucategorieformation)->nom . ' - ' . optional($this->niveaucategorieformation)->nom_arabe
        . '<br>' . optional(optional($this->niveaucategorieformation)->type_categorie_formation)->nom . ' - ' . optional(optional($this->niveaucategorieformation)->type_categorie_formation)->nom_arabe
        . '<br>' . optional(optional(optional($this->niveaucategorieformation)->type_categorie_formation)->categorieFormation)->nom . ' - ' . optional(optional(optional($this->niveaucategorieformation)->type_categorie_formation)->categorieFormation)->nom_arabe;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Nom Formation Sanitaire');
    }
}

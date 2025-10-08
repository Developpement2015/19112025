<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class NiveauCategorieFormation extends Model

{
    use HasFactory, LogsActivity;


    protected $fillable = [
        'nom',
        'nom_arabe',
        'type_categorie_formation_id',
    ];

    public function type_categorie_formation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TypeCategorieFormation::class);
    }



    public function getNiveauFormationAttribute(): string
    {
        // Format your output as needed
        return "{$this->nom} - {$this->nom_arabe} | {$this->type_categorie_formation->nom} - {$this->type_categorie_formation->nom_arabe} | {$this->type_categorie_formation->categorieFormation->nom} - {$this->type_categorie_formation->categorieFormation->nom_arabe}";
    }


    protected static $logAttributes = ['*'];

    protected static $logName = 'Niveau Categorie Formation';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Niveau Categorie Formation');
    }
}

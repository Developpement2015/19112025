<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class FormationArrondissementCommune extends Model
{
    // $table->foreignId('categorie_formations_id')->constrained()->onDelete('cascade');
    // $table->foreignId('arrondissement_communes_id')->constrained()->onDelete('cascade');
    use HasFactory, LogsActivity;


    protected $fillable = [
        'categorie_formations_id',
        'arrondissement_communes_id',
    ];

    public function categorie_formations(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CategorieFormation::class, 'categorie_formations_id');
    }

    public function arrondissement_communes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ArrondissementCommune::class, 'arrondissement_communes_id');
    }


    protected static $logAttributes = ['*'];

    protected static $logName = 'Formation Arrondissement Commune';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Formation Arrondissement Commune');
    }

}

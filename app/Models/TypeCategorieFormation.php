<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class TypeCategorieFormation extends Model
{    use HasFactory, LogsActivity;


    protected $fillable = [
        'nom',
        'nom_arabe',
        'categorie_formation_id',
    ];

    public function categorieFormation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CategorieFormation::class);
    }



    protected static $logAttributes = ['*'];

    protected static $logName = 'Type Categorie Formation';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Type Categorie Formation');
    }

}

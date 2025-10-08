<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ArrondissementCommune extends Model
{
    // $table->string('nom');
    // $table->string('nom_arabe');



    use HasFactory, LogsActivity;


    protected $fillable = [
        "nom",
        'nom_arabe',
        "ville_id",
    ];


    public function ville(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }




    protected static $logAttributes = ['*'];

    protected static $logName = 'Les arrondissements et les communes';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Les arrondissements et les communes');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class EtatPriseCesation extends Model
{


    use HasFactory, LogsActivity;


    protected $fillable = [
        "fonctionnaire_id",
        "date_cesation",
        "date_prise",
    ];


    /**
     * Retourne la demande de congé liée à ce congé.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fonctionnaire(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Fonctionnaire::class, 'fonctionnaire_id');
    }


    protected static $logAttributes = ['*'];

    protected static $logName = 'Etat Prise Cesation';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Etat Prise Cesation');
    }//


}

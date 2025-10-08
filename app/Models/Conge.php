<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Conge extends Model
{
    use HasFactory, LogsActivity;


    protected $fillable = [
        "demande_conges_id",
    ];


    /**
     * Retourne la demande de congé liée à ce congé.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function demande_conges(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DemandeConge::class, 'demande_conges_id');
    }


    protected static $logAttributes = ['*'];

    protected static $logName = 'Congé';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Congé');
    }//
}

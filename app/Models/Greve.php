<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Greve extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'fonctionnaire_id',
        'date_debut',
        'date_fin',
        'nombre_jours',
        'remarque',
    ];

    public function fonctionnaire()
    {
        return $this->belongsTo(Fonctionnaire::class, 'fonctionnaire_id');
    }

    /**
     * Calculate the number of days between date_debut and date_fin
     */
    public function calculateNombreJours()
    {
        if ($this->date_debut && $this->date_fin) {
            $dateDebut = \Carbon\Carbon::parse($this->date_debut);
            $dateFin = \Carbon\Carbon::parse($this->date_fin);
            return $dateDebut->diffInDays($dateFin) + 1; // +1 to include both start and end dates
        }
        return null;
    }

    /**
     * Get the nombre_jours attribute, calculating it if not set
     */
    public function getNombreJoursAttribute($value)
    {
        if ($value !== null) {
            return $value;
        }
        return $this->calculateNombreJours();
    }

    protected static $logAttributes = ['*'];
    protected static $logName = 'Grève';
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Grève');
    }
}

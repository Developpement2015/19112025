<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class CongeAvailability extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'fonctionnaire_id',
        'type_conge_id',
        'year',
        'jours_total',
        'jours_reportes',
        'jours_disponibles',
        'jours_utilises',
        'jours_restants'
    ];

    /**
     * Get the fonctionnaire that owns this availability record.
     */
    public function fonctionnaire(): BelongsTo
    {
        return $this->belongsTo(Fonctionnaire::class, 'fonctionnaire_id');
    }

    /**
     * Get the type of congé associated with this availability record.
     */
    public function typeConge(): BelongsTo
    {
        return $this->belongsTo(TypeConge::class, 'type_conge_id');
    }

    /**
     * Get the activity log options for the model.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Congé Availability');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class CongeDecision extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'fonctionnaire_id',
        'type_conge_id',
        'nombre_jours',
        'date_debut',
        'date_fin',
        'date_decision',
        'numero_decision',
        'remarques',
        'statut',
        'fichier_decision',
        'ampliations'
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'date_decision' => 'date',
        'ampliations' => 'array',
    ];

    /**
     * Get the fonctionnaire that owns this decision.
     */
    public function fonctionnaire(): BelongsTo
    {
        return $this->belongsTo(Fonctionnaire::class, 'fonctionnaire_id');
    }

    /**
     * Get the type of congé associated with this decision.
     */
    public function typeConge(): BelongsTo
    {
        return $this->belongsTo(TypeConge::class, 'type_conge_id');
    }

    /**
     * Activity log configuration
     */
    protected static $logAttributes = ['*'];
    protected static $logName = 'Décision Congé';
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Décision Congé');
    }

    /**
     * Scope for filtering by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('statut', $status);
    }

    /**
     * Scope for filtering by type of congé
     */
    public function scopeByTypeConge($query, $typeCongeId)
    {
        return $query->where('type_conge_id', $typeCongeId);
    }

    /**
     * Scope for filtering by date range
     */
    public function scopeByDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('date_decision', [$startDate, $endDate]);
    }

    /**
     * Get formatted decision number
     */
    public function getFormattedDecisionNumberAttribute()
    {
        return "Décision N° {$this->numero_decision}";
    }

    /**
     * Get status badge class for UI
     */
    public function getStatusBadgeClassAttribute()
    {
        return match($this->statut) {
            'approuve' => 'badge-success',
            'en_attente' => 'badge-warning',
            'refuse' => 'badge-danger',
            default => 'badge-secondary'
        };
    }

    /**
     * Get status label in French
     */
    public function getStatusLabelAttribute()
    {
        return match($this->statut) {
            'approuve' => 'Approuvé',
            'en_attente' => 'En attente',
            'refuse' => 'Refusé',
            default => 'Inconnu'
        };
    }
}

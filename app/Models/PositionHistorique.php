<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class PositionHistorique extends Model
{
    use HasFactory, LogsActivity;



    protected $fillable = [
        'fonctionnaire_id',
        'ancien_position_id',
        'nouveaux_position_id',
        'date_cessation_service',
        'date_prise_en_service',
        'remarque',
        'date_note',
        'ref_note',
        'fichiers_notes',
        'type',
        'type_certificate_id',
        'type_conge_id',

    ];

    public function fonctionnaire(): BelongsTo
    {
        return $this->belongsTo(Fonctionnaire::class,'fonctionnaire_id');
    }

    public function ancienPosition(): BelongsTo
    {
        return $this->belongsTo(Position::class,'ancien_position_id');
    }

    public function nouveauxPosition(): BelongsTo
    {
        return $this->belongsTo(Position::class,'nouveaux_position_id');
    }

    public function typeCertificate(): BelongsTo
    {
        return $this->belongsTo(TypeCertificate::class,'type_certificate_id');
    }

    public function typeConge(): BelongsTo
    {
        return $this->belongsTo(TypeConge::class,'type_conge_id');
    }





    protected static $logAttributes = ['*'];

    protected static $logName = 'PositionHistorique';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('PositionHistorique');
    }

}

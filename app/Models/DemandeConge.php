<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class DemandeConge extends Model
{


    use HasFactory, LogsActivity;


    protected $fillable = [
        'fonctionnaire_id',
        'type_conge_id',
        'date_demande',
        'date_debut',
        'demande',
    ];


    public function type_conge(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TypeConge::class, 'type_conge_id');
    }


    public function fonctionnaire(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Fonctionnaire::class, 'fonctionnaire_id');
    }




    protected static $logAttributes = ['*'];

    protected static $logName = 'Demande Congé';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Demande Congé');
    }

}

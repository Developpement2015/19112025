<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class FichiersFonctionnaire extends Model
{

    use HasFactory, LogsActivity;


    protected $fillable = [
        'nom',
        'nom_arabe',
        'url',
        'fonctionnaire_id',
        'date_note',
    ];

    public function fonctionnaire(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Fonctionnaire::class, 'fonctionnaire_id');
    }


    protected static $logAttributes = ['*'];

    protected static $logName = 'Fichiers Fonctionnaire';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Fichiers Fonctionnaire');
    }




}

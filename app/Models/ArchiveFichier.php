<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ArchiveFichier extends Model
{
    use HasFactory, LogsActivity;


    protected $fillable = [
        "nom",
        "nom_arabe",
        "date",
        "url_fichier",
        "observation",
        "fonctionnaires_id",
    ];

    public function fonctionnaires(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Fonctionnaire::class, 'fonctionnaires_id');
    }


    protected static $logAttributes = ['*'];

    protected static $logName = 'Archive Fichier';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Archive Fichier');
    }



}

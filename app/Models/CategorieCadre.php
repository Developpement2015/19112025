<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class CategorieCadre extends Model
{
    use HasFactory, LogsActivity;


    protected $fillable = [
        'nom',
        'nom_arabe',
        'parent_id',
    ];

        public function parent()
        {
            return $this->belongsTo(CategorieCadre::class, 'parent_id');
        }

        public function children()
        {
            return $this->hasMany(CategorieCadre::class, 'parent_id');
        }

        public function cadres()
        {
            return $this->hasMany(Cadre::class);
        }



    protected static $logAttributes = ['*'];

    protected static $logName = 'Categorie Cadre';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Categorie Cadre');
    }

}

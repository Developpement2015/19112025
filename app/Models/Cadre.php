<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Cadre extends Model
{
    // $table->string('nom');
    // $table->string('nom_arabe');
    // $table->foreignId('categorie_cadre_id')->constrained()->onDelete('cascade');
    use HasFactory, LogsActivity;


    protected $fillable = [
        'nom',
        'nom_arabe',
        'categorie_cadre_id',
    ];



    public function categorie_cadre(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(CategorieCadre::class, 'categorie_cadre_id');
    }


    public function grades(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(GradeCadre::class);
    }

    protected static $logAttributes = ['*'];

    protected static $logName = 'Cadre';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Cadre');
    }
}

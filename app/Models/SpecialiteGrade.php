<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
class SpecialiteGrade extends Model
{
    use HasFactory, LogsActivity;


    protected $fillable = [
        'nom',
        'nom_arabe',
        'grade_id',
    ];



    public function grade(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(GradeCadre::class, 'grade_id');
    }

    public function fonctionnaires(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Fonctionnaire::class);
    }

    protected static $logAttributes = ['*'];

    protected static $logName = 'Spécialité Grade';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Spécialité Grade');
    }

}

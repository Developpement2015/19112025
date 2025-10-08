<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Grade extends Model
{
    use HasFactory, LogsActivity;


    protected $fillable = [
        'nom',
        'nom_arabe',
    ];


    public function specialite_grades(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(SpecialiteGrade::class);
    }

    protected static $logAttributes = ['*'];

    protected static $logName = 'Grade';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Grade');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Option extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'nom',
        'nom_arabe',
    ];

    public function stages()
    {
        return $this->hasMany(Stage::class);
    }

    protected static $logAttributes = ['*'];
    protected static $logName = 'Option';
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Option');
    }
}

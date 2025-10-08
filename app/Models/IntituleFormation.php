<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class IntituleFormation extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'intitule_formations';

    protected $fillable = [
        'nom',
        'description',
        'actif'
    ];

    protected $casts = [
        'actif' => 'boolean',
    ];

    // Relations
    public function stages()
    {
        return $this->hasMany(Stage::class);
    }

    protected static $logAttributes = ['*'];
    protected static $logName = 'IntituleFormation';
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('IntituleFormation');
    }
}

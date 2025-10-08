<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $table = "activity_log";


    protected $fillable = [
        'log_name',
        'causer_id',
        'causer_type',
        'description',
        'subject_id',
        'subject_type',
        'properties',
    ];


    public function causer()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }
}

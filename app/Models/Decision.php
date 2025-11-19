<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_id',
        'type',
        'data',
        'numero_decision',
        'fichier_decision',
        'observations'
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}

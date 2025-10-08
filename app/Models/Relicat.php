<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Relicat extends Model
{
    use HasFactory;

    protected $fillable = [
        'fonctionnaire_id',
        'type_conge_id',
        'nbr_jours_disponibles',
        'date_conge',
        'annee',
        'is_additif',
        'document'
    ];
    


    public function fonctionnaire(): BelongsTo
    {
        return $this->belongsTo(Fonctionnaire::class, 'fonctionnaire_id');
    }

    public function typeConge(): BelongsTo
    {
        return $this->belongsTo(TypeConge::class, 'type_conge_id');
    }
}

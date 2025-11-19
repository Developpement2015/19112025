<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'fonctionnaire_id', 'ppr', 'nom', 'prenom', 'cin', 'password', 'email_fonctionnaire', 'nom_formation_sanitaire_id', 'type_demande', 'data', 'status', 'approval_level', 'decision_id', 'numero_demande'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function fonctionnaire()
    {
        return $this->belongsTo(Fonctionnaire::class);
    }

    public function formation()
    {
        return $this->belongsTo(NomFormationSanitaire::class, 'nom_formation_sanitaire_id');
    }

    // Alias pour la vue
    public function nomFormationSanitaire()
    {
        return $this->belongsTo(NomFormationSanitaire::class, 'nom_formation_sanitaire_id');
    }

    public function decision()
    {
        return $this->belongsTo(Decision::class);
    }
}

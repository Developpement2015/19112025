<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetirementSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'description'
    ];

    /**
     * Get retirement age limit
     */
    public static function getRetirementAgeLimit()
    {
        $setting = self::where('key', 'retirement_age_limit')->first();
        return $setting ? (float) $setting->value : 62.5;
    }

    /**
     * Set retirement age limit
     */
    public static function setRetirementAgeLimit($age)
    {
        return self::updateOrCreate(
            ['key' => 'retirement_age_limit'],
            [
                'value' => (string) $age,
                'description' => 'Âge limite de retraite en années'
            ]
        );
    }
}

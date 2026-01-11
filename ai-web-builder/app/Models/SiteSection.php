<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSection extends Model
{
    protected $fillable = [
        'site_id',
        'type',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function site() { 
        return $this->belongsTo(Site::class); 
    }

    public function getLabelAttribute(): string
    {
        return match ($this->type) {
            'hero'         => 'Start',
            'about'        => 'O nas',
            'services'     => 'Usługi',
            'features'     => 'Dlaczego my?',
            'pricing'      => 'Cennik',
            'testimonials' => 'Opinie',
            'contact'      => 'Kontakt',
            default        => ucfirst($this->type),
        };
    }
}

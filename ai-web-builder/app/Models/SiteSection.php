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
}

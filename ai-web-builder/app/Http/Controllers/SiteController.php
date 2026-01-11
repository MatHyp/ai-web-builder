<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function show($uuid)
    {
        $site = Site::with('sections')
                     ->where('uuid', $uuid)
                     ->firstOrFail();

        return view('sites.preview', compact('site'));    
    }
}

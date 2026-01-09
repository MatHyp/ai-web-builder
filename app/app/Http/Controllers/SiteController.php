<?php

namespace App\Http\Controllers;

use App\Models\Sites;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function show($uuid)
    {
        $site = Sites::with('sections')
                     ->where('uuid', $uuid)
                     ->firstOrFail();

        return view('sites.preview', compact('site'));    
    }
}

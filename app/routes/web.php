<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/preview/{uuid}', [SiteController::class, 'show'])->name('sites.site');

Route::redirect('/', '/admin');

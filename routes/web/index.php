<?php

use Illuminate\Support\Facades\Route;

Route::group([], base_path('routes/web/auth.php'));

Route::middleware(['auth'])->group(base_path('routes/web/web.php'));

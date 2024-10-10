<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

Route::get('/productos/pdf', [PdfController::class, 'generatePdf']);

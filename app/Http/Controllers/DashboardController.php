<?php

namespace App\Http\Controllers;

use App\Models\KuesionerResponse;

class DashboardController extends Controller
{
    public function index()
    {
        $totalResponden = KuesionerResponse::count();
        
        $gayaBelajarCount = [
            'Visual' => KuesionerResponse::where('rekomendasi_terbaik', 'Visual')->count(),
            'Auditory' => KuesionerResponse::where('rekomendasi_terbaik', 'Auditory')->count(),
            'Read/Write' => KuesionerResponse::where('rekomendasi_terbaik', 'Read/Write')->count(),
            'Kinesthetic' => KuesionerResponse::where('rekomendasi_terbaik', 'Kinesthetic')->count(),
        ];
        
        return view('dashboard', compact('totalResponden', 'gayaBelajarCount'));
    }
}
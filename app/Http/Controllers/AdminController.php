<?php

namespace App\Http\Controllers;

use App\Models\KuesionerResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
            Auth::logout();
            return back()->with('error', 'Anda tidak memiliki akses admin');
        }
        
        return back()->with('error', 'Email atau password salah');
    }
    


public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    
    return redirect()->route('dashboard')->with('success', 'Anda berhasil logout!');
}
    
    public function dashboard()
{
    $totalResponden = KuesionerResponse::count();
    $totalHariIni = KuesionerResponse::whereDate('created_at', today())->count();
    
    $gayaBelajarCount = [
        'Visual' => KuesionerResponse::where('rekomendasi_terbaik', 'Visual')->count(),
        'Auditory' => KuesionerResponse::where('rekomendasi_terbaik', 'Auditory')->count(),
        'Read/Write' => KuesionerResponse::where('rekomendasi_terbaik', 'Read/Write')->count(),
        'Kinesthetic' => KuesionerResponse::where('rekomendasi_terbaik', 'Kinesthetic')->count(),
    ];
    
    $responses = KuesionerResponse::latest()->take(10)->get();
    
    return view('admin.dashboard', compact('totalResponden', 'totalHariIni', 'gayaBelajarCount', 'responses'));
}
    
    public function dataResponses()
    {
        $responses = KuesionerResponse::latest()->paginate(20);
        return view('admin.data-responses', compact('responses'));
    }
    
    public function showResponse($id)
    {
        $response = KuesionerResponse::findOrFail($id);
        return view('admin.show-response', compact('response'));
    }
    
    public function deleteResponse($id)
    {
        $response = KuesionerResponse::findOrFail($id);
        $response->delete();
        
        return redirect()->route('admin.data-responses')->with('success', 'Data berhasil dihapus');
    }
    
    public function bobotIndex()
{
    // Ambil bobot dari session atau default
    $bobot = session('bobot_kriteria', [
        'preferensi_sensorik' => 0.35,
        'metode_pemrosesan' => 0.30,
        'media_alat_belajar' => 0.20,
        'lingkungan_kondisi' => 0.15,
    ]);
    
    return view('admin.bobot', compact('bobot'));
}

public function bobotUpdate(Request $request)
{
    $request->validate([
        'preferensi_sensorik' => 'required|numeric|min:0|max:1',
        'metode_pemrosesan' => 'required|numeric|min:0|max:1',
        'media_alat_belajar' => 'required|numeric|min:0|max:1',
        'lingkungan_kondisi' => 'required|numeric|min:0|max:1',
    ]);
    
    $total = $request->preferensi_sensorik + $request->metode_pemrosesan + 
             $request->media_alat_belajar + $request->lingkungan_kondisi;
    
    if (abs($total - 1) > 0.01) {
        return back()->with('error', 'Total bobot harus 1 (100%)')->withInput();
    }
    
    // Simpan ke session
    session(['bobot_kriteria' => $request->all()]);
    
    return back()->with('success', 'Bobot kriteria berhasil diperbarui!');
}
}
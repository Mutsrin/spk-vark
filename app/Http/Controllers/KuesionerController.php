<?php

namespace App\Http\Controllers;

use App\Models\KuesionerResponse;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    // Bobot kriteria dari hasil AHP (wawancara pakar) - SUDAH DIPERBAIKI
    protected $bobot = [
        'preferensi_sensorik' => 0.25,
        'metode_pemrosesan' => 0.25,
        'media_alat_belajar' => 0.25,
        'lingkungan_kondisi' => 0.25,
    ];
    
    // Matriks kecocokan alternatif (gaya belajar) terhadap kriteria
    // SUDAH DISESUAIKAN DENGAN PAPER
    protected $matriksKecocokan = [
        'visual' => [
            'sp' => 0.9,
            'mp' => 0.6,
            'ma' => 0.8,
            'lk' => 0.5,
        ],
        'auditory' => [
            'sp' => 0.5,
            'mp' => 0.9,
            'ma' => 0.6,
            'lk' => 0.6,
        ],
        'readwrite' => [
            'sp' => 0.6,
            'mp' => 0.7,
            'ma' => 0.9,
            'lk' => 0.7,
        ],
        'kinesthetic' => [
            'sp' => 0.8,
            'mp' => 0.8,
            'ma' => 0.5,
            'lk' => 0.9,
        ],
    ];
    
    public function index()
    {
        return view('kuesioner.index');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'ps1' => 'required|integer|min:1|max:5',
            'ps2' => 'required|integer|min:1|max:5',
            'ps3' => 'required|integer|min:1|max:5',
            'ps4' => 'required|integer|min:1|max:5',
            'mp1' => 'required|integer|min:1|max:5',
            'mp2' => 'required|integer|min:1|max:5',
            'mp3' => 'required|integer|min:1|max:5',
            'mp4' => 'required|integer|min:1|max:5',
            'ma1' => 'required|integer|min:1|max:5',
            'ma2' => 'required|integer|min:1|max:5',
            'ma3' => 'required|integer|min:1|max:5',
            'ma4' => 'required|integer|min:1|max:5',
            'lk1' => 'required|integer|min:1|max:5',
            'lk2' => 'required|integer|min:1|max:5',
            'lk3' => 'required|integer|min:1|max:5',
            'lk4' => 'required|integer|min:1|max:5',
        ]);
        
        $response = KuesionerResponse::create($request->all());
        $hasil = $this->hitungSAW($response);
        $response->update($hasil);
        
        return redirect()->route('hasil.show', $response->id);
    }
    
    private function hitungSAW($response)
    {
        // Hitung rata-rata nilai per kriteria dari jawaban user
        $nilaiUser = [
            'preferensi_sensorik' => $response->getRataPreferensiSensorik(),
            'metode_pemrosesan' => $response->getRataMetodePemrosesan(),
            'media_alat_belajar' => $response->getRataMediaAlatBelajar(),
            'lingkungan_kondisi' => $response->getRataLingkunganKondisi(),
        ];
        
        // Normalisasi nilai user (skala 0-1)
        $normalizedUser = [];
        foreach ($nilaiUser as $key => $value) {
            $normalizedUser[$key] = $value / 5;
        }
        
        // Hitung nilai untuk setiap alternatif gaya belajar
        $alternatif = ['visual', 'auditory', 'readwrite', 'kinesthetic'];
        $namaAlternatif = [
            'visual' => 'Visual',
            'auditory' => 'Auditory',
            'readwrite' => 'Read/Write',
            'kinesthetic' => 'Kinesthetic'
        ];
        
        $nilaiAlternatif = [];
        
        foreach ($alternatif as $alt) {
            $matriks = $this->matriksKecocokan[$alt];
            
            $spScore = $matriks['sp'] * $normalizedUser['preferensi_sensorik'];
            $mpScore = $matriks['mp'] * $normalizedUser['metode_pemrosesan'];
            $maScore = $matriks['ma'] * $normalizedUser['media_alat_belajar'];
            $lkScore = $matriks['lk'] * $normalizedUser['lingkungan_kondisi'];
            
            $nilaiAkhir = 
                ($spScore * $this->bobot['preferensi_sensorik']) +
                ($mpScore * $this->bobot['metode_pemrosesan']) +
                ($maScore * $this->bobot['media_alat_belajar']) +
                ($lkScore * $this->bobot['lingkungan_kondisi']);
            
            $nilaiAlternatif[$namaAlternatif[$alt]] = $nilaiAkhir;
        }
        
        $rekomendasi = array_keys($nilaiAlternatif, max($nilaiAlternatif))[0];
        
        return [
            'nilai_visual' => $nilaiAlternatif['Visual'] ?? 0,
            'nilai_auditory' => $nilaiAlternatif['Auditory'] ?? 0,
            'nilai_readwrite' => $nilaiAlternatif['Read/Write'] ?? 0,
            'nilai_kinesthetic' => $nilaiAlternatif['Kinesthetic'] ?? 0,
            'rekomendasi_terbaik' => $rekomendasi,
            'nilai_tertinggi' => max($nilaiAlternatif),
        ];
    }
}
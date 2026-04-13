<?php

namespace App\Http\Controllers;

use App\Models\KuesionerResponse;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    // Bobot kriteria dari hasil AHP (wawancara pakar)
    protected $bobot = [
        'preferensi_sensorik' => 0.35,
        'metode_pemrosesan' => 0.30,
        'media_alat_belajar' => 0.20,
        'lingkungan_kondisi' => 0.15,
    ];
    
    // Matriks kecocokan alternatif (gaya belajar) terhadap subkriteria
    // Nilai 0-1 menunjukkan seberapa cocok suatu gaya belajar dengan subkriteria
    protected $matriksKecocokan = [
        'visual' => [
            'ps' => [1.0, 0.2, 0.3, 0.4], // PS1-Visual, PS2-Auditory, PS3-Read, PS4-Kinestetik
            'mp' => [0.8, 0.3, 0.5, 0.4],
            'ma' => [1.0, 0.2, 0.5, 0.3],
            'lk' => [0.7, 0.6, 0.5, 0.4],
        ],
        'auditory' => [
            'ps' => [0.2, 1.0, 0.2, 0.3],
            'mp' => [0.3, 1.0, 0.3, 0.4],
            'ma' => [0.3, 1.0, 0.3, 0.4],
            'lk' => [0.5, 1.0, 0.4, 0.5],
        ],
        'readwrite' => [
            'ps' => [0.3, 0.2, 1.0, 0.2],
            'mp' => [0.5, 0.3, 1.0, 0.3],
            'ma' => [0.4, 0.2, 1.0, 0.3],
            'lk' => [0.6, 0.5, 1.0, 0.4],
        ],
        'kinesthetic' => [
            'ps' => [0.4, 0.3, 0.2, 1.0],
            'mp' => [0.4, 0.4, 0.3, 1.0],
            'ma' => [0.3, 0.4, 0.3, 1.0],
            'lk' => [0.4, 0.5, 0.4, 1.0],
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
            // Preferensi Sensorik
            'ps1' => 'required|integer|min:1|max:5',
            'ps2' => 'required|integer|min:1|max:5',
            'ps3' => 'required|integer|min:1|max:5',
            'ps4' => 'required|integer|min:1|max:5',
            // Metode Pemrosesan
            'mp1' => 'required|integer|min:1|max:5',
            'mp2' => 'required|integer|min:1|max:5',
            'mp3' => 'required|integer|min:1|max:5',
            'mp4' => 'required|integer|min:1|max:5',
            // Media Alat Belajar
            'ma1' => 'required|integer|min:1|max:5',
            'ma2' => 'required|integer|min:1|max:5',
            'ma3' => 'required|integer|min:1|max:5',
            'ma4' => 'required|integer|min:1|max:5',
            // Lingkungan Kondisi
            'lk1' => 'required|integer|min:1|max:5',
            'lk2' => 'required|integer|min:1|max:5',
            'lk3' => 'required|integer|min:1|max:5',
            'lk4' => 'required|integer|min:1|max:5',
        ]);
        
        // Simpan data
        $response = KuesionerResponse::create($request->all());
        
        // Hitung rekomendasi dengan metode SAW
        $hasil = $this->hitungSAW($response);
        
        // Update hasil perhitungan
        $response->update($hasil);
        
        // Redirect ke halaman hasil
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
            $normalizedUser[$key] = $value / 5; // Max skala 5
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
            // Nilai dari matriks kecocokan untuk alternatif ini
            $skor = 0;
            
            // Preferensi Sensorik
            $psUser = $normalizedUser['preferensi_sensorik'];
            $psMatriks = $this->matriksKecocokan[$alt]['ps'];
            // Interpolasi nilai kecocokan berdasarkan jawaban user per subkriteria
            $psScore = ($psUser * $psMatriks[0] + 
                       (1 - abs($psUser - 0.25)) * $psMatriks[1] + 
                       (1 - abs($psUser - 0.5)) * $psMatriks[2] + 
                       (1 - abs($psUser - 0.75)) * $psMatriks[3]) / 4;
            
            // Metode Pemrosesan
            $mpUser = $normalizedUser['metode_pemrosesan'];
            $mpMatriks = $this->matriksKecocokan[$alt]['mp'];
            $mpScore = ($mpUser * $mpMatriks[0] + 
                       (1 - abs($mpUser - 0.25)) * $mpMatriks[1] + 
                       (1 - abs($mpUser - 0.5)) * $mpMatriks[2] + 
                       (1 - abs($mpUser - 0.75)) * $mpMatriks[3]) / 4;
            
            // Media Alat Belajar
            $maUser = $normalizedUser['media_alat_belajar'];
            $maMatriks = $this->matriksKecocokan[$alt]['ma'];
            $maScore = ($maUser * $maMatriks[0] + 
                       (1 - abs($maUser - 0.25)) * $maMatriks[1] + 
                       (1 - abs($maUser - 0.5)) * $maMatriks[2] + 
                       (1 - abs($maUser - 0.75)) * $maMatriks[3]) / 4;
            
            // Lingkungan Kondisi
            $lkUser = $normalizedUser['lingkungan_kondisi'];
            $lkMatriks = $this->matriksKecocokan[$alt]['lk'];
            $lkScore = ($lkUser * $lkMatriks[0] + 
                       (1 - abs($lkUser - 0.25)) * $lkMatriks[1] + 
                       (1 - abs($lkUser - 0.5)) * $lkMatriks[2] + 
                       (1 - abs($lkUser - 0.75)) * $lkMatriks[3]) / 4;
            
            // Hitung nilai akhir dengan bobot AHP
            $nilaiAkhir = 
                ($psScore * $this->bobot['preferensi_sensorik']) +
                ($mpScore * $this->bobot['metode_pemrosesan']) +
                ($maScore * $this->bobot['media_alat_belajar']) +
                ($lkScore * $this->bobot['lingkungan_kondisi']);
            
            $nilaiAlternatif[$namaAlternatif[$alt]] = $nilaiAkhir;
        }
        
        // Cari nilai tertinggi
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
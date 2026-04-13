<?php

namespace App\Http\Controllers;

use App\Models\KuesionerResponse;

class HasilController extends Controller
{
    public function show($id)
    {
        $response = KuesionerResponse::findOrFail($id);
        
        $deskripsiGayaBelajar = [
            'Visual' => 'Anda lebih mudah memahami informasi melalui gambar, diagram, grafik, dan visualisasi. Gunakan mind mapping, video pembelajaran, atau catatan berwarna untuk belajar lebih efektif.',
            'Auditory' => 'Anda lebih mudah memahami informasi melalui pendengaran. Rekomendasi: dengarkan rekaman pelajaran, diskusi kelompok, atau baca materi dengan suara keras.',
            'Read/Write' => 'Anda lebih mudah memahami informasi melalui membaca dan menulis. Rekomendasi: buat catatan, rangkuman, baca buku teks, dan tulis ulang materi dengan kata-kata sendiri.',
            'Kinesthetic' => 'Anda lebih mudah memahami informasi melalui pengalaman langsung dan praktik. Rekomendasi: lakukan eksperimen, simulasi, atau gunakan alat peraga dalam belajar.'
        ];
        
        $rekomendasiMetode = [
            'Visual' => ['Mind Mapping', 'Video Pembelajaran', 'Infografis', 'Slide Presentasi', 'Diagram Alur'],
            'Auditory' => ['Podcast Edukasi', 'Diskusi Kelompok', 'Merekam dan Memutar Ulang', 'Membaca Keras', 'Debat'],
            'Read/Write' => ['Membaca Buku Teks', 'Membuat Ringkasan', 'Menulis Jurnal', 'Flashcard', 'Membuat Essay'],
            'Kinesthetic' => ['Praktikum', 'Simulasi', 'Role Play', 'Studi Lapangan', 'Model 3D']
        ];
        
        return view('kuesioner.hasil', compact('response', 'deskripsiGayaBelajar', 'rekomendasiMetode'));
    }
}
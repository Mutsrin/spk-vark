<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuesionerResponse extends Model
{
    use HasFactory;

    protected $table = 'kuesioner_responses';

    protected $fillable = [
        'nama_lengkap', 'email',
        'ps1', 'ps2', 'ps3', 'ps4',
        'mp1', 'mp2', 'mp3', 'mp4',
        'ma1', 'ma2', 'ma3', 'ma4',
        'lk1', 'lk2', 'lk3', 'lk4',
        'nilai_visual', 'nilai_auditory', 'nilai_readwrite', 'nilai_kinesthetic',
        'rekomendasi_terbaik', 'nilai_tertinggi'
    ];

    // Method untuk menghitung rata-rata per kriteria
    public function getRataPreferensiSensorik()
    {
        return ($this->ps1 + $this->ps2 + $this->ps3 + $this->ps4) / 4;
    }

    public function getRataMetodePemrosesan()
    {
        return ($this->mp1 + $this->mp2 + $this->mp3 + $this->mp4) / 4;
    }

    public function getRataMediaAlatBelajar()
    {
        return ($this->ma1 + $this->ma2 + $this->ma3 + $this->ma4) / 4;
    }

    public function getRataLingkunganKondisi()
    {
        return ($this->lk1 + $this->lk2 + $this->lk3 + $this->lk4) / 4;
    }
}
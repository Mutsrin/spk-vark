@extends('layouts.app')

@section('title', 'Hasil Rekomendasi Gaya Belajar')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card-custom">
                <div class="card-header bg-transparent border-0 pt-4 px-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h4 class="fw-bold mb-0"><i class="fas fa-chart-line text-primary me-2"></i>Hasil Rekomendasi</h4>
                            <p class="text-muted small mt-1">Berdasarkan perhitungan metode AHP & SAW</p>
                        </div>
                        <div>
                            <span class="badge-custom bg-success text-white px-3 py-2">
                                <i class="fas fa-check-circle me-1"></i> Selesai
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 pb-4">
                    
                    <!-- Hasil Utama -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card-stat shadow-hover text-center" style="border-left: 5px solid #10b981;">
                                <div class="card-body p-4">
                                    <div class="mb-3">
                                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-2">
                                            <i class="fas fa-trophy fa-3x text-success"></i>
                                        </div>
                                    </div>
                                    <h3 class="fw-bold mb-1">Halo, <span class="text-primary">{{ $response->nama_lengkap }}</span>!</h3>
                                    <p class="text-muted mb-3">Gaya belajar terbaik Anda adalah:</p>
                                    <h1 class="display-3 fw-bold mb-2" style="color: {{ 
                                        $response->rekomendasi_terbaik == 'Visual' ? '#3b82f6' : 
                                        ($response->rekomendasi_terbaik == 'Auditory' ? '#10b981' : 
                                        ($response->rekomendasi_terbaik == 'Read/Write' ? '#f59e0b' : '#ef4444')) 
                                    }};">
                                        <i class="fas fa-{{ 
                                            $response->rekomendasi_terbaik == 'Visual' ? 'eye' : 
                                            ($response->rekomendasi_terbaik == 'Auditory' ? 'headphones' : 
                                            ($response->rekomendasi_terbaik == 'Read/Write' ? 'book' : 'running')) 
                                        }} me-3"></i>
                                        {{ $response->rekomendasi_terbaik }}
                                    </h1>
                                    <div class="mt-3">
                                        <span class="badge-custom bg-primary text-white px-4 py-2 fs-6">
                                            <i class="fas fa-star me-1"></i> Nilai Akhir: {{ number_format($response->nilai_tertinggi, 4) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Deskripsi & Rekomendasi Metode -->
                    <div class="row mb-4 g-4">
                        <div class="col-md-6">
                            <div class="card-learning shadow-hover h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="bg-info bg-opacity-10 rounded-3 p-2">
                                            <i class="fas fa-info-circle fa-lg text-info"></i>
                                        </div>
                                        <h5 class="fw-bold mb-0">Deskripsi</h5>
                                    </div>
                                    <p class="text-muted mb-0">{{ $deskripsiGayaBelajar[$response->rekomendasi_terbaik] ?? 'Tidak ada deskripsi' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-learning shadow-hover h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="bg-warning bg-opacity-10 rounded-3 p-2">
                                            <i class="fas fa-lightbulb fa-lg text-warning"></i>
                                        </div>
                                        <h5 class="fw-bold mb-0">Rekomendasi Metode Belajar</h5>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($rekomendasiMetode[$response->rekomendasi_terbaik] ?? [] as $metode)
                                            <span class="badge-custom bg-light text-dark px-3 py-2">
                                                <i class="fas fa-check-circle text-success me-1"></i> {{ $metode }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Detail Nilai Setiap Gaya Belajar -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card-learning shadow-hover">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center gap-3 mb-4">
                                        <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                                            <i class="fas fa-chart-bar fa-lg text-primary"></i>
                                        </div>
                                        <h5 class="fw-bold mb-0">Detail Nilai Setiap Gaya Belajar</h5>
                                    </div>
                                    
                                    @php
                                        $styles = [
                                            'Visual' => ['nilai' => $response->nilai_visual, 'icon' => 'fa-eye', 'color' => '#3b82f6', 'bg' => 'primary'],
                                            'Auditory' => ['nilai' => $response->nilai_auditory, 'icon' => 'fa-headphones', 'color' => '#10b981', 'bg' => 'success'],
                                            'Read/Write' => ['nilai' => $response->nilai_readwrite, 'icon' => 'fa-book', 'color' => '#f59e0b', 'bg' => 'warning'],
                                            'Kinesthetic' => ['nilai' => $response->nilai_kinesthetic, 'icon' => 'fa-running', 'color' => '#ef4444', 'bg' => 'danger'],
                                        ];
                                    @endphp
                                    
                                    @foreach($styles as $name => $data)
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="fas {{ $data['icon'] }}" style="color: {{ $data['color'] }};"></i>
                                                <span class="fw-semibold">{{ $name }}</span>
                                            </div>
                                            <span class="fw-bold" style="color: {{ $data['color'] }};">{{ number_format($data['nilai'], 4) }}</span>
                                        </div>
                                        <div class="progress-custom" style="height: 10px;">
                                            <div class="progress-bar-custom" style="width: {{ min($data['nilai'] * 100, 100) }}%; background: {{ $data['color'] }}; height: 10px;"></div>
                                        </div>
                                        <small class="text-muted">{{ round($data['nilai'] * 100, 1) }}% dari maksimal</small>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-center gap-3 pt-3 border-top">
                        <a href="{{ route('kuesioner') }}" class="btn btn-outline-custom px-4 py-2">
                            <i class="fas fa-redo me-2"></i> Tes Lagi
                        </a>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary-custom px-4 py-2">
                            <i class="fas fa-home me-2"></i> Kembali ke Beranda
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Card learning */
    .card-learning {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        transition: all 0.3s ease;
    }
    
    .card-learning:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }
    
    /* Badge custom */
    .badge-custom {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.75rem;
    }
    
    /* Progress bar */
    .progress-custom {
        background-color: #e2e8f0;
        border-radius: 20px;
        overflow: hidden;
    }
    
    .progress-bar-custom {
        border-radius: 20px;
        transition: width 0.5s ease;
    }
    
    /* Button share */
    .btn-sm {
        transition: all 0.2s ease;
    }
    
    .btn-sm:hover {
        transform: scale(1.1);
        opacity: 0.9;
    }
</style>
@endpush
@endsection
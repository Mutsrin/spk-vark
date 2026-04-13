@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="text-white fw-bold mb-3 display-4">Temukan Gaya Belajar Terbaikmu</h1>
                <p class="text-white opacity-75 mb-4 fs-5">Sistem Pendukung Keputusan Rekomendasi Gaya Belajar Efektif menggunakan Metode AHP & SAW</p>
                <a href="{{ route('kuesioner') }}" class="btn btn-light px-5 py-3 rounded-3 fw-semibold shadow-sm">
                    <i class="fas fa-clipboard-list me-2"></i>Mulai Kuesioner
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <!-- 4 Gaya Belajar VARK -->
    <div class="row mb-5">
        <div class="col-12 text-center mb-4">
            <h2 class="fw-bold text-dark">Model Gaya Belajar VARK</h2>
            <p class="text-muted">Kenali cara belajarmu yang paling efektif</p>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-6 col-lg-3">
            <div class="card-learning text-center h-100">
                <div class="card-body p-4">
                    <div class="bg-primary bg-opacity-10 rounded-3 d-inline-flex p-3 mb-3">
                        <i class="fas fa-eye fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Visual</h5>
                    <p class="text-muted small mb-0">Lebih mudah memahami informasi melalui gambar, diagram, dan visualisasi</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card-learning text-center h-100">
                <div class="card-body p-4">
                    <div class="bg-success bg-opacity-10 rounded-3 d-inline-flex p-3 mb-3">
                        <i class="fas fa-headphones fa-2x text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Auditory</h5>
                    <p class="text-muted small mb-0">Lebih mudah memahami informasi melalui pendengaran dan diskusi</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card-learning text-center h-100">
                <div class="card-body p-4">
                    <div class="bg-warning bg-opacity-10 rounded-3 d-inline-flex p-3 mb-3">
                        <i class="fas fa-book fa-2x text-warning"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Read/Write</h5>
                    <p class="text-muted small mb-0">Lebih mudah memahami informasi melalui membaca dan menulis</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card-learning text-center h-100">
                <div class="card-body p-4">
                    <div class="bg-danger bg-opacity-10 rounded-3 d-inline-flex p-3 mb-3">
                        <i class="fas fa-running fa-2x text-danger"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Kinesthetic</h5>
                    <p class="text-muted small mb-0">Lebih mudah memahami informasi melalui praktik langsung</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Langkah Penggunaan -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10">
            <div class="card-stat shadow-hover">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                            <i class="fas fa-list-ol fa-lg text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-0">Langkah Penggunaan Aplikasi</h5>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-3 text-center">
                            <div class="step-circle mx-auto mb-3">
                                <span class="step-number">1</span>
                            </div>
                            <h6 class="fw-bold mb-1">Isi Kuesioner</h6>
                            <small class="text-muted">Jawab 16 pertanyaan sesuai kebiasaan belajar</small>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="step-circle mx-auto mb-3">
                                <span class="step-number">2</span>
                            </div>
                            <h6 class="fw-bold mb-1">Proses Hitung</h6>
                            <small class="text-muted">Sistem hitung dengan AHP & SAW</small>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="step-circle mx-auto mb-3">
                                <span class="step-number">3</span>
                            </div>
                            <h6 class="fw-bold mb-1">Lihat Hasil</h6>
                            <small class="text-muted">Dapatkan rekomendasi gaya belajar</small>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="step-circle mx-auto mb-3">
                                <span class="step-number">4</span>
                            </div>
                            <h6 class="fw-bold mb-1">Terapkan</h6>
                            <small class="text-muted">Gunakan metode belajar yang direkomendasikan</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik & Info -->
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card-stat shadow-hover">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                            <i class="fas fa-chart-simple fa-lg text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-0">Statistik Responden</h5>
                    </div>
                    <div class="row text-center">
                        <div class="col-6 mb-3">
                            <div class="p-3 rounded-3 bg-light">
                                <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                <h3 class="fw-bold mb-0">{{ $totalResponden }}</h3>
                                <small class="text-muted">Total Responden</small>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="p-3 rounded-3 bg-light">
                                <i class="fas fa-chart-pie fa-2x text-success mb-2"></i>
                                <h3 class="fw-bold mb-0">{{ array_sum($gayaBelajarCount) }}</h3>
                                <small class="text-muted">Telah Direkomendasikan</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-stat shadow-hover">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="bg-info bg-opacity-10 rounded-3 p-2">
                            <i class="fas fa-info-circle fa-lg text-info"></i>
                        </div>
                        <h5 class="fw-bold mb-0">Tentang Sistem</h5>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex align-items-center gap-2 p-2 rounded-3 bg-light">
                            <i class="fas fa-calculator text-primary"></i>
                            <span class="small">Metode <strong>AHP</strong> untuk pembobotan kriteria</span>
                        </div>
                        <div class="d-flex align-items-center gap-2 p-2 rounded-3 bg-light">
                            <i class="fas fa-chart-line text-success"></i>
                            <span class="small">Metode <strong>SAW</strong> untuk perankingan alternatif</span>
                        </div>
                        <div class="d-flex align-items-center gap-2 p-2 rounded-3 bg-light">
                            <i class="fas fa-graduation-cap text-warning"></i>
                            <span class="small">Model <strong>VARK</strong> (Visual, Auditory, Read/Write, Kinesthetic)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Step circle styling */
    .step-circle {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #1a2a6c 0%, #2d3a7c 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(26, 42, 108, 0.2);
        transition: all 0.3s ease;
    }
    
    .step-circle:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 16px rgba(26, 42, 108, 0.3);
    }
    
    .step-number {
        color: white;
        font-size: 1.5rem;
        font-weight: 700;
    }
    
    /* Card learning (sama dengan halaman lain) */
    .card-learning {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        transition: all 0.3s ease;
    }
    
    .card-learning:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-4px);
    }
    
    /* Card stat */
    .card-stat {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        transition: all 0.3s ease;
    }
    
    .shadow-hover:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
    }
    
    /* Hero section */
    .hero {
        background: linear-gradient(135deg, #1a2a6c 0%, #2d3a7c 100%);
        padding: 80px 0;
        margin-bottom: 20px;
    }
    
    /* Button */
    .btn-light {
        background: white;
        border: none;
        transition: all 0.3s ease;
    }
    
    .btn-light:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
</style>
@endpush
@endsection
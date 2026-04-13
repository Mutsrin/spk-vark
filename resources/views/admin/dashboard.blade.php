@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card-custom">
                <div class="card-header bg-transparent border-0 pt-4 px-4">
                    <h4 class="fw-bold mb-0"><i class="fas fa-chart-line text-primary me-2"></i>Dashboard Admin</h4>
                    <p class="text-muted small mt-1">Selamat datang, {{ Auth::user()->name }}!</p>
                </div>
                <div class="card-body px-4 pb-4">
                    <!-- Statistik Ringkas (Total & Hari Ini) -->
                    <div class="row mb-4 g-4">
                        <div class="col-md-6">
                            <div class="card-stat bg-primary text-white shadow-hover" style="border: none; background: linear-gradient(135deg, #1a2a6c 0%, #2d3a7c 100%);">
                                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fas fa-users fa-3x mb-2 opacity-50"></i>
                                        <h5 class="mb-0">Total Responden</h5>
                                    </div>
                                    <div>
                                        <h2 class="fw-bold mb-0">{{ $totalResponden }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-stat bg-success text-white shadow-hover" style="border: none; background: linear-gradient(135deg, #059669 0%, #10b981 100%);">
                                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fas fa-calendar-day fa-3x mb-2 opacity-50"></i>
                                        <h5 class="mb-0">Hari Ini</h5>
                                    </div>
                                    <div>
                                        <h2 class="fw-bold mb-0">{{ $totalHariIni }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 4 Card Gaya Belajar (Semua) -->
                    <div class="row mb-4 g-4">
                        <div class="col-md-6 col-lg-3">
                            <div class="card-learning shadow-hover" style="border-left: 5px solid #3b82f6;">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="bg-primary bg-opacity-10 rounded-3 d-inline-flex p-2 mb-2">
                                                <i class="fas fa-eye text-primary fa-lg"></i>
                                            </div>
                                            <h5 class="fw-bold mb-0">Visual</h5>
                                            <small class="text-muted">Gambar & diagram</small>
                                        </div>
                                        <h2 class="fw-bold text-primary mb-0">{{ $gayaBelajarCount['Visual'] }}</h2>
                                    </div>
                                    <div class="mt-3">
                                        <div class="progress-custom" style="height: 8px;">
                                            <div class="progress-bar-custom bg-primary" style="width: {{ $totalResponden > 0 ? ($gayaBelajarCount['Visual'] / $totalResponden) * 100 : 0 }}%; height: 8px;"></div>
                                        </div>
                                        <small class="text-muted">{{ $totalResponden > 0 ? round(($gayaBelajarCount['Visual'] / $totalResponden) * 100) : 0 }}% dari total</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card-learning shadow-hover" style="border-left: 5px solid #10b981;">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="bg-success bg-opacity-10 rounded-3 d-inline-flex p-2 mb-2">
                                                <i class="fas fa-headphones text-success fa-lg"></i>
                                            </div>
                                            <h5 class="fw-bold mb-0">Auditory</h5>
                                            <small class="text-muted">Pendengaran & diskusi</small>
                                        </div>
                                        <h2 class="fw-bold text-success mb-0">{{ $gayaBelajarCount['Auditory'] }}</h2>
                                    </div>
                                    <div class="mt-3">
                                        <div class="progress-custom" style="height: 8px;">
                                            <div class="progress-bar-custom bg-success" style="width: {{ $totalResponden > 0 ? ($gayaBelajarCount['Auditory'] / $totalResponden) * 100 : 0 }}%; height: 8px;"></div>
                                        </div>
                                        <small class="text-muted">{{ $totalResponden > 0 ? round(($gayaBelajarCount['Auditory'] / $totalResponden) * 100) : 0 }}% dari total</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card-learning shadow-hover" style="border-left: 5px solid #f59e0b;">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="bg-warning bg-opacity-10 rounded-3 d-inline-flex p-2 mb-2">
                                                <i class="fas fa-book text-warning fa-lg"></i>
                                            </div>
                                            <h5 class="fw-bold mb-0">Read/Write</h5>
                                            <small class="text-muted">Membaca & menulis</small>
                                        </div>
                                        <h2 class="fw-bold text-warning mb-0">{{ $gayaBelajarCount['Read/Write'] }}</h2>
                                    </div>
                                    <div class="mt-3">
                                        <div class="progress-custom" style="height: 8px;">
                                            <div class="progress-bar-custom bg-warning" style="width: {{ $totalResponden > 0 ? ($gayaBelajarCount['Read/Write'] / $totalResponden) * 100 : 0 }}%; height: 8px;"></div>
                                        </div>
                                        <small class="text-muted">{{ $totalResponden > 0 ? round(($gayaBelajarCount['Read/Write'] / $totalResponden) * 100) : 0 }}% dari total</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card-learning shadow-hover" style="border-left: 5px solid #ef4444;">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="bg-danger bg-opacity-10 rounded-3 d-inline-flex p-2 mb-2">
                                                <i class="fas fa-running text-danger fa-lg"></i>
                                            </div>
                                            <h5 class="fw-bold mb-0">Kinesthetic</h5>
                                            <small class="text-muted">Praktik langsung</small>
                                        </div>
                                        <h2 class="fw-bold text-danger mb-0">{{ $gayaBelajarCount['Kinesthetic'] }}</h2>
                                    </div>
                                    <div class="mt-3">
                                        <div class="progress-custom" style="height: 8px;">
                                            <div class="progress-bar-custom bg-danger" style="width: {{ $totalResponden > 0 ? ($gayaBelajarCount['Kinesthetic'] / $totalResponden) * 100 : 0 }}%; height: 8px;"></div>
                                        </div>
                                        <small class="text-muted">{{ $totalResponden > 0 ? round(($gayaBelajarCount['Kinesthetic'] / $totalResponden) * 100) : 0 }}% dari total</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Info Sistem -->
                    <div class="row mb-4 g-4">
                        <div class="col-12">
                            <div class="card-stat shadow-hover">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold mb-3"><i class="fas fa-info-circle text-primary me-2"></i>Info Sistem</h5>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light shadow-sm">
                                                <i class="fas fa-calculator fa-2x text-primary"></i>
                                                <div>
                                                    <h6 class="fw-bold mb-0">Metode AHP & SAW</h6>
                                                    <small class="text-muted">Pengambilan keputusan multi-kriteria</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light shadow-sm">
                                                <i class="fas fa-graduation-cap fa-2x text-primary"></i>
                                                <div>
                                                    <h6 class="fw-bold mb-0">Model VARK</h6>
                                                    <small class="text-muted">4 gaya belajar</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light shadow-sm">
                                                <i class="fas fa-sliders-h fa-2x text-primary"></i>
                                                <div>
                                                    <h6 class="fw-bold mb-0">Bobot Dinamis</h6>
                                                    <small class="text-muted">Dapat diubah kapan saja</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Data Responden Terakhir -->
                    <div class="row">
                        <div class="col-12">
                            <h5 class="fw-bold mt-2 mb-3"><i class="fas fa-table-list text-primary me-2"></i>10 Responden Terakhir</h5>
                            <div class="table-responsive">
                                <table class="table table-custom table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Rekomendasi</th>
                                            <th>Nilai</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($responses as $response)
                                        <tr>
                                            <td>{{ $response->id }}</td>
                                            <td>{{ $response->nama_lengkap }}</td>
                                            <td>{{ $response->email ?? '-' }}</td>
                                            <td>
                                                <span class="badge-custom text-white shadow-sm" style="background: {{ 
                                                    $response->rekomendasi_terbaik == 'Visual' ? '#3b82f6' : 
                                                    ($response->rekomendasi_terbaik == 'Auditory' ? '#10b981' : 
                                                    ($response->rekomendasi_terbaik == 'Read/Write' ? '#f59e0b' : '#ef4444')) 
                                                }};">
                                                    {{ $response->rekomendasi_terbaik }}
                                                </span>
                                            </td>
                                            <td>{{ number_format($response->nilai_tertinggi, 4) }}</td>
                                            <td>{{ $response->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('admin.show-response', $response->id) }}" class="btn btn-sm btn-info rounded-pill px-3 text-white shadow-sm" style="background: #3b82f6; border: none;">
                                                    <i class="fas fa-eye me-1"></i> Detail
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">Belum ada data responden</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
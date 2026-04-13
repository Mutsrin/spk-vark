@extends('layouts.app')

@section('title', 'Detail Responden')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card-custom">
                <div class="card-header bg-transparent border-0 pt-4 px-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h4 class="fw-bold mb-0"><i class="fas fa-user-circle text-primary me-2"></i>Detail Responden</h4>
                            <p class="text-muted small mt-1">Informasi lengkap responden dan hasil kuesioner</p>
                        </div>
                        <a href="{{ route('admin.data-responses') }}" class="btn btn-outline-custom">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body px-4 pb-4">
                    <!-- Profil Responden -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card-stat shadow-hover">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center gap-4 flex-wrap">
                                        <div class="avatar-lg rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                            <i class="fas fa-user fa-3x text-primary"></i>
                                        </div>
                                        <div>
                                            <h3 class="fw-bold mb-1">{{ $response->nama_lengkap }}</h3>
                                            <p class="text-muted mb-2">
                                                <i class="fas fa-envelope me-2"></i> {{ $response->email ?? 'Email tidak tersedia' }}
                                            </p>
                                            <div class="d-flex gap-3 flex-wrap">
                                                <span class="badge-custom bg-primary text-white px-3 py-2">
                                                    <i class="fas fa-id-card me-1"></i> ID: #{{ $response->id }}
                                                </span>
                                                <span class="badge-custom bg-info text-white px-3 py-2">
                                                    <i class="fas fa-calendar me-1"></i> {{ $response->created_at->format('d F Y, H:i') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Hasil Rekomendasi -->
                    <div class="row mb-4 g-4">
                        <div class="col-md-6">
                            <div class="card-stat shadow-hover" style="border-left: 5px solid #10b981;">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold mb-3"><i class="fas fa-trophy text-success me-2"></i>Rekomendasi Terbaik</h5>
                                    <div class="text-center">
                                        <span class="badge-custom text-white px-4 py-3 mb-2 d-inline-block" style="background: {{ 
                                            $response->rekomendasi_terbaik == 'Visual' ? '#3b82f6' : 
                                            ($response->rekomendasi_terbaik == 'Auditory' ? '#10b981' : 
                                            ($response->rekomendasi_terbaik == 'Read/Write' ? '#f59e0b' : '#ef4444')) 
                                        }}; font-size: 1.1rem;">
                                            <i class="fas fa-{{ 
                                                $response->rekomendasi_terbaik == 'Visual' ? 'eye' : 
                                                ($response->rekomendasi_terbaik == 'Auditory' ? 'headphones' : 
                                                ($response->rekomendasi_terbaik == 'Read/Write' ? 'book' : 'running')) 
                                            }} me-2"></i>
                                            {{ $response->rekomendasi_terbaik }}
                                        </span>
                                        <h2 class="fw-bold text-primary mt-2">{{ number_format($response->nilai_tertinggi, 4) }}</h2>
                                        <p class="text-muted small">Nilai akhir tertinggi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-stat shadow-hover">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold mb-3"><i class="fas fa-chart-pie text-primary me-2"></i>Ringkasan Nilai</h5>
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between small mb-1">
                                            <span><i class="fas fa-eye text-primary me-2"></i>Visual</span>
                                            <span class="fw-bold">{{ number_format($response->nilai_visual, 4) }}</span>
                                        </div>
                                        <div class="progress-custom" style="height: 6px;">
                                            <div class="progress-bar-custom bg-primary" style="width: {{ $response->nilai_visual * 100 }}%; height: 6px;"></div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between small mb-1">
                                            <span><i class="fas fa-headphones text-success me-2"></i>Auditory</span>
                                            <span class="fw-bold">{{ number_format($response->nilai_auditory, 4) }}</span>
                                        </div>
                                        <div class="progress-custom" style="height: 6px;">
                                            <div class="progress-bar-custom bg-success" style="width: {{ $response->nilai_auditory * 100 }}%; height: 6px;"></div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between small mb-1">
                                            <span><i class="fas fa-book text-warning me-2"></i>Read/Write</span>
                                            <span class="fw-bold">{{ number_format($response->nilai_readwrite, 4) }}</span>
                                        </div>
                                        <div class="progress-custom" style="height: 6px;">
                                            <div class="progress-bar-custom bg-warning" style="width: {{ $response->nilai_readwrite * 100 }}%; height: 6px;"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between small mb-1">
                                            <span><i class="fas fa-running text-danger me-2"></i>Kinesthetic</span>
                                            <span class="fw-bold">{{ number_format($response->nilai_kinesthetic, 4) }}</span>
                                        </div>
                                        <div class="progress-custom" style="height: 6px;">
                                            <div class="progress-bar-custom bg-danger" style="width: {{ $response->nilai_kinesthetic * 100 }}%; height: 6px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Jawaban Kuesioner -->
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card-stat shadow-hover">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold mb-3"><i class="fas fa-eye text-primary me-2"></i>A. Preferensi Sensorik</h5>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <tr>
                                                <th width="60%">PS1 - Gambar/Diagram/Grafik</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->ps1 }}</span> / 5</td>
                                            </tr>
                                            <tr>
                                                <th>PS2 - Penjelasan Lisan/Diskusi</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->ps2 }}</span> / 5</td>
                                            </tr>
                                            <tr>
                                                <th>PS3 - Membaca/Menulis Catatan</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->ps3 }}</span> / 5</td>
                                            </tr>
                                            <tr>
                                                <th>PS4 - Praktik/Pengalaman Langsung</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->ps4 }}</span> / 5</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-stat shadow-hover">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold mb-3"><i class="fas fa-brain text-primary me-2"></i>B. Metode Pemrosesan Informasi</h5>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <tr>
                                                <th width="60%">MP1 - Materi Terstruktur</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->mp1 }}</span> / 5</td>
                                            </tr>
                                            <tr>
                                                <th>MP2 - Diskusi & Tanya Jawab</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->mp2 }}</span> / 5</td>
                                            </tr>
                                            <tr>
                                                <th>MP3 - Mencatat/Merangkum</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->mp3 }}</span> / 5</td>
                                            </tr>
                                            <tr>
                                                <th>MP4 - Langsung Mempraktikkan</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->mp4 }}</span> / 5</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-stat shadow-hover">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold mb-3"><i class="fas fa-laptop text-primary me-2"></i>C. Media & Alat Belajar</h5>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <tr>
                                                <th width="60%">MA1 - Video/Visualisasi</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->ma1 }}</span> / 5</td>
                                            </tr>
                                            <tr>
                                                <th>MA2 - Audio/Rekaman Suara</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->ma2 }}</span> / 5</td>
                                            </tr>
                                            <tr>
                                                <th>MA3 - Buku/Modul Tertulis</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->ma3 }}</span> / 5</td>
                                            </tr>
                                            <tr>
                                                <th>MA4 - Alat Peraga/Simulator</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->ma4 }}</span> / 5</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-stat shadow-hover">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold mb-3"><i class="fas fa-home text-primary me-2"></i>D. Lingkungan & Kondisi</h5>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <tr>
                                                <th width="60%">LK1 - Ruangan Terang</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->lk1 }}</span> / 5</td>
                                            </tr>
                                            <tr>
                                                <th>LK2 - Suasana Tenang</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->lk2 }}</span> / 5</td>
                                            </tr>
                                            <tr>
                                                <th>LK3 - Akses Bacaan Memadai</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->lk3 }}</span> / 5</td>
                                            </tr>
                                            <tr>
                                                <th>LK4 - Ruang Gerak Cukup</th>
                                                <td class="text-end"><span class="fw-bold">{{ $response->lk4 }}</span> / 5</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-end gap-3 mt-4 pt-3 border-top">
                        <form action="{{ route('admin.delete-response', $response->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger px-4 delete-btn">
                                <i class="fas fa-trash me-2"></i> Hapus Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            let form = this.closest('.delete-form');
            
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data responden akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush

@push('styles')
<style>
    .avatar-lg {
        transition: all 0.2s ease;
    }
    
    .table-sm th {
        font-weight: 600;
        font-size: 0.85rem;
        color: #4b5563;
        border-bottom: 1px solid #f0f0f0;
        padding: 10px 0;
    }
    
    .table-sm td {
        padding: 10px 0;
    }
</style>
@endpush
@endsection
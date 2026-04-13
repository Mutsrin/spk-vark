@extends('layouts.app')

@section('title', 'Kuesioner Gaya Belajar')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card-custom">
                <div class="card-header bg-transparent border-0 pt-4 px-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h4 class="fw-bold mb-0"><i class="fas fa-clipboard-list text-primary me-2"></i>Kuesioner Gaya Belajar</h4>
                            <p class="text-muted small mt-1">Isilah kuesioner berikut sesuai dengan kebiasaan belajarmu</p>
                        </div>
                        <div>
                            <span class="badge-custom bg-primary text-white px-3 py-2">
                                <i class="fas fa-question-circle me-1"></i> 16 Pertanyaan
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 pb-4">
                    <!-- Progress Info -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card-stat shadow-hover bg-light border-0">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                                                <i class="fas fa-info-circle fa-2x text-primary"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0">Petunjuk Pengisian</h6>
                                                <small class="text-muted">Pilih jawaban yang paling sesuai dengan kebiasaan belajarmu</small>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="badge-custom bg-success text-white px-3 py-2">
                                                <i class="fas fa-check-circle me-1"></i> Skala: Sangat Setuju → Sangat Tidak Setuju
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{ route('kuesioner.store') }}" method="POST" id="kuesionerForm">
                        @csrf
                        
                        <!-- A. Preferensi Sensorik -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card-learning shadow-hover">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-start gap-3 mb-3">
                                            <div class="bg-primary bg-opacity-10 rounded-3 p-2 flex-shrink-0">
                                                <i class="fas fa-eye fa-lg text-primary"></i>
                                            </div>
                                            <div>
                                                <h5 class="fw-bold mb-0">A. Preferensi Sensorik</h5>
                                                <small class="text-muted">Kecenderungan dalam menerima informasi melalui panca indera</small>
                                            </div>
                                        </div>
                                        
                                        <div class="row g-3">
                                            <!-- PS1 -->
                                            <div class="col-12">
                                                <div class="border-bottom pb-3">
                                                    <label class="form-label fw-semibold mb-2">1. Saya lebih mudah memahami materi melalui gambar, diagram, atau grafik</label>
                                                    <div class="d-flex flex-wrap gap-3">
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps1" value="5" id="ps1_ss" required>
                                                            <label for="ps1_ss">Sangat Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps1" value="4" id="ps1_s">
                                                            <label for="ps1_s">Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps1" value="3" id="ps1_n">
                                                            <label for="ps1_n">Netral</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps1" value="2" id="ps1_ts">
                                                            <label for="ps1_ts">Tidak Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps1" value="1" id="ps1_sts">
                                                            <label for="ps1_sts">Sangat Tidak Setuju</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- PS2 -->
                                            <div class="col-12">
                                                <div class="border-bottom pb-3">
                                                    <label class="form-label fw-semibold mb-2">2. Saya lebih memahami materi melalui penjelasan lisan atau diskusi</label>
                                                    <div class="d-flex flex-wrap gap-3">
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps2" value="5" id="ps2_ss" required>
                                                            <label for="ps2_ss">Sangat Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps2" value="4" id="ps2_s">
                                                            <label for="ps2_s">Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps2" value="3" id="ps2_n">
                                                            <label for="ps2_n">Netral</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps2" value="2" id="ps2_ts">
                                                            <label for="ps2_ts">Tidak Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps2" value="1" id="ps2_sts">
                                                            <label for="ps2_sts">Sangat Tidak Setuju</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- PS3 -->
                                            <div class="col-12">
                                                <div class="border-bottom pb-3">
                                                    <label class="form-label fw-semibold mb-2">3. Saya lebih memahami materi melalui membaca atau menulis catatan</label>
                                                    <div class="d-flex flex-wrap gap-3">
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps3" value="5" id="ps3_ss" required>
                                                            <label for="ps3_ss">Sangat Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps3" value="4" id="ps3_s">
                                                            <label for="ps3_s">Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps3" value="3" id="ps3_n">
                                                            <label for="ps3_n">Netral</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps3" value="2" id="ps3_ts">
                                                            <label for="ps3_ts">Tidak Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps3" value="1" id="ps3_sts">
                                                            <label for="ps3_sts">Sangat Tidak Setuju</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- PS4 -->
                                            <div class="col-12">
                                                <div class="pb-2">
                                                    <label class="form-label fw-semibold mb-2">4. Saya lebih cepat memahami materi melalui praktik atau pengalaman langsung</label>
                                                    <div class="d-flex flex-wrap gap-3">
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps4" value="5" id="ps4_ss" required>
                                                            <label for="ps4_ss">Sangat Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps4" value="4" id="ps4_s">
                                                            <label for="ps4_s">Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps4" value="3" id="ps4_n">
                                                            <label for="ps4_n">Netral</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps4" value="2" id="ps4_ts">
                                                            <label for="ps4_ts">Tidak Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="ps4" value="1" id="ps4_sts">
                                                            <label for="ps4_sts">Sangat Tidak Setuju</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- B. Metode Pemrosesan Informasi -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card-learning shadow-hover">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-start gap-3 mb-3">
                                            <div class="bg-success bg-opacity-10 rounded-3 p-2 flex-shrink-0">
                                                <i class="fas fa-brain fa-lg text-success"></i>
                                            </div>
                                            <div>
                                                <h5 class="fw-bold mb-0">B. Metode Pemrosesan Informasi</h5>
                                                <small class="text-muted">Cara mengolah dan memahami informasi yang diterima</small>
                                            </div>
                                        </div>
                                        
                                        <div class="row g-3">
                                            @php
                                                $mp = [
                                                    'mp1' => 'Saya menyukai materi yang disusun terstruktur dan berpola',
                                                    'mp2' => 'Saya lebih memahami materi melalui diskusi dan tanya jawab',
                                                    'mp3' => 'Saya terbiasa mencatat atau merangkum saat belajar',
                                                    'mp4' => 'Saya lebih memahami materi dengan langsung mempraktikkannya'
                                                ];
                                            @endphp
                                            @foreach($mp as $name => $text)
                                            <div class="col-12">
                                                <div class="{{ !$loop->last ? 'border-bottom pb-3' : '' }}">
                                                    <label class="form-label fw-semibold mb-2">{{ $loop->iteration }}. {{ $text }}</label>
                                                    <div class="d-flex flex-wrap gap-3">
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="5" required>
                                                            <label>Sangat Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="4">
                                                            <label>Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="3">
                                                            <label>Netral</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="2">
                                                            <label>Tidak Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="1">
                                                            <label>Sangat Tidak Setuju</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- C. Media dan Alat Belajar -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card-learning shadow-hover">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-start gap-3 mb-3">
                                            <div class="bg-warning bg-opacity-10 rounded-3 p-2 flex-shrink-0">
                                                <i class="fas fa-laptop fa-lg text-warning"></i>
                                            </div>
                                            <div>
                                                <h5 class="fw-bold mb-0">C. Media dan Alat Belajar</h5>
                                                <small class="text-muted">Preferensi terhadap sarana dan media pembelajaran</small>
                                            </div>
                                        </div>
                                        
                                        <div class="row g-3">
                                            @php
                                                $ma = [
                                                    'ma1' => 'Saya lebih nyaman belajar menggunakan video atau visualisasi',
                                                    'ma2' => 'Saya lebih nyaman belajar menggunakan audio atau rekaman suara',
                                                    'ma3' => 'Saya lebih nyaman belajar menggunakan buku atau modul tertulis',
                                                    'ma4' => 'Saya lebih nyaman belajar menggunakan alat peraga atau simulator'
                                                ];
                                            @endphp
                                            @foreach($ma as $name => $text)
                                            <div class="col-12">
                                                <div class="{{ !$loop->last ? 'border-bottom pb-3' : '' }}">
                                                    <label class="form-label fw-semibold mb-2">{{ $loop->iteration }}. {{ $text }}</label>
                                                    <div class="d-flex flex-wrap gap-3">
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="5" required>
                                                            <label>Sangat Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="4">
                                                            <label>Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="3">
                                                            <label>Netral</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="2">
                                                            <label>Tidak Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="1">
                                                            <label>Sangat Tidak Setuju</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- D. Lingkungan dan Kondisi Belajar -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card-learning shadow-hover">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-start gap-3 mb-3">
                                            <div class="bg-danger bg-opacity-10 rounded-3 p-2 flex-shrink-0">
                                                <i class="fas fa-home fa-lg text-danger"></i>
                                            </div>
                                            <div>
                                                <h5 class="fw-bold mb-0">D. Lingkungan dan Kondisi Belajar</h5>
                                                <small class="text-muted">Preferensi terhadap suasana dan lingkungan belajar</small>
                                            </div>
                                        </div>
                                        
                                        <div class="row g-3">
                                            @php
                                                $lk = [
                                                    'lk1' => 'Saya lebih fokus belajar di ruangan yang terang',
                                                    'lk2' => 'Saya lebih nyaman belajar dalam suasana yang tenang',
                                                    'lk3' => 'Saya membutuhkan akses bacaan yang memadai',
                                                    'lk4' => 'Saya lebih nyaman belajar dengan ruang gerak yang cukup'
                                                ];
                                            @endphp
                                            @foreach($lk as $name => $text)
                                            <div class="col-12">
                                                <div class="{{ !$loop->last ? 'border-bottom pb-3' : '' }}">
                                                    <label class="form-label fw-semibold mb-2">{{ $loop->iteration }}. {{ $text }}</label>
                                                    <div class="d-flex flex-wrap gap-3">
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="5" required>
                                                            <label>Sangat Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="4">
                                                            <label>Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="3">
                                                            <label>Netral</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="2">
                                                            <label>Tidak Setuju</label>
                                                        </div>
                                                        <div class="radio-option">
                                                            <input type="radio" name="{{ $name }}" value="1">
                                                            <label>Sangat Tidak Setuju</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- E. Data Diri -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card-learning shadow-hover">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-start gap-3 mb-3">
                                            <div class="bg-info bg-opacity-10 rounded-3 p-2 flex-shrink-0">
                                                <i class="fas fa-user fa-lg text-info"></i>
                                            </div>
                                            <div>
                                                <h5 class="fw-bold mb-0">E. Data Diri</h5>
                                                <small class="text-muted">Informasi identitas responden</small>
                                            </div>
                                        </div>
                                        
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                                <input type="text" name="nama_lengkap" class="form-control rounded-3" placeholder="Masukkan nama lengkap" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Email <span class="text-muted">(Opsional)</span></label>
                                                <input type="email" name="email" class="form-control rounded-3" placeholder="contoh@email.com">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-center gap-3 pt-3 border-top">
                            <button type="reset" class="btn btn-outline-custom px-5 py-2" id="resetFormBtn">
                                <i class="fas fa-undo-alt me-2"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary-custom px-5 py-2" id="submitFormBtn">
                                <i class="fas fa-calculator me-2"></i> Proses & Lihat Hasil
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Reset confirmation
    document.getElementById('resetFormBtn')?.addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Reset Kuesioner?',
            text: "Semua jawaban akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1a2a6c',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Reset!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('kuesionerForm').reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Reset Berhasil',
                    text: 'Kuesioner telah direset',
                    confirmButtonColor: '#1a2a6c',
                    timer: 1500
                });
            }
        });
    });
    
    // Submit confirmation
    document.getElementById('submitFormBtn')?.addEventListener('click', function(e) {
        let form = document.getElementById('kuesionerForm');
        let isValid = form.checkValidity();
        
        if (!isValid) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Form Belum Lengkap',
                text: 'Silakan isi semua pertanyaan sebelum memproses!',
                confirmButtonColor: '#1a2a6c'
            });
        } else {
            e.preventDefault();
            Swal.fire({
                title: 'Proses Kuesioner?',
                text: "Pastikan semua jawaban sudah sesuai dengan kebiasaan belajarmu!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#1a2a6c',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Proses!',
                cancelButtonText: 'Cek Lagi'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    });
</script>
@endpush

@push('styles')
<style>
    /* Radio option styling */
    .radio-option {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        background: #f8fafc;
        border-radius: 30px;
        transition: all 0.2s ease;
        cursor: pointer;
    }
    
    .radio-option:hover {
        background: #e2e8f0;
    }
    
    .radio-option input {
        margin: 0;
        accent-color: #1a2a6c;
        width: 16px;
        height: 16px;
        cursor: pointer;
    }
    
    .radio-option label {
        margin: 0;
        font-size: 0.85rem;
        color: #4b5563;
        cursor: pointer;
    }
    
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
    
    /* Form control */
    .form-control {
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px 16px;
        transition: all 0.2s;
    }
    
    .form-control:focus {
        border-color: #1a2a6c;
        box-shadow: 0 0 0 3px rgba(26, 42, 108, 0.1);
    }
    
    /* Form label */
    .form-label {
        font-size: 0.9rem;
        color: #1f2937;
    }
    
    /* Border bottom */
    .border-bottom {
        border-bottom-color: #f0f2f5 !important;
    }
</style>
@endpush
@endsection
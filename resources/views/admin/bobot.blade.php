@extends('layouts.app')

@section('title', 'Kelola Bobot Kriteria')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card-custom">
                <div class="card-header bg-transparent border-0 pt-4 px-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h4 class="fw-bold mb-0"><i class="fas fa-balance-scale text-primary me-2"></i>Kelola Bobot Kriteria</h4>
                            <p class="text-muted small mt-1">Atur bobot kepentingan setiap kriteria (Metode AHP)</p>
                        </div>
                        <div>
                            <span class="badge-custom bg-primary text-white px-3 py-2">
                                <i class="fas fa-calculator me-1"></i> AHP & SAW
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 pb-4">
                    <!-- Info Panel -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card-stat shadow-hover bg-light border-0">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                                            <i class="fas fa-info-circle fa-2x text-primary"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-0">Tentang Bobot Kriteria</h6>
                                            <small class="text-muted">Bobot diperoleh dari hasil perhitungan AHP berdasarkan wawancara dengan pakar pendidikan. Total bobot harus 1 (100%).</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.bobot.update') }}" method="POST" id="bobotForm">
                        @csrf
                        
                        <!-- Preferensi Sensorik -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card-learning shadow-hover">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="bg-primary bg-opacity-10 rounded-3 p-2 flex-shrink-0">
                                                <i class="fas fa-eye fa-lg text-primary"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
                                                    <div>
                                                        <h5 class="fw-bold mb-0">Preferensi Sensorik</h5>
                                                        <small class="text-muted">Kecenderungan dalam menerima informasi melalui panca indera</small>
                                                    </div>
                                                    <div class="fw-bold text-primary" id="preferensi_sensorik_percent">0%</div>
                                                </div>
                                                <div class="mt-3">
                                                    <input type="range" name="preferensi_sensorik" id="preferensi_sensorik" 
                                                           class="form-range" step="0.01" min="0" max="1" 
                                                           value="{{ $bobot['preferensi_sensorik'] ?? 0.35 }}"
                                                           oninput="updateValue('preferensi_sensorik', this.value)">
                                                    <div class="d-flex justify-content-between mt-1">
                                                        <small class="text-muted">0%</small>
                                                        <small class="text-muted">25%</small>
                                                        <small class="text-muted">50%</small>
                                                        <small class="text-muted">75%</small>
                                                        <small class="text-muted">100%</small>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light">Nilai Bobot</span>
                                                        <input type="number" id="preferensi_sensorik_input" 
                                                               class="form-control" step="0.01" min="0" max="1"
                                                               value="{{ $bobot['preferensi_sensorik'] ?? 0.35 }}"
                                                               oninput="updateSlider('preferensi_sensorik', this.value)">
                                                        <span class="input-group-text bg-light">(0 - 1)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Metode Pemrosesan Informasi -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card-learning shadow-hover">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="bg-success bg-opacity-10 rounded-3 p-2 flex-shrink-0">
                                                <i class="fas fa-brain fa-lg text-success"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
                                                    <div>
                                                        <h5 class="fw-bold mb-0">Metode Pemrosesan Informasi</h5>
                                                        <small class="text-muted">Cara mengolah dan memahami informasi yang diterima</small>
                                                    </div>
                                                    <div class="fw-bold text-success" id="metode_pemrosesan_percent">0%</div>
                                                </div>
                                                <div class="mt-3">
                                                    <input type="range" name="metode_pemrosesan" id="metode_pemrosesan" 
                                                           class="form-range" step="0.01" min="0" max="1" 
                                                           value="{{ $bobot['metode_pemrosesan'] ?? 0.30 }}"
                                                           oninput="updateValue('metode_pemrosesan', this.value)">
                                                    <div class="d-flex justify-content-between mt-1">
                                                        <small class="text-muted">0%</small>
                                                        <small class="text-muted">25%</small>
                                                        <small class="text-muted">50%</small>
                                                        <small class="text-muted">75%</small>
                                                        <small class="text-muted">100%</small>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light">Nilai Bobot</span>
                                                        <input type="number" id="metode_pemrosesan_input" 
                                                               class="form-control" step="0.01" min="0" max="1"
                                                               value="{{ $bobot['metode_pemrosesan'] ?? 0.30 }}"
                                                               oninput="updateSlider('metode_pemrosesan', this.value)">
                                                        <span class="input-group-text bg-light">(0 - 1)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Media dan Alat Belajar -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card-learning shadow-hover">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="bg-warning bg-opacity-10 rounded-3 p-2 flex-shrink-0">
                                                <i class="fas fa-laptop fa-lg text-warning"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
                                                    <div>
                                                        <h5 class="fw-bold mb-0">Media dan Alat Belajar</h5>
                                                        <small class="text-muted">Preferensi terhadap sarana dan media pembelajaran</small>
                                                    </div>
                                                    <div class="fw-bold text-warning" id="media_alat_belajar_percent">0%</div>
                                                </div>
                                                <div class="mt-3">
                                                    <input type="range" name="media_alat_belajar" id="media_alat_belajar" 
                                                           class="form-range" step="0.01" min="0" max="1" 
                                                           value="{{ $bobot['media_alat_belajar'] ?? 0.20 }}"
                                                           oninput="updateValue('media_alat_belajar', this.value)">
                                                    <div class="d-flex justify-content-between mt-1">
                                                        <small class="text-muted">0%</small>
                                                        <small class="text-muted">25%</small>
                                                        <small class="text-muted">50%</small>
                                                        <small class="text-muted">75%</small>
                                                        <small class="text-muted">100%</small>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light">Nilai Bobot</span>
                                                        <input type="number" id="media_alat_belajar_input" 
                                                               class="form-control" step="0.01" min="0" max="1"
                                                               value="{{ $bobot['media_alat_belajar'] ?? 0.20 }}"
                                                               oninput="updateSlider('media_alat_belajar', this.value)">
                                                        <span class="input-group-text bg-light">(0 - 1)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Lingkungan dan Kondisi Belajar -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card-learning shadow-hover">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="bg-danger bg-opacity-10 rounded-3 p-2 flex-shrink-0">
                                                <i class="fas fa-home fa-lg text-danger"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
                                                    <div>
                                                        <h5 class="fw-bold mb-0">Lingkungan dan Kondisi Belajar</h5>
                                                        <small class="text-muted">Preferensi terhadap suasana dan lingkungan belajar</small>
                                                    </div>
                                                    <div class="fw-bold text-danger" id="lingkungan_kondisi_percent">0%</div>
                                                </div>
                                                <div class="mt-3">
                                                    <input type="range" name="lingkungan_kondisi" id="lingkungan_kondisi" 
                                                           class="form-range" step="0.01" min="0" max="1" 
                                                           value="{{ $bobot['lingkungan_kondisi'] ?? 0.15 }}"
                                                           oninput="updateValue('lingkungan_kondisi', this.value)">
                                                    <div class="d-flex justify-content-between mt-1">
                                                        <small class="text-muted">0%</small>
                                                        <small class="text-muted">25%</small>
                                                        <small class="text-muted">50%</small>
                                                        <small class="text-muted">75%</small>
                                                        <small class="text-muted">100%</small>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light">Nilai Bobot</span>
                                                        <input type="number" id="lingkungan_kondisi_input" 
                                                               class="form-control" step="0.01" min="0" max="1"
                                                               value="{{ $bobot['lingkungan_kondisi'] ?? 0.15 }}"
                                                               oninput="updateSlider('lingkungan_kondisi', this.value)">
                                                        <span class="input-group-text bg-light">(0 - 1)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Total Bobot Card -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card-stat shadow-hover" id="totalCard" style="border-left: 5px solid #1a2a6c;">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                                            <div>
                                                <h5 class="fw-bold mb-0">Total Bobot</h5>
                                                <small class="text-muted">Jumlah seluruh bobot kriteria</small>
                                            </div>
                                            <div class="text-end">
                                                <h2 class="fw-bold mb-0" id="totalBobot">0.00</h2>
                                                <small class="text-muted" id="totalStatus">Harus = 1 (100%)</small>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="progress-custom" style="height: 10px;">
                                                <div class="progress-bar-custom" id="totalProgress" style="width: 0%; background: #1a2a6c; height: 10px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-end gap-3 pt-3 border-top">
                            <button type="button" class="btn btn-outline-custom" id="resetBtn">
                                <i class="fas fa-undo-alt me-2"></i> Reset ke Default
                            </button>
                            <button type="submit" class="btn btn-primary-custom" id="submitBtn">
                                <i class="fas fa-save me-2"></i> Simpan Perubahan
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
    // Bobot default
    const defaultBobot = {
        preferensi_sensorik: 0.35,
        metode_pemrosesan: 0.30,
        media_alat_belajar: 0.20,
        lingkungan_kondisi: 0.15
    };
    
    // Update value dari slider
    function updateValue(id, value) {
        let numValue = parseFloat(value);
        document.getElementById(id + '_input').value = numValue.toFixed(2);
        document.getElementById(id + '_percent').innerHTML = (numValue * 100).toFixed(0) + '%';
        hitungTotal();
    }
    
    // Update slider dari input number
    function updateSlider(id, value) {
        let numValue = parseFloat(value);
        if (isNaN(numValue)) numValue = 0;
        if (numValue < 0) numValue = 0;
        if (numValue > 1) numValue = 1;
        document.getElementById(id).value = numValue;
        document.getElementById(id + '_percent').innerHTML = (numValue * 100).toFixed(0) + '%';
        hitungTotal();
    }
    
    // Hitung total bobot
    function hitungTotal() {
        let ps = parseFloat(document.getElementById('preferensi_sensorik').value) || 0;
        let mp = parseFloat(document.getElementById('metode_pemrosesan').value) || 0;
        let ma = parseFloat(document.getElementById('media_alat_belajar').value) || 0;
        let lk = parseFloat(document.getElementById('lingkungan_kondisi').value) || 0;
        let total = ps + mp + ma + lk;
        
        document.getElementById('totalBobot').innerHTML = total.toFixed(2);
        document.getElementById('totalProgress').style.width = (total * 100) + '%';
        
        let totalCard = document.getElementById('totalCard');
        let totalStatus = document.getElementById('totalStatus');
        let submitBtn = document.getElementById('submitBtn');
        
        if (Math.abs(total - 1) <= 0.01) {
            totalCard.style.borderLeftColor = '#10b981';
            totalStatus.innerHTML = '✓ Total bobot sudah benar (100%)';
            totalStatus.style.color = '#10b981';
            submitBtn.disabled = false;
            submitBtn.style.opacity = '1';
        } else {
            totalCard.style.borderLeftColor = '#ef4444';
            totalStatus.innerHTML = '⚠️ Total bobot harus 1 (100%) - Saat ini: ' + (total * 100).toFixed(0) + '%';
            totalStatus.style.color = '#ef4444';
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.5';
        }
    }
    
    // Reset ke default
    document.getElementById('resetBtn')?.addEventListener('click', function() {
        updateSlider('preferensi_sensorik', defaultBobot.preferensi_sensorik);
        updateSlider('metode_pemrosesan', defaultBobot.metode_pemrosesan);
        updateSlider('media_alat_belajar', defaultBobot.media_alat_belajar);
        updateSlider('lingkungan_kondisi', defaultBobot.lingkungan_kondisi);
        
        Swal.fire({
            icon: 'info',
            title: 'Reset Berhasil',
            text: 'Bobot dikembalikan ke nilai default (0.35, 0.30, 0.20, 0.15)',
            confirmButtonColor: '#1a2a6c',
            timer: 2000
        });
    });
    
    // Inisialisasi nilai awal
    function init() {
        updateValue('preferensi_sensorik', document.getElementById('preferensi_sensorik').value);
        updateValue('metode_pemrosesan', document.getElementById('metode_pemrosesan').value);
        updateValue('media_alat_belajar', document.getElementById('media_alat_belajar').value);
        updateValue('lingkungan_kondisi', document.getElementById('lingkungan_kondisi').value);
    }
    
    init();
</script>
@endpush

@push('styles')
<style>
    /* Range slider styling */
    .form-range {
        width: 100%;
        height: 6px;
        -webkit-appearance: none;
        background: #e2e8f0;
        border-radius: 10px;
    }
    
    .form-range:focus {
        outline: none;
    }
    
    .form-range::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #1a2a6c;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        transition: all 0.2s;
    }
    
    .form-range::-webkit-slider-thumb:hover {
        transform: scale(1.2);
    }
    
    /* Card learning */
    .card-learning {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        transition: all 0.3s ease;
    }
    
    .card-learning:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }
    
    /* Card stat */
    .card-stat {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        transition: all 0.3s ease;
    }
    
    .shadow-hover:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
    }
    
    /* Input group */
    .input-group-text {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        font-size: 0.8rem;
    }
    
    /* Disabled button */
    .btn-primary-custom:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
</style>
@endpush
@endsection
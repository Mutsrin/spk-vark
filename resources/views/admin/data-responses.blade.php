@extends('layouts.app')

@section('title', 'Data Responden')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card-custom">
                <div class="card-header bg-transparent border-0 pt-4 px-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h4 class="fw-bold mb-0"><i class="fas fa-users text-primary me-2"></i>Data Responden</h4>
                            <p class="text-muted small mt-1">Kelola semua data responden yang telah mengisi kuesioner</p>
                        </div>
                        <div>
                            <span class="badge-custom bg-primary text-white px-3 py-2">
                                <i class="fas fa-chart-line me-1"></i> Total: {{ $responses->total() }} Responden
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 pb-4">
                    <!-- Search & Filter -->
                    <div class="row mb-4 g-3">
                        <div class="col-md-6">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="text" id="searchInput" class="form-control border-start-0" placeholder="Cari nama atau email...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select id="filterGaya" class="form-select shadow-sm">
                                <option value="">Semua Gaya Belajar</option>
                                <option value="Visual">Visual</option>
                                <option value="Auditory">Auditory</option>
                                <option value="Read/Write">Read/Write</option>
                                <option value="Kinesthetic">Kinesthetic</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Tabel Data Responden -->
                    <div class="table-responsive">
                        <table class="table table-custom table-hover align-middle" id="respondenTable" style="min-width: 1200px;">
                            <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th style="width: 15%">Nama</th>
                                    <th style="width: 15%">Email</th>
                                    <th style="width: 12%">Visual</th>
                                    <th style="width: 12%">Auditory</th>
                                    <th style="width: 12%">Read/Write</th>
                                    <th style="width: 12%">Kinesthetic</th>
                                    <th style="width: 10%">Rekomendasi</th>
                                    <th style="width: 7%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($responses as $response)
                                <tr>
                                    <td class="align-middle">
                                        <span class="fw-bold text-primary">#{{ $response->id }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-placeholder rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 32px; height: 32px;">
                                                <span class="text-primary fw-bold small">{{ substr($response->nama_lengkap, 0, 1) }}</span>
                                            </div>
                                            <span class="text-truncate" style="max-width: 150px;">{{ $response->nama_lengkap }}</span>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-truncate d-block" style="max-width: 150px;">{{ $response->email ?? '-' }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold text-primary">{{ number_format($response->nilai_visual, 3) }}</span>
                                            <div class="progress-custom" style="height: 4px; width: 100%;">
                                                <div class="progress-bar-custom bg-primary" style="width: {{ min($response->nilai_visual * 100, 100) }}%; height: 4px;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold text-success">{{ number_format($response->nilai_auditory, 3) }}</span>
                                            <div class="progress-custom" style="height: 4px; width: 100%;">
                                                <div class="progress-bar-custom bg-success" style="width: {{ min($response->nilai_auditory * 100, 100) }}%; height: 4px;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold text-warning">{{ number_format($response->nilai_readwrite, 3) }}</span>
                                            <div class="progress-custom" style="height: 4px; width: 100%;">
                                                <div class="progress-bar-custom bg-warning" style="width: {{ min($response->nilai_readwrite * 100, 100) }}%; height: 4px;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold text-danger">{{ number_format($response->nilai_kinesthetic, 3) }}</span>
                                            <div class="progress-custom" style="height: 4px; width: 100%;">
                                                <div class="progress-bar-custom bg-danger" style="width: {{ min($response->nilai_kinesthetic * 100, 100) }}%; height: 4px;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <span class="badge-custom text-white px-3 py-2 shadow-sm d-inline-block text-center" style="min-width: 100px; background: {{ 
                                            $response->rekomendasi_terbaik == 'Visual' ? '#3b82f6' : 
                                            ($response->rekomendasi_terbaik == 'Auditory' ? '#10b981' : 
                                            ($response->rekomendasi_terbaik == 'Read/Write' ? '#f59e0b' : '#ef4444')) 
                                        }};">
                                            <i class="fas fa-{{ 
                                                $response->rekomendasi_terbaik == 'Visual' ? 'eye' : 
                                                ($response->rekomendasi_terbaik == 'Auditory' ? 'headphones' : 
                                                ($response->rekomendasi_terbaik == 'Read/Write' ? 'book' : 'running')) 
                                            }} me-1"></i>
                                            {{ $response->rekomendasi_terbaik }}
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('admin.show-response', $response->id) }}" class="btn btn-sm btn-info rounded-circle shadow-sm" style="width: 32px; height: 32px; background: #3b82f6; border: none;" title="Detail">
                                                <i class="fas fa-eye text-white fa-xs"></i>
                                            </a>
                                            <form action="{{ route('admin.delete-response', $response->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger rounded-circle shadow-sm delete-btn" style="width: 32px; height: 32px; background: #ef4444; border: none;" title="Hapus">
                                                    <i class="fas fa-trash text-white fa-xs"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center py-5">
                                        <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                        <h5 class="text-muted">Belum ada data responden</h5>
                                        <p class="text-muted small">Responden yang mengisi kuesioner akan muncul di sini</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    @if($responses->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top flex-wrap gap-3">
                        <div class="text-muted small">
                            <i class="fas fa-database me-1"></i> 
                            Menampilkan {{ $responses->firstItem() ?? 0 }} - {{ $responses->lastItem() ?? 0 }} dari {{ $responses->total() }} responden
                        </div>
                        <div>
                            {{ $responses->links() }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Search functionality
    document.getElementById('searchInput')?.addEventListener('keyup', function() {
        let searchText = this.value.toLowerCase();
        let rows = document.querySelectorAll('#respondenTable tbody tr');
        
        rows.forEach(row => {
            if (row.querySelector('td')) {
                let name = row.cells[1]?.innerText.toLowerCase() || '';
                let email = row.cells[2]?.innerText.toLowerCase() || '';
                if (name.includes(searchText) || email.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });
    
    // Filter by gaya belajar
    document.getElementById('filterGaya')?.addEventListener('change', function() {
        let filterValue = this.value;
        let rows = document.querySelectorAll('#respondenTable tbody tr');
        
        rows.forEach(row => {
            if (row.querySelector('td')) {
                let rekomendasiCell = row.cells[7];
                if (rekomendasiCell) {
                    let rekomendasi = rekomendasiCell.innerText || '';
                    if (filterValue === '' || rekomendasi.includes(filterValue)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            }
        });
    });
    
    // Delete confirmation with Sweet Alert
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            let form = this.closest('.delete-form');
            let row = this.closest('tr');
            let nama = row?.cells[1]?.innerText || 'responden ini';
            
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                html: `Data responden <strong>${nama}</strong> akan dihapus secara permanen!`,
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
    /* Avatar styling */
    .avatar-placeholder {
        transition: all 0.2s ease;
    }
    
    .avatar-placeholder:hover {
        transform: scale(1.05);
        background-color: rgba(59, 130, 246, 0.2) !important;
    }
    
    /* Table styling */
    .table-custom {
        border-radius: 16px;
        overflow: hidden;
    }
    
    .table-custom thead th {
        background: #f8fafc;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #475569;
        padding: 14px 12px;
        border-bottom: 2px solid #e2e8f0;
    }
    
    .table-custom tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        border-bottom: 1px solid #f0f2f5;
    }
    
    .table-custom tbody tr {
        transition: all 0.2s ease;
    }
    
    .table-custom tbody tr:hover {
        background-color: #f8fafc;
    }
    
    /* Badge styling */
    .badge-custom {
        font-weight: 600;
        font-size: 0.75rem;
        border-radius: 30px;
    }
    
    /* Progress bar */
    .progress-custom {
        background-color: #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
    }
    
    /* Pagination styling */
    .pagination {
        margin: 0;
        gap: 4px;
    }
    
    .page-item .page-link {
        border-radius: 10px;
        margin: 0 2px;
        color: #1a2a6c;
        border: 1px solid #e2e8f0;
        padding: 6px 12px;
        font-size: 0.8rem;
        background: white;
    }
    
    .page-item.active .page-link {
        background: #1a2a6c;
        border-color: #1a2a6c;
        color: white;
    }
    
    .page-link:hover {
        background: #f8fafc;
        border-color: #1a2a6c;
        color: #1a2a6c;
    }
    
    .page-item.disabled .page-link {
        color: #cbd5e1;
        background: #f8fafc;
    }
    
    /* Text truncate */
    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    /* Tooltip style */
    [title] {
        cursor: help;
    }
</style>
@endpush
@endsection
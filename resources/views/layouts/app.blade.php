<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Gaya Belajar VARK - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Sweet Alert CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    * {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    
    body {
        background-color: #f0f2f5;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    
    /* Navbar */
    .navbar {
        background: white !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 1rem 0;
    }
    
    .navbar-brand {
        font-weight: 800;
        font-size: 1.35rem;
        color: #1a2a6c !important;
        letter-spacing: -0.3px;
    }
    
    .navbar-brand i {
        color: #4f46e5;
    }
    
    .nav-link {
        font-weight: 500;
        color: #4b5563 !important;
        padding: 0.5rem 1rem !important;
        border-radius: 10px;
        transition: all 0.2s;
    }
    
    .nav-link:hover {
        background: #f3f4f6;
        color: #1f2937 !important;
    }
    
    .btn-login-nav {
        background: #1a2a6c !important;
        color: white !important;
        border-radius: 10px !important;
    }
    
    .btn-login-nav:hover {
        background: #0f1a4a !important;
    }
    
    /* Card dengan shadow dan border yang lebih jelas */
    .card-custom {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        overflow: hidden;
    }
    
    .card-custom:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
    }
    
    /* Card statistik dengan efek timbul */
    .card-stat {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        overflow: hidden;
    }
    
    .card-stat:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        transform: translateY(-3px);
    }
    
    /* Card gaya belajar dengan border kiri lebih tebal */
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
    
    /* Buttons */
    .btn-primary-custom {
        background: #1a2a6c;
        border: none;
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s;
        color: white !important;
    }
    
    .btn-primary-custom:hover {
        background: #0f1a4a;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(26, 42, 108, 0.3);
        color: white !important;
    }
    
    .btn-outline-custom {
        background: transparent;
        border: 1px solid #e5e7eb;
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 500;
        color: #4b5563;
        transition: all 0.2s;
    }
    
    .btn-outline-custom:hover {
        background: #f9fafb;
        border-color: #1a2a6c;
        transform: translateY(-2px);
    }
    
    /* Footer */
    .footer {
        background: white;
        margin-top: auto;
        padding: 1.5rem 0;
        text-align: center;
        color: #9ca3af;
        font-size: 0.85rem;
        border-top: 1px solid #e2e8f0;
        box-shadow: 0 -2px 8px rgba(0,0,0,0.02);
    }
    
    /* Hero */
    .hero {
        background: linear-gradient(135deg, #1a2a6c 0%, #2d3a7c 100%);
        padding: 80px 0;
        margin-bottom: 50px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    
    /* Progress */
    .progress-custom {
        background: #e5e7eb;
        border-radius: 30px;
        overflow: hidden;
    }
    
    .progress-bar-custom {
        border-radius: 30px;
    }
    
    /* Radio Option */
    .radio-option {
        display: inline-flex;
        align-items: center;
        margin-right: 1rem;
        margin-bottom: 0.5rem;
    }
    
    .radio-option input {
        margin-right: 0.4rem;
        accent-color: #1a2a6c;
    }
    
    .radio-option label {
        font-size: 0.85rem;
        color: #4b5563;
    }
    
    /* Table dengan border lebih jelas */
    .table-custom {
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
    }
    
    .table-custom thead {
        background: #f8fafc;
        border-bottom: 2px solid #e2e8f0;
    }
    
    .table-custom th {
        color: #1f2937;
        font-weight: 600;
        font-size: 0.85rem;
        padding: 1rem;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .table-custom td {
        padding: 1rem;
        font-size: 0.85rem;
        vertical-align: middle;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .table-custom tr:hover {
        background-color: #f8fafc;
    }
    
    /* Badge */
    .badge-custom {
        padding: 6px 14px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.75rem;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    
    main {
        flex: 1;
    }
    
    /* Container padding */
    .container {
        padding-left: 1.5rem !important;
        padding-right: 1.5rem !important;
    }
    
    /* Shadow tambahan untuk elemen tertentu */
    .shadow-hover {
        transition: all 0.3s ease;
    }
    
    .shadow-hover:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
        transform: translateY(-3px);
    }
    
    /* Border gradient untuk card stat */
    .border-gradient {
        position: relative;
        overflow: hidden;
    }
    
    .border-gradient::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #1a2a6c, #4f46e5, #1a2a6c);
    }
    /* Table row hover effect */
.table-custom tbody tr {
    transition: all 0.2s ease;
    border-left: 3px solid transparent;
}

.table-custom tbody tr:hover {
    background-color: #f8fafc;
    border-left-color: #1a2a6c;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

/* Pagination Styling */
.pagination {
    gap: 5px;
}

.page-item .page-link {
    border-radius: 10px;
    margin: 0 2px;
    color: #1a2a6c;
    border: 1px solid #e2e8f0;
    padding: 8px 14px;
    font-weight: 500;
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
}
/* Table wrapper untuk horizontal scroll */
.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

/* Fix table min-width */
.table-custom {
    min-width: 1000px;
}

/* Styling untuk badge rekomendasi */
.badge-custom {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    font-weight: 600;
    font-size: 0.75rem;
    border-radius: 30px;
    padding: 6px 14px;
    white-space: nowrap;
}

/* Hover effect untuk button aksi */
.btn-circle {
    transition: all 0.2s ease;
}

.btn-circle:hover {
    transform: scale(1.05);
    opacity: 0.9;
}
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
/* Radio option styling */
.radio-option {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    background: #f8fafc;
    border-radius: 30px;
    transition: all 0.2s ease;
    cursor: pointer;
    border: 1px solid #e2e8f0;
}

.radio-option:hover {
    background: #e2e8f0;
    transform: translateY(-1px);
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
    font-size: 0.8rem;
    font-weight: 500;
    color: #4b5563;
    cursor: pointer;
}

/* Selected radio option */
.radio-option:has(input:checked) {
    background: rgba(26, 42, 108, 0.1);
    border-color: #1a2a6c;
}

.radio-option:has(input:checked) label {
    color: #1a2a6c;
    font-weight: 600;
}
</style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-graduation-cap me-2"></i>SPK VARK
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kuesioner') }}">Kuesioner</a>
                    </li>
                    @auth
                        @if(Auth::user()->isAdmin())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-shield me-1"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.data-responses') }}">Data Responden</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.bobot') }}">Kelola Bobot</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item" id="logout-btn">
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn-login-nav" href="{{ route('login') }}">Login Admin</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <span>Sistem Pendukung Keputusan Rekomendasi Gaya Belajar Efektif - Metode AHP & SAW</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Sweet Alert Script -->
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: true,
                confirmButtonColor: '#1a2a6c',
                timer: 3000
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#1a2a6c'
            });
        @endif
        
        // Logout confirmation
        document.getElementById('logout-btn')?.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin logout?',
                text: "Anda akan keluar dari halaman admin!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#1a2a6c',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        });
    </script>
    @stack('scripts')
    
</body>
</html>
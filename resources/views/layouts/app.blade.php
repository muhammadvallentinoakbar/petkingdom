<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pet Kingdom</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body{
            font-family:'Poppins',sans-serif;
            background:#F4F7FA;
            min-height:100vh;
            display:flex;
            flex-direction:column;
        }

        /* Navbar */
        .navbar-custom{
            background:linear-gradient(90deg,#16A34A,#22C55E);
        }

        .navbar-brand{
            font-size:24px;
            font-weight:700;
        }

        .nav-link{
            font-weight:500;
        }

        .nav-link:hover{
            color:#FFD700 !important;
        }

        /* Hero */
        .hero{
            background:linear-gradient(135deg,#16A34A,#22C55E);
            color:white;
            border-radius:20px;
            padding:60px;
            margin-bottom:40px;
        }

        .hero h1{
            font-weight:700;
        }

        /* Card */
        .card{
            border:none;
            border-radius:15px;
        }

        .card-hover{
            transition:.3s;
        }

        .card-hover:hover{
            transform:translateY(-8px);
            box-shadow:0 15px 30px rgba(0,0,0,.15);
        }

        /* Button */
        .btn-success{
            background:#16A34A;
            border:none;
        }

        .btn-success:hover{
            background:#15803D;
        }

        /* Main */
        main{
            flex:1;
        }

        /* Footer */
        .footer{
            background:#111827;
            color:white;
            padding:20px;
            margin-top:50px;
        }

        .footer a{
            color:#22C55E;
            text-decoration:none;
        }

        .footer a:hover{
            color:white;
        }
    </style>

</head>

<body>

    {{-- Navbar --}}
    @include('layouts.navigation')
    

    {{-- Content --}}
    <main class="container mt-4">
        @yield('content')
    </main>

    {{-- Footer --}}
<footer class="footer mt-5 pt-5 pb-4 text-white" style="background: linear-gradient(135deg,#0f172a,#111827);">

    <div class="container">
        <div class="row g-4">

            <!-- Brand -->
            <div class="col-md-4">
                <h4 class="fw-bold mb-3">🐾 Pet Kingdom</h4>
                <p class="text-white-50">
                    Solusi lengkap kebutuhan hewan peliharaan Anda.
                    Mulai dari makanan, aksesoris, hingga perawatan terbaik.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4">
                <h5 class="fw-semibold mb-3">Menu</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ url('/') }}" class="text-white-50 text-decoration-none hover-link">
                            <i class="fa fa-home me-2"></i> Home
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('products.index') }}" class="text-white-50 text-decoration-none hover-link">
                            <i class="fa fa-paw me-2"></i> Produk
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('orders.index') }}" class="text-white-50 text-decoration-none hover-link">
                            <i class="fa fa-shopping-cart me-2"></i> Pesanan
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-md-4">
                <h5 class="fw-semibold mb-3">Kontak</h5>
                <p class="text-white-50 mb-2">
                    <i class="fa fa-envelope me-2"></i> support@petkingdom.com
                </p>
                <p class="text-white-50 mb-2">
                    <i class="fa fa-phone me-2"></i> +62 812-3456-7890
                </p>
            </div>

        </div>

        <hr class="border-secondary my-4">

        <div class="text-center text-white-50">
            <small>
                © {{ date('Y') }} <b class="text-white">Pet Kingdom </b>. Muhammad Vallentino Akbar.
            </small>
        </div>
    </div>

</footer>

<style>
    .hover-link {
        transition: 0.3s;
    }

    .hover-link:hover {
        color: #22C55E !important;
        padding-left: 5px;
    }

    .hover-icon {
        transition: 0.3s;
    }

    .hover-icon:hover {
        color: #22C55E !important;
        transform: translateY(-3px);
    }
</style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
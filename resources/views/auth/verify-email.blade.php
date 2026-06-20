<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Email - Pet Kingdom</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

        body{
            margin:0;
            padding:0;
            font-family:'Segoe UI', sans-serif;
            background: url('https://images.unsplash.com/photo-1517423440428-a5a00ad493e8') no-repeat center center/cover;
            height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        body::before{
            content:"";
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.55);
        }

        .verify-card{
            position:relative;
            width:100%;
            max-width:500px;
            padding:30px;
            border-radius:18px;

            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);

            box-shadow:0 10px 40px rgba(0,0,0,0.3);
            color:white;
            text-align:center;
        }

        .logo{
            margin-bottom:15px;
        }

        .logo i{
            font-size:45px;
            color:#22c55e;
        }

        .text-info-custom{
            font-size:14px;
            color:#ddd;
            margin-bottom:15px;
        }

        .btn-primary-custom{
            background:#22c55e;
            border:none;
            padding:10px 15px;
            border-radius:10px;
            font-weight:bold;
            width:100%;
        }

        .btn-primary-custom:hover{
            background:#16a34a;
        }

        .btn-logout{
            background:transparent;
            border:1px solid #fff;
            color:#fff;
            padding:8px 15px;
            border-radius:10px;
            width:100%;
            margin-top:10px;
        }

        .btn-logout:hover{
            background:rgba(255,255,255,0.1);
        }

        .alert-success{
            background:rgba(34,197,94,0.2);
            border:1px solid #22c55e;
            color:#fff;
        }

    </style>
</head>

<body>

<div class="verify-card">

    <!-- LOGO -->
    <div class="logo">
        <i class="fa-solid fa-paw"></i>
        <h4 class="mt-2">Pet Kingdom</h4>
        <small>Email Verification</small>
    </div>

    <!-- TEXT -->
    <div class="text-info-custom">
        Thanks for signing up! Please verify your email before continuing.
    </div>

    <!-- STATUS -->
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            A new verification link has been sent to your email.
        </div>
    @endif

    <!-- RESEND -->
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <button type="submit" class="btn btn-primary-custom">
            <i class="fa fa-paper-plane"></i> Resend Verification Email
        </button>
    </form>

    <!-- LOGOUT -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="btn btn-logout">
            <i class="fa fa-sign-out-alt"></i> Logout
        </button>
    </form>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pet Kingdom - Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

        body{
            margin:0;
            padding:0;
            font-family: 'Segoe UI', sans-serif;
            background: url('https://images.unsplash.com/photo-1601758228041-f3b2795255f1') no-repeat center center/cover;
            height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        /* overlay gelap */
        body::before{
            content:"";
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.55);
        }

        .login-card{
            position:relative;
            width:100%;
            max-width:420px;
            padding:30px;
            border-radius:18px;

            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);

            box-shadow:0 10px 40px rgba(0,0,0,0.3);
            color:white;
        }

        .logo{
            text-align:center;
            margin-bottom:20px;
        }

        .logo i{
            font-size:40px;
            color:#22c55e;
        }

        .form-control{
            background: rgba(255,255,255,0.2);
            border:none;
            color:white;
        }

        .form-control::placeholder{
            color:#ddd;
        }

        .form-control:focus{
            box-shadow:none;
            border:1px solid #22c55e;
        }

        .btn-login{
            background:#22c55e;
            border:none;
            width:100%;
            padding:10px;
            border-radius:10px;
            font-weight:bold;
        }

        .btn-login:hover{
            background:#16a34a;
        }

        .text-small{
            font-size:13px;
        }

    </style>
</head>

<body>

<div class="login-card">

    <!-- LOGO -->
    <div class="logo">
        <i class="fa-solid fa-paw"></i>
        <h4 class="mt-2">Pet Kingdom</h4>
        <small>Login to your account</small>
    </div>

    <!-- SESSION ERROR -->
    @if(session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif

    <!-- FORM -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- EMAIL -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="admin@gmail.com" required>
        </div>

        <!-- PASSWORD -->
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="********" required>
        </div>

        <!-- REMEMBER -->
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label text-small">Remember me</label>
        </div>

        <!-- BUTTON -->
        <button type="submit" class="btn btn-login">
            <i class="fa fa-sign-in-alt"></i> Login
        </button>

    </form>

</div>

</body>
</html>
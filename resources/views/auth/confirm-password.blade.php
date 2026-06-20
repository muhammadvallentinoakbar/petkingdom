<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Password - Pet Kingdom</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

        body{
            margin:0;
            padding:0;
            font-family: 'Segoe UI', sans-serif;
            background: url('https://images.unsplash.com/photo-1558788353-f76d92427f16') no-repeat center center/cover;
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

        .confirm-card{
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

        .form-control:focus{
            box-shadow:none;
            border:1px solid #22c55e;
        }

        .btn-confirm{
            background:#22c55e;
            border:none;
            width:100%;
            padding:10px;
            border-radius:10px;
            font-weight:bold;
        }

        .btn-confirm:hover{
            background:#16a34a;
        }

        .text-muted-custom{
            color:#ddd;
            font-size:14px;
            text-align:center;
            margin-bottom:20px;
        }

    </style>
</head>

<body>

<div class="confirm-card">

    <!-- LOGO -->
    <div class="logo">
        <i class="fa-solid fa-paw"></i>
        <h4 class="mt-2">Pet Kingdom</h4>
        <small>Security Confirmation</small>
    </div>

    <!-- TEXT -->
    <div class="text-muted-custom">
        This is a secure area. Please confirm your password before continuing.
    </div>

    <!-- FORM -->
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- PASSWORD -->
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- BUTTON -->
        <button type="submit" class="btn btn-confirm">
            <i class="fa fa-check"></i> Confirm Password
        </button>

    </form>

</div>

</body>
</html>
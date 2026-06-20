<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - Pet Kingdom</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

        body{
            margin:0;
            padding:0;
            font-family:'Segoe UI', sans-serif;
            background: url('https://images.unsplash.com/photo-1543852786-1cf6624b9987') no-repeat center center/cover;
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

        .reset-card{
            position:relative;
            width:100%;
            max-width:450px;
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

        .btn-reset{
            background:#22c55e;
            border:none;
            width:100%;
            padding:10px;
            border-radius:10px;
            font-weight:bold;
        }

        .btn-reset:hover{
            background:#16a34a;
        }

        .error-text{
            color:#ff6b6b;
            font-size:13px;
        }

    </style>
</head>

<body>

<div class="reset-card">

    <!-- LOGO -->
    <div class="logo">
        <i class="fa-solid fa-paw"></i>
        <h4 class="mt-2">Pet Kingdom</h4>
        <small>Reset Your Password</small>
    </div>

    <!-- FORM -->
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- TOKEN -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- EMAIL -->
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $request->email) }}" required>
            @error('email')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- PASSWORD -->
        <div class="mb-3">
            <label>New Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- CONFIRM PASSWORD -->
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <!-- BUTTON -->
        <button type="submit" class="btn btn-reset">
            <i class="fa fa-lock"></i> Reset Password
        </button>

    </form>

</div>

</body>
</html>
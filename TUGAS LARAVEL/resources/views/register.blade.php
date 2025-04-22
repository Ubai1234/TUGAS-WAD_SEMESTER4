<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #ffffff, #e9ecef); /* Gradasi putih ke abu-abu */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .register-container {
            background: #ffffff;
            padding: 2.5rem 2rem;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .form-control {
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
        }
        .btn-primary {
            border-radius: 50px;
            padding: 0.75rem;
            font-weight: bold;
        }
        label {
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2 class="text-center mb-4">Register</h2>

    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger rounded-pill text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary">Daftar</button>
        </div>

        <p class="mt-3 text-center">
            Sudah punya akun? <a href="/login">Login di sini</a>
        </p>
    </form>
</div>

</body>
</html>

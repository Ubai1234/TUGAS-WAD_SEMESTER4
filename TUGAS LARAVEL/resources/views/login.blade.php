<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef; /* Abu-abu terang background */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: #ffffff; /* Putih bersih untuk card */
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

<div class="login-container">
    <h2 class="text-center mb-4">Login</h2>

    {{-- Flash message sukses setelah register --}}
    @if (session('success'))
        <div class="alert alert-success rounded-pill text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form login --}}
    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>

        {{-- Jika ada error dari login --}}
        @if ($errors->any())
            <div class="alert alert-danger rounded-pill text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>

</body>
</html>

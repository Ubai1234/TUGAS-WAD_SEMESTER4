<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar dengan Logout -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/products') }}">ProdukApp</a>
            <div class="d-flex">
                <!-- Form Logout -->
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Daftar Produk</h1>

        <!-- Form Tambah Produk -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ url('/products') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Nama Produk" required>
                        </div>
                        <div class="col-md-5 mb-3">
                            <input type="number" name="price" class="form-control" placeholder="Harga Produk" required>
                        </div>
                        <div class="col-md-2 d-grid">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Menampilkan Produk -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pesan jika tidak ada produk -->
        @if($products->isEmpty())
            <div class="alert alert-warning text-center">
                Tidak ada produk tersedia.
            </div>
        @endif
    </div>
</body>
</html>

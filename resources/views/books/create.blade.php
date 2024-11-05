<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Sesuaikan dengan path CSS Anda -->
</head>
<body>
    <div class="container">
        <h1>Tambah Buku</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Pengarang</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="publisher" name="publisher">
            </div>
            <div class="mb-3">
                <label for="published_year" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="published_year" name="published_year" min="1900" max="{{ date('Y') }}">
            </div>
            <div class="mb-3">
                <label for="pages" class="form-label">Halaman</label>
                <input type="number" class="form-control" id="pages" name="pages">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>

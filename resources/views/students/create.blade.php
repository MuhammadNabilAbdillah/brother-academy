<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Murid - Brother Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="card-title mb-0 fw-bold">Tambah Data Murid Baru</h5>
                </div>
                <div class="card-body p-4">

                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_murid" class="form-label fw-semibold">Nama Murid</label>
                            <input type="text" class="form-control" id="nama_murid" name="nama_murid" value="{{ old('nama_murid') }}" placeholder="Masukkan nama lengkap murid" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold d-block">Jenis Kelamin</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="Laki-laki" {{ old('jenis_kelamin', 'Laki-laki') == 'Laki-laki' ? 'checked' : '' }}>
                                <label class="form-check-label" for="laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="foto_murid" class="form-label fw-semibold">Foto Murid (Opsional)</label>
                            <input type="file" class="form-control" id="foto_murid" name="foto_murid" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="nama_ortu" class="form-label fw-semibold">Nama Orang Tua / Wali</label>
                            <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" value="{{ old('nama_ortu') }}" placeholder="Masukkan nama orang tua" required>
                        </div>

                        <div class="mb-3">
                            <label for="hp_ortu" class="form-label fw-semibold">No. HP Orang Tua</label>
                            <input type="text" class="form-control" id="hp_ortu" name="hp_ortu" value="{{ old('hp_ortu') }}" placeholder="Contoh: 08123456789" required>
                        </div>

                        <div class="mb-4">
                            <label for="pekerjaan_ortu" class="form-label fw-semibold">Pekerjaan Orang Tua</label>
                            <input type="text" class="form-control" id="pekerjaan_ortu" name="pekerjaan_ortu" value="{{ old('pekerjaan_ortu') }}" placeholder="Masukkan pekerjaan orang tua" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('students.index') }}" class="btn btn-secondary px-4 fw-semibold">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                <i class="bi bi-save me-1"></i> Simpan Data
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
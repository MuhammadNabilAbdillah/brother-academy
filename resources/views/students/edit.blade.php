<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Murid - {{ $student->nama_murid }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5" style="max-width: 600px;">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-white text-center py-3">
                <h4 class="mb-0 fw-bold">Edit Data Murid</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Nama Murid</label>
                        <input type="text" name="nama_murid" class="form-control" value="{{ old('nama_murid', $student->nama_murid) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Foto Murid (Kosongkan jika tidak diganti)</label>
                        <input type="file" name="foto_murid" class="form-control" accept="image/*">
                        @if($student->foto_murid)
                            <small class="text-muted">Foto saat ini: {{ basename($student->foto_murid) }}</small>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Nama Orang Tua</label>
                        <input type="text" name="nama_ortu" class="form-control" value="{{ old('nama_ortu', $student->nama_ortu) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">No. HP Orang Tua</label>
                        <input type="text" name="hp_ortu" class="form-control" value="{{ old('hp_ortu', $student->hp_ortu) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Pekerjaan Orang Tua</label>
                        <input type="text" name="pekerjaan_ortu" class="form-control" value="{{ old('pekerjaan_ortu', $student->pekerjaan_ortu) }}" required>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning text-white fw-bold">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Murid - {{ $student->nama_murid }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5" style="max-width: 600px;">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white text-center py-3">
                <h4 class="mb-0 fw-bold">Detail Biodata Murid</h4>
            </div>
            <div class="card-body p-4 text-center">
                @if($student->foto_murid)
                    <img src="{{ asset('storage/' . $student->foto_murid) }}" class="rounded-circle mb-3 shadow" width="130" height="130" style="object-fit: cover;">
                @else
                    <div class="mb-3 text-muted">Bentuk Foto Tidak Tersedia</div>
                @endif

                <h3 class="fw-bold mb-1">{{ $student->nama_murid }}</h3>
                <p class="text-muted">Tanggal Lahir: {{ \Carbon\Carbon::parse($student->tanggal_lahir)->format('d F Y') }}</p>

                <hr class="my-4">

                <div class="text-start">
                    <div class="mb-2"><strong>Nama Orang Tua / Wali:</strong> {{ $student->nama_ortu }}</div>
                    <div class="mb-2"><strong>No. HP Orang Tua:</strong> {{ $student->hp_ortu }}</div>
                    <div class="mb-2"><strong>Pekerjaan Orang Tua:</strong> {{ $student->pekerjaan_ortu }}</div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('students.index') }}" class="btn btn-secondary w-100">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
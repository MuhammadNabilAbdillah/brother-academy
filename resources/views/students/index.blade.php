<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Murid - Brother Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .table img { object-fit: cover; border-radius: 50%; }
        .stat-card { border: none; border-radius: 12px; }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Daftar Murid Brother Academy</h2>
            <p class="text-muted mb-0">Kelola informasi biodata murid dengan mudah</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('students.create') }}" class="btn btn-primary px-3 py-2 fw-semibold">
                <i class="bi bi-plus-lg me-1"></i> Tambah Murid
            </a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger px-3 py-2 fw-semibold">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Ringkasan Statistik -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card stat-card bg-primary text-white p-3 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-uppercase fw-bold opacity-75">Total Murid</small>
                        <h2 class="fw-bold mb-0 mt-1">{{ $totalMurid }}</h2>
                    </div>
                    <i class="bi bi-people-fill fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card bg-info text-white p-3 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-uppercase fw-bold opacity-75">Murid Laki-Laki</small>
                        <h2 class="fw-bold mb-0 mt-1">{{ $totalLaki }}</h2>
                    </div>
                    <i class="bi bi-gender-male fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card bg-danger text-white p-3 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-uppercase fw-bold opacity-75">Murid Perempuan</small>
                        <h2 class="fw-bold mb-0 mt-1">{{ $totalPerempuan }}</h2>
                    </div>
                    <i class="bi bi-gender-female fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center py-3" style="width: 80px;">Foto</th>
                            <th class="py-3">Nama Murid</th>
                            <th class="text-center py-3">L/P</th>
                            <th class="py-3">Tgl Lahir</th>
                            <th class="py-3">Nama Ortu</th>
                            <th class="py-3">No. HP Ortu</th>
                            <th class="py-3">Pekerjaan Ortu</th>
                            <th class="text-center py-3" style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                            <tr>
                                <td class="text-center">
                                    @if($student->foto_murid)
                                        <img src="{{ asset('storage/' . $student->foto_murid) }}" alt="Foto" width="48" height="48">
                                    @else
                                        <img src="https://via.placeholder.com/48" alt="Default" width="48" height="48">
                                    @endif
                                </td>
                                <td class="fw-bold">{{ $student->nama_murid }}</td>
                                <td class="text-center fw-semibold">
                                    @if($student->jenis_kelamin == 'Laki-laki')
                                        <span class="badge bg-info text-dark">L</span>
                                    @else
                                        <span class="badge bg-danger text-white">P</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($student->tanggal_lahir)->format('d-m-Y') }}</td>
                                <td>{{ $student->nama_ortu }}</td>
                                <td>{{ $student->hp_ortu }}</td>
                                <td>{{ $student->pekerjaan_ortu }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm text-white px-2">
                                            <i class="bi bi-eye-fill"></i> Detail
                                        </a>
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm text-white px-2">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm px-2">
                                                <i class="bi bi-trash-fill"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">Belum ada data murid tersimpan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
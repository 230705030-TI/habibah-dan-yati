<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sistem Informasi Sembako & Pelacakan Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f3f4f6; margin: 0; display: flex; }
        .sidebar { width: 250px; background: #1f2937; color: white; height: 100vh; padding: 20px; box-sizing: border-box; }
        .sidebar h2 { color: #4f46e5; margin-bottom: 30px; }
        .sidebar a { display: block; color: #d1d5db; padding: 12px; text-decoration: none; border-radius: 6px; margin-bottom: 10px; cursor: pointer; }
        .sidebar a:hover { background: #374151; color: white; }
        .main-content { flex: 1; padding: 40px; box-sizing: border-box; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #e5e7eb; padding-bottom: 20px; margin-bottom: 30px; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Sembako-In</h2>
        <a onclick="bukaHalaman('dashboard')">🏠 Dashboard</a>
        <a onclick="bukaHalaman('stok')">📦 Stok Barang</a>
        <a onclick="bukaHalaman('laporan')">📊 Laporan Penjualan</a>
        <hr style="border-color: #374151;">
      <a href="/" style="display: block; color: #dc2626; padding: 12px; text-decoration: none; border-radius: 6px; margin-top: 10px;">🚪 Keluar</a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1 id="judul-utama" class="h2 m-0 font-weight-bold text-gray-800">Selamat Datang di Dashboard</h1>
            <div class="text-muted">Halo, Pengguna!</div>
        </div>

        <main>
            <div class="container-fluid px-0">
                
                <div class="card bg-info text-white mb-4 shadow border-0">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="mb-1">☀️ Prakiraan Cuaca Lokal</h4>
                                <p class="mb-0 text-white-50">Data diperbarui secara real-time dari OpenWeatherMap</p>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0"><strong>{{ $weatherData['name'] ?? 'Banda Aceh' }}</strong></h3>
                                <h4 class="mb-0 mt-1">{{ $weatherData['main']['temp'] ?? '28' }}°C</h4>
                                <span class="badge bg-white text-info mt-1">{{ $weatherData['weather'][0]['description'] ?? 'Cerah Berawan' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="/dashboard" method="GET" class="mb-4 shadow-sm">
                    <div class="input-group input-group-lg">
                        <input type="text" name="keyword" class="form-control border-0" placeholder="🔍 Cari nama barang sembako di sini..." value="{{ request('keyword') }}">
                        <button class="btn btn-primary px-4" type="submit">Cari Barang</button>
                    </div>
                </form>

                <div id="halaman-dashboard">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card p-4 shadow-sm border-0 mb-4" style="background: white; border-left: 5px solid #4f46e5 !important;">
                                <div class="text-muted small uppercase font-weight-bold">Total Jenis Barang</div>
                                <div class="h2 font-weight-bold text-gray-800 mt-2">120 Item</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-4 shadow-sm border-0 mb-4" style="background: white; border-left: 5px solid #16a34a !important;">
                                <div class="text-muted small uppercase font-weight-bold">Barang Masuk (Hari Ini)</div>
                                <div class="h2 font-weight-bold text-gray-800 mt-2">+45 Pack</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-4 shadow-sm border-0 mb-4" style="background: white; border-left: 5px solid #dc2626 !important;">
                                <div class="text-muted small uppercase font-weight-bold">Stok Menipis</div>
                                <div class="h2 font-weight-bold text-gray-800 mt-2 text-danger">3 Barang</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="halaman-stok" class="card shadow-sm border-0 mb-4" style="background: white;">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-0">
                        <h5 class="m-0 font-weight-bold text-primary">Daftar Inventaris Sembako</h5>
                        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah Barang Baru</button>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover m-0 vertical-align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="px-4">ID</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($items ?? [] as $item)
                                    <tr>
                                        <td class="px-4">{{ $item->id }}</td>
                                        <td><strong>{{ $item->nama_barang }}</strong></td>
                                        <td>{{ $item->stok }} unit</td>
                                        <td>
                                            @if($item->stok > 10)
                                                <span class="badge bg-success-subtle text-success">Aman</span>
                                            @else
                                                <span class="badge bg-danger-subtle text-danger">Kritis</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data barang atau pencarian tidak ditemukan.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="halaman-laporan" style="display: none;">
                    <div class="card p-4 shadow-sm border-0 mb-3" style="background: white;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div style="font-weight: 600; color: #111827;">Minyak Goreng Kita 2L</div>
                                <div style="font-size: 14px; color: #6b7280;">10 Menit yang lalu</div>
                            </div>
                            <div class="text-end">
                                <div style="font-weight: bold; color: #1f2937;">Rp 48.000</div>
                                <div style="font-size: 12px; color: #046c4e; font-weight: 500;">Sukses</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang Sembako</h5>
                    <button type="button" class="btn-close" data-bs-shadow="none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" placeholder="Contoh: Beras Ramos 10kg" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Stok</label>
                        <input type="number" name="stok" class="form-control" placeholder="Contoh: 50" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function bukaHalaman(namaHalaman) {
            const dashboard = document.getElementById('halaman-dashboard');
            const stok = document.getElementById('halaman-stok');
            const laporan = document.getElementById('halaman-laporan');
            const judulUtama = document.getElementById('judul-utama');

            // Sembunyikan semuanya dahulu
            dashboard.style.display = 'none';
            stok.style.display = 'none';
            laporan.style.display = 'none';

            // Tampilkan halaman yang di-klik user
            if (namaHalaman === 'dashboard') {
                dashboard.style.display = 'block';
                judulUtama.innerText = 'Selamat Datang di Dashboard';
            } else if (namaHalaman === 'stok') {
                stok.style.display = 'block';
                judulUtama.innerText = 'Manajemen Stok Barang';
            } else if (namaHalaman === 'laporan') {
                laporan.style.display = 'block';
                judulUtama.innerText = 'Laporan Riwayat Penjualan';
            }
        }
    </script>
</body>
</html>
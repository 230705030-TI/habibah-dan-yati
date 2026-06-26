<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SembakoTrack</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f3f4f6; margin: 0; display: flex; }
        .sidebar { width: 250px; background: #1f2937; color: white; height: 100vh; padding: 20px; box-sizing: border-box; }
        .sidebar h2 { color: #4f46e5; margin-bottom: 30px; }
        .sidebar a { display: block; color: #d1d5db; padding: 12px; text-decoration: none; border-radius: 6px; margin-bottom: 10px; cursor: pointer; }
        .sidebar a:hover { background: #374151; color: white; }
        .main-content { flex: 1; padding: 40px; box-sizing: border-box; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #e5e7eb; padding-bottom: 20px; margin-bottom: 30px; }
        .card-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .card { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .card h3 { margin: 0 0 10px 0; color: #4b5563; }
        .card p { font-size: 24px; font-weight: bold; margin: 0; color: #1f2937; }
        
        /* Tambahan style untuk judul halaman dinamis */
        .judul-halaman { margin: 0; color: #1f2937; }
    </style>
</head>
<body>

    <!-- Sidebar Menu SembakoTrack -->
    <div class="sidebar">
        <h2>SembakoTrack</h2>
        <button onclick="bukaHalaman('dashboard')" style="display: block; width: 100%; background: none; border: none; text-align: left; color: #d1d5db; padding: 12px; font-size: 16px; font-family: inherit; border-radius: 6px; margin-bottom: 10px; cursor: pointer;">🏠 Dashboard</button>
        <button onclick="bukaHalaman('stok')" style="display: block; width: 100%; background: none; border: none; text-align: left; color: #d1d5db; padding: 12px; font-size: 16px; font-family: inherit; border-radius: 6px; margin-bottom: 10px; cursor: pointer;">📦 Stok Barang</button>
        <button onclick="bukaHalaman('laporan')" style="display: block; width: 100%; background: none; border: none; text-align: left; color: #d1d5db; padding: 12px; font-size: 16px; font-family: inherit; border-radius: 6px; margin-bottom: 10px; cursor: pointer;">📋 Laporan Transaksi</button>
        <a href="/" style="display: block; color: #d1d5db; padding: 12px; text-decoration: none; border-radius: 6px;">🚪 Keluar</a>
    </div>

    <!-- Konten Utama -->
    <div class="main-content">
        <div class="header">
            <!-- Judul ini nanti akan berubah otomatis lewat JavaScript -->
            <h1 id="judul-utama" class="judul-halaman">Selamat Datang di Dashboard</h1>
            <div><strong>Operator:</strong> Habibah (230705030)</div>
        </div>

        <!-- ============================================== -->
        <!-- 1. HALAMAN DASHBOARD -->
        <!-- ============================================== -->
        <div id="halaman-dashboard">
            <div class="card-grid">
                <div class="card">
                    <h3>Total Jenis Sembako</h3>
                    <p>120 Komoditas</p>
                </div>
                <div class="card">
                    <h3>Stok Menipis</h3>
                    <p>5 Barang</p>
                </div>
                <div class="card">
                    <h3>Transaksi Hari Ini</h3>
                    <p>24 Selesai</p>
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- 2. HALAMAN STOK BARANG -->
        <!-- ============================================== -->
        <div id="halaman-stok" style="display: none;">
            <div class="card">
                <h3>Daftar Stok Sembako</h3>
                <p style="font-size: 16px; font-weight: normal; color: #6b7280; margin-top: 10px;">
                    Halo Bibah! Di sini nanti tempat untuk menampilkan tabel data stok barang kamu ya.
                </p>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- 3. HALAMAN LAPORAN TRANSAKSI -->
        <!-- ============================================== -->
        <div id="halaman-laporan" style="display: none;">
            <div class="card">
                <h3>Laporan Transaksi</h3>
                <p style="font-size: 16px; font-weight: normal; color: #6b7280; margin-top: 10px;">
                    Halaman riwayat dan laporan penjualan SembakoTrack.
                </p>
            </div>
        </div>

    </div>

    <!-- Otak pengatur perpindahan halaman -->
    <script>
        function bukaHalaman(namaHalaman) {
            // 1. Ambil semua elemen halaman
            const dashboard = document.getElementById('halaman-dashboard');
            const stok = document.getElementById('halaman-stok');
            const laporan = document.getElementById('halaman-laporan');
            const judulUtama = document.getElementById('judul-utama');

            // 2. Sembunyikan semua halaman dulu
            dashboard.style.display = 'none';
            stok.style.display = 'none';
            laporan.style.display = 'none';

            // 3. Tampilkan halaman yang dipilih + ganti judul atasnya
            if (namaHalaman === 'dashboard') {
                dashboard.style.display = 'block';
                judulUtama.innerText = 'Selamat Datang di Dashboard';
            } else if (namaHalaman === 'stok') {
                stok.style.display = 'block';
                judulUtama.innerText = 'Manajemen Stok Barang';
            } else if (namaHalaman === 'laporan') {
                laporan.style.display = 'block';
                judulUtama.innerText = 'Laporan Transaksi SembakoTrack';
            }
        }
    </script>

</body>
</html>
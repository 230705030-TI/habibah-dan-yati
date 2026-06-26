<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sistem Informasi Sembako & Pelacakan Inventaris</title>
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

    <!-- Sidebar Menu Sistem Informasi Sembako & Pelacakan Inventaris -->
    <div class="sidebar">
        <h2>Sistem Informasi Sembako & Pelacakan Inventaris</h2>
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
                
                <!-- KARTU STOK MENIPIS: Kita kasih efek kursor dan fungsi klik -->
                <div class="card" onclick="bukaHalaman('stok')" style="cursor: pointer; border: 1px solid #fca5a5; background: #fffdfd; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                    <h3 style="color: #dc2626;">⚠️ Stok Menipis (Klik Detail)</h3>
                    <p style="color: #dc2626;">5 Barang</p>
                </div>
                
                <div class="card">
                    <h3>Transaksi Hari Ini</h3>
                    <p>24 Selesai</p>
                </div>
            </div>

            <!-- TAMBAHAN BIAR DASHBOARD NGAK POLOS: Tabel Peringatan di Bawah Kartu -->
            <div class="card" style="margin-top: 30px; border-left: 5px solid #dc2626;">
                <h3 style="color: #1f2937; margin-bottom: 15px;">📋 Daftar Barang yang Harus Segera Direstok</h3>
                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                    <thead style="background: #f9fafb; border-bottom: 1px solid #e5e7eb;">
                        <tr>
                            <th style="padding: 10px; color: #4b5563;">Nama Sembako</th>
                            <th style="padding: 10px; color: #4b5563;">Sisa Stok</th>
                            <th style="padding: 10px; color: #4b5563;">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid #f3f4f6;">
                            <td style="padding: 12px 10px; font-weight: bold;">Beras Premium 10kg</td>
                            <td style="padding: 12px 10px; color: #dc2626; font-weight: bold;">3 Pcs</td>
                            <td style="padding: 12px 10px;"><span style="background: #fee2e2; color: #9b1c1c; padding: 4px 8px; border-radius: 4px; font-size: 12px;">Hubungi Supplier</span></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f3f4f6;">
                            <td style="padding: 12px 10px; font-weight: bold;">Minyak Kita 1L</td>
                            <td style="padding: 12px 10px; color: #dc2626; font-weight: bold;">2 Pcs</td>
                            <td style="padding: 12px 10px;"><span style="background: #fee2e2; color: #9b1c1c; padding: 4px 8px; border-radius: 4px; font-size: 12px;">Hubungi Supplier</span></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f3f4f6;">
                            <td style="padding: 12px 10px; font-weight: bold;">Telur Ayam (Amanah)</td>
                            <td style="padding: 12px 10px; color: #b45309; font-weight: bold;">5 Butir</td>
                            <td style="padding: 12px 10px;"><span style="background: #fef3c7; color: #92400e; padding: 4px 8px; border-radius: 4px; font-size: 12px;">Beli Eceran</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

       <!-- ============================================== -->
<!-- 2. HALAMAN STOK BARANG -->
<!-- ============================================== -->
<div id="halaman-stok" style="display: none;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0; color: #1f2937;">Daftar Stok Sembako</h2>
        <button style="background: #4f46e5; color: white; border: none; padding: 10px 15px; border-radius: 6px; font-weight: bold; cursor: pointer;">+ Tambah Barang</button>
    </div>

    <div class="card" style="padding: 0; overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead style="background: #f9fafb; border-bottom: 2px solid #e5e7eb;">
                <tr>
                    <th style="padding: 12px 20px; color: #4b5563;">Nama Barang</th>
                    <th style="padding: 12px 20px; color: #4b5563;">Kategori</th>
                    <th style="padding: 12px 20px; color: #4b5563;">Stok</th>
                    <th style="padding: 12px 20px; color: #4b5563;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid #e5e7eb;">
                    <td style="padding: 15px 20px; font-weight: 500;">Minyak Goreng Bimoli 2L</td>
                    <td style="padding: 15px 20px; color: #6b7280;">Minyak Nabati</td>
                    <td style="padding: 15px 20px;">45 Pcs</td>
                    <td style="padding: 15px 20px;"><span style="background: #def7ec; color: #03543f; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold;">Aman</span></td>
                </tr>
                <tr style="border-bottom: 1px solid #e5e7eb;">
                    <td style="padding: 15px 20px; font-weight: 500;">Beras Premium 10kg</td>
                    <td style="padding: 15px 20px; color: #6b7280;">Beras</td>
                    <td style="padding: 15px 20px;">3 Pcs</td>
                    <td style="padding: 15px 20px;"><span style="background: #fde8e8; color: #9b1c1c; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold;">Menipis</span></td>
                </tr>
                <tr>
                    <td style="padding: 15px 20px; font-weight: 500;">Gula Pasir Gulaku 1kg</td>
                    <td style="padding: 15px 20px; color: #6b7280;">Gula</td>
                    <td style="padding: 15px 20px;">80 Pcs</td>
                    <td style="padding: 15px 20px;"><span style="background: #def7ec; color: #03543f; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold;">Aman</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

       <!-- ============================================== -->
<!-- 3. HALAMAN LAPORAN TRANSAKSI -->
<!-- ============================================== -->
<div id="halaman-laporan" style="display: none;">
    <h2 style="margin-bottom: 20px; color: #1f2937;">Riwayat Transaksi Hari Ini</h2>
    
    <div class="card" style="margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <div style="font-weight: bold; color: #1f2937;">TRX-00248</div>
            <div style="font-size: 14px; color: #6b7280;">10 menit yang lalu • Kasir Utama</div>
        </div>
        <div style="text-align: right;">
            <div style="font-weight: bold; color: #1f2937;">Rp 125.000</div>
            <div style="font-size: 12px; color: #046c4e; font-weight: 500;">Sukses</div>
        </div>
    </div>

    <div class="card" style="margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <div style="font-weight: bold; color: #1f2937;">TRX-00247</div>
            <div style="font-size: 14px; color: #6b7280;">45 menit yang lalu • Kasir Utama</div>
        </div>
        <div style="text-align: right;">
            <div style="font-weight: bold; color: #1f2937;">Rp 48.000</div>
            <div style="font-size: 12px; color: #046c4e; font-weight: 500;">Sukses</div>
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
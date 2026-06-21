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
        .sidebar a { display: block; color: #d1d5db; padding: 12px; text-decoration: none; border-radius: 6px; margin-bottom: 10px; }
        .sidebar a:hover { background: #374151; color: white; }
        .main-content { flex: 1; padding: 40px; box-sizing: border-box; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #e5e7eb; padding-bottom: 20px; margin-bottom: 30px; }
        .card-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .card { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .card h3 { margin: 0 0 10px 0; color: #4b5563; }
        .card p { font-size: 24px; font-weight: bold; margin: 0; color: #1f2937; }
    </style>
</head>
<body>

    <!-- Sidebar Menu SembakoTrack -->
    <div class="sidebar">
        <h2>SembakoTrack</h2>
        <a href="#">🏠 Dashboard</a>
        <a href="#">📦 Stok Barang</a>
        <a href="#">📋 Laporan Transaksi</a>
        <a href="/">🚪 Keluar</a>
    </div>

    <!-- Konten Utama -->
    <div class="main-content">
        <div class="header">
            <h1>Selamat Datang di Dashboard</h1>
            <div><strong>Operator:</strong> Habibah (230705030)</div>
        </div>

        <!-- Ringkasan Fitur SembakoTrack -->
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

</body>
</html>
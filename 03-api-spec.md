# 03. Spesifikasi API / Rencana Route Laravel

Daftar rute URL (*Routes*) yang akan digunakan di dalam file `routes/web.php` atau `routes/api.php`:

### Autentikasi
- `POST /login` -> Proses masuk akun.
- `POST /logout` -> Keluar dari sistem.

### Manjemen Data (Contoh)
- `GET /buku` -> Menampilkan semua daftar buku.
- `GET /buku/create` -> Menampilkan halaman tambah buku.
- `POST /buku` -> Menyimpan data buku baru ke database.
- `DELETE /buku/{id}` -> Menghapus data buku.
# 02. Rencana Fitur Aplikasi

# Rencana Fitur

## Fitur 1 — Autentikasi Pengguna (Login & Register)

**Role Penanggung Jawab:** Frontend & Backend

**Sumber Data:** Internal System

**Deskripsi & Ekspektasi:**
Sistem menyediakan form autentikasi agar pengguna bisa masuk atau mendaftar ke aplikasi dengan aman menggunakan sistem enkripsi password bawaan Laravel.

---

## Fitur 2 — Manajemen Data Utama (Dashboard CRUD)

**Role Penanggung Jawab:** Frontend & Backend

**Sumber Data:** Internal System

**Deskripsi & Ekspektasi:**
Halaman utama dashboard yang menampilkan data inti aplikasi (seperti daftar barang atau log aktivitas). Pengguna dapat menambah, melihat, mengubah, dan menghapus data tersebut dengan antarmuka yang responsif.

---

## Fitur 3 — Integrasi Layanan Pihak Ketiga (Third-Party API)

**Role Penanggung Jawab:** Backend & Frontend

**Sumber Data:** Third-Party API — OpenWeatherMap API

**Deskripsi & Ekspektasi:**
Aplikasi mengonsumsi data dari API publik luar untuk menampilkan informasi pelengkap (seperti prakiraan cuaca lokal di halaman dashboard) yang diproses backend dan dirender secara real-time oleh frontend.

---

## Fitur 4 — Pencarian dan Filter Real-time

**Role Penanggung Jawab:** Frontend

**Sumber Data:** Internal System

**Deskripsi & Ekspektasi:**
Fitur pencarian instan pada tabel dashboard yang memungkinkan pengguna mencari data spesifik tanpa perlu memuat ulang keseluruhan halaman web (no-reload).

---

## Fitur 5 — Manajemen Operasional & Environment Setup

**Role Penanggung Jawab:** DevOps

**Sumber Data:** Internal System

**Deskripsi & Ekspektasi:**
Mengonfigurasi pengaturan file `.env`, menjaga sinkronisasi kode antar-anggota tim di repositori Git tanpa konflik, dan menyiapkan lingkungan server agar aplikasi selalu siap diuji sewaktu-waktu oleh asisten laboratorium.

# Identitas Kelompok

---

**Nama Kelompok:** Kelompok 2 Orang (Habibah & Yati)

**Nama Proyek / Aplikasi:** Sistem Informasi Sembako & Pelacakan Inventaris

**Jumlah Anggota:** 2 orang

**Repositori:** https://github.com/230705030-TI/habibah-dan-yati.git

---

## Anggota & Role

**Anggota 1**
- Nama Lengkap: Habibah Rifa Anjani
- NIM: 230705030
- Role: Frontend Developer & DevOps Engineer
- Teknologi: Blade Engine, Tailwind CSS, Git, Laragon

**Anggota 2**
- Nama Lengkap: Yati Fiddiani
- NIM: 230705226
- Role: Backend Developer
- Teknologi: Laravel Framework, MySQL

---

## Stack Teknologi

**Frontend:** Blade Engine & Tailwind CSS

**Backend:** Laravel (Wajib)

**Database:** MySQL

**DevOps / Infrastruktur:** Laragon (Local Environment), Git, GitHub

---

## Arsitektur Aplikasi

Sistem ini dibangun menggunakan arsitektur monolitik terintegrasi dengan framework Laravel, di mana Frontend (menggunakan Blade Engine) dan Backend (Laravel Core) berjalan langsung bersama di dalam satu repositori yang sama demi efisiensi koordinasi tim beranggotakan dua orang.

---

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

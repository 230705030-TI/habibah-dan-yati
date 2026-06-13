<?php

namespace App\Contracts;

/**
 * Fitur 2 — Manajemen Data Utama (Dashboard CRUD)
 * Kontrak standar untuk menambah, melihat, mengubah, dan menghapus data inti.
 */
interface DashboardCrudInterface
{
    /**
     * Menampilkan semua data inti (daftar barang/log aktivitas).
     * @return array
     */
    public function getAllData(): array;

    /**
     * Mengambil satu data spesifik berdasarkan ID.
     * @param int $id
     * @return array|null
     */
    public function getDataById(int $id): ?array;

    /**
     * Menambahkan data baru ke dalam sistem.
     * @param array $data
     * @return bool
     */
    public function createData(array $data): bool;

    /**
     * Mengubah/memperbarui data yang sudah ada berdasarkan ID.
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateData(int $id, array $data): bool;

    /**
     * Menghapus data dari sistem berdasarkan ID.
     * @param int $id
     * @return bool
     */
    public function deleteData(int $id): bool;
}
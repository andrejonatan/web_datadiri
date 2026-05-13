<?php
session_start();

if (!isset($_SESSION['AUTH']) || (($_SESSION['AUTH']['role'] ?? '') !== 'admin')) {
    header('Location: ../index.php?hal=login');
    exit;
}

include_once '../koneksi.php';
include_once '../models/Education.php';

// tangkap request form
$user_id = (int)($_POST['user_id'] ?? 1);
$jenjang = $_POST['jenjang'] ?? null;
$institusi = $_POST['institusi'] ?? null;
$jurusan = $_POST['jurusan'] ?? null;
$tahun_mulai = $_POST['tahun_mulai'] ?? null;
$tahun_selesai = $_POST['tahun_selesai'] ?? null;
$deskripsi = $_POST['deskripsi'] ?? null;
$tombol = $_POST['proses'] ?? '';

$obj = new Education();

switch ($tombol) {
    case 'simpan':
        $obj->simpan([
            $user_id,
            $jenjang,
            $institusi,
            $jurusan,
            $tahun_mulai,
            $tahun_selesai ?: null,
            $deskripsi,
        ]);
        break;
    case 'ubah':
        $id = (int)($_POST['id'] ?? 0);
        if ($id > 0) {
            $obj->ubah([
                $jenjang,
                $institusi,
                $jurusan,
                $tahun_mulai,
                $tahun_selesai ?: null,
                $deskripsi,
                $id,
            ]);
        }
        break;
    case 'hapus':
        $id = (int)($_POST['id'] ?? 0);
        if ($id > 0) {
            $obj->hapus($id);
        }
        break;
}

header('Location: ../index.php?hal=studies');
exit;

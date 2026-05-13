<?php
include_once '../koneksi.php';
include_once '../models/Produk.php';

//1. tangkap request form (dari name2 element form)
$kode = $_POST['kode'] ?? null;
$nama = $_POST['nama'] ?? null;
$kondisi = $_POST['kondisi'] ?? null;
$harga = $_POST['harga'] ?? null;
$stok = $_POST['stok'] ?? null;
$idjenis = $_POST['idjenis'] ?? null;
$foto = $_POST['foto'] ?? null;
$tombol = $_POST['proses'] ?? ''; // untuk keperluan eksekusi sebuah tombol di form
//2. simpan ke sebuah array
$data = [
    $kode, // ? 1
    $nama, // ? 2
    $kondisi, // ? 3
    $harga, // ? 4
    $stok, // ? 5
    $idjenis, // ? 6
    $foto, // ? 7
];
//3. eksekusi tombol
$obj_produk = new Produk();
switch ($tombol) {
    case 'simpan':
        $obj_produk->simpan($data);
        break;
    case 'ubah':
        $id = $_POST['id'] ?? ($_POST['idx'] ?? null);
        if (!empty($id)) {
            $data[] = $id; // tambah array ? ke-8 dari hidden field id
            $obj_produk->ubah($data);
        }
        break;
    case 'hapus':
        $obj_produk->hapus($_POST['id']);
        break; //$_POST['id'] dari hidden field di tombol hapus

    default:
        header('location:index.php?hal=produk_list');
        break;
}
//4. setelah selasai arahkan ke hal produk
    header('Location: ../index.php?hal=produk_list');
    exit;
    $tombol_cari = $_GET['proses_cari']; // untuk keperluan eksekusi sebuah tomboldi form
    if(isset($tombol_cari)){
    //print_r('###########################'.$_GET['keyword']);
    $obj_produk->cari($_GET['keyword']);
    header('location:index.php?hal=produk_cari');
    }
?>
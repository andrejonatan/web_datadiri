<?php
// data awal
$nama = 'andrean';
$totalBelanja = 15000;
$nilai = 95;

// if else (total belanja)
if ($totalBelanja > 10000) {
    $ketBelanja = "Selamat $nama, anda mendapatkan hadiah!";
} else {
    $ketBelanja = "Terimakasih $nama sudah belanja";
}
// ternary (kelulusan)
$ketLulus = ($nilai >=60) ? "Lulus" : "Tidak Lulus";

// if multi kondisi (grade)
if ($nilai >= 85 && $nilai <= 100) {
    $grade = "A";
} elseif ($nilai >= 75 && $nilai < 85) {
    $grade = "B";
} elseif ($nilai >= 60 && $nilai < 75) {
    $grade = "C";
} elseif ($nilai >= 30 && $nilai < 60) {
    $grade = "D";
} elseif ($nilai >= 10 && $nilai < 30) {
    $grade = "E";
} else {
    $grade = "-";
}

// switch case (predikat)
switch ($grade) {
    case "A":
        $predikat = "Sangat Baik";
        break;
    case "B":
        $predikat = "Baik";
        break;
    case "C":
        $predikat = "Cukup";
        break;
    case "D":
        $predikat = "Kurang";
        break;
    case "E":
        $predikat = "Sangat Kurang";
        break;
    default:
        $predikat = "-";
}

?>

<h3>Data Belanja</h3>
Nama Pelanggan : <?= $nama ?> <br>
Total Belanja : RP <?= $totalBelanja ?> <br>
Keterangan : <?= $ketBelanja ?>
<hr>

<h3>Data Nilai</h3>
Nama : <?= $nama ?> <br>
Nilai : <?= $nilai ?> <br>
Status : <?= $ketLulus ?> <br>
Grade : <?= $grade ?> <br>
Predikat : <?= $predikat ?> <br>

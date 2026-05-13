<?php
// variabel bawaan php
echo 'Document PHP saya di: '.$_SERVER['DOCUMENT_ROOT'];
echo '<br>Nama file ini: '.$_SERVER['PHP_SELF'];
echo '<hr>';

// variabel
$namaSiswa = 'andrean';
$umurSiswa = 18;
$beratBadan = 75.6;
$_pekerjaan = 'mahasiswa';

//cetak variabel
echo '<ul>';
echo '<li>Nama Siswa: '.$namaSiswa.'</li>';
echo '<li>Umur Siswa: '.$umurSiswa.' tahun</li>';
echo '<li>Berat Badan: '.$beratBadan.' kg</li>';
echo '<li>Pekerjaan: '.$_pekerjaan.'</li>';
echo '</ul>';

// variabel konstanta

$jari2 = 15;
define('PHI', 3.14);
$luasLingkaran = PHI * $jari2 * $jari2;
echo 'Luas Lingkaran dengan jari-jari '.$jari2.' cm adalah: '.$luasLingkaran.' cm<sup>2</sup>';
echo '<hr>';

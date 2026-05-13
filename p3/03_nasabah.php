<?php

require '02_bank.php';

// Buat Object
$n1 = new Bank("001", "Andrean Jonatan Laluan", 8400000);
$n2 = new Bank("002", "Aria Patah", 5000000);
$n3 = new Bank("003", "Rafan Teshpa", 12000000);
$n4 = new Bank("004", "Wicaksono", 1000000);


echo "<h3 align='center'>" . BANK::BANK . "</h3>";
// Cetak Informasi Nasabah
$n1->cetak();
$n1->Setor(200000);
$n1->cetak();

$n2->cetak();
$n2->ambil(300000);
$n2->cetak();

$n3->cetak();
echo 'Jumlah Nasabah :' .BANK::$jml. 'Orang';


?>
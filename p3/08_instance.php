<?php
require_once __DIR__ . '/06_dosen.php';
require_once __DIR__ . '/07_mahasiswa.php';

// buat object
$d1 = new Dosen('Nasrul', 'L', '111', 'S.Kom, M.Kom');
$d2 = new Dosen('Sirojul', 'L', '112', 'S.Kom, M.Kom');
$m1 = new Mahasiswa('Andrean', 'L', 2, 'Teknik Informatika');
$m2 = new Mahasiswa('Rafan', 'L', 2, 'Teknik Informatika');

$data = [$d1, $d2, $m1, $m2];
echo "<h3>Data Civitas Kampus</h3>";
echo "<p>";
foreach ($data as $d) {
    echo $d->cetak();
}

?>
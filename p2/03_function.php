<?php
function salam() {
    echo 'Selamat Pagi';
}
salam();
echo '<br/>';
?>

<! --- Return --- >
<?php
function tambah($a, $b) {
    return $a + $b;
}
$hasil = tambah(2, 5);
echo 'Hasil Penjumlahan: ' . $hasil;
?> 

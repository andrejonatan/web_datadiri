<?php
// Simpan data di Array
$produk  =  [
            ['kode' => 'A1', 'nama' => 'Apel', 'harga' => 25000],
            ['kode' => 'B2', 'nama' => 'Mangga', 'harga' => 20000],
            ['kode' => 'C3', 'nama' => 'Jeruk', 'harga' => 15000]
];

// 2. Menampilkan data produk menggunakakn foreach
echo "<h3>DAFTAR PRODUK</h3>";
foreach ($produk as $p) {
echo $p['kode']. "-" .
    $p['nama']. "- Rp. " .
    $p['harga']. "<br>";

}

// 3. Fungsi buat total harga
function totalHarga($harga1, $harga2, $harga3){
    return $harga1 + $harga2 + $harga3;
}

// 4. Hitung total harga
$total = totalHarga(
    $produk[0]['harga'],
    $produk[1]['harga'],
    $produk[2]['harga'],
);
echo "<br><b>TOTAL BELANJA: Rp ". $total. "</b>";
?>


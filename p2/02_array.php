<?php
$buah = ['Apel', 'Mangga', 'Jeruk'];
// echo $buah[0]; // Output: Apel
// echo '<br/>';
// $buah[1] = 'Pisang'; // Menambahkan elemen baru ke array
// echo $buah[1]; // Output: Pisang
// $buah[2] = 'Durian';    
// echo '<br/><br>';
echo '--- Foreach --- <br/>';
echo '<br>';
foreach ($buah as $item) {
    // echo '<br/>';
    echo 'ini buah' . $item. '<br/>';
}

?>


<?php
//array scalar
$b1 = ['kode'=>'a1', 'buah'=>'Apel', 'harga'=>25000];
$b2 = ['kode'=>'a2', 'buah'=>'Anggur', 'harga'=>45000];
$b3 = ['kode'=>'b1', 'buah'=>'Belimbing', 'harga'=>15000];
$b4 = ['kode'=>'b2', 'buah'=>'Bangkuang', 'harga'=>10000];
$b5 = ['kode'=>'c1', 'buah'=>'Cerry', 'harga'=>35000];
//array associative
$buah2an = [$b1, $b2, $b3, $b4, $b5];
?>

<?php
$no = 1;
foreach($buah2an as $b){
    $warna = $no % 2 == 1 ? 'khaki' : 'beige';
?>
<tr bgcolor="<?= $warna; ?>">
    <td><?= $no ?></td>
    <td><?= $b['kode'] ?></td>
    <td><?= $b['buah'] ?></td>
    <td><?= $b['harga'] ?></td>
</tr>
<?php
$no++;
}
?>
</tbody>

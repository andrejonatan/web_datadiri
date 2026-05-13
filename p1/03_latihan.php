<?php
// form get
$nama = "";
$alamat = "";

if (isset($_GET['process'])) {
    $nama = $_GET['nama'] ?? "";
    $alamat = $_GET['alamat']?? "";
}

?>
<h3>FORM GET</h3>
<form action="" method="get">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama"><br>
    <label for="alamat">Alamat:</label><br>
    <input type="text" id="alamat" name="alamat"><br><br>
    <input type="submit" name="process" value="Submit">
</form>

<hr>

<?php
$username = "";
$password = "";
if (isset($_POST['process'])) {
    $username = $_POST['username'] ?? "";
    $password = $_POST['password']?? "";
}
?>

<h3>FORM POST</h3>
<form action="" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" name="process" value="Submit">
    </form>

<?php if (isset($_POST['process'])): ?>
    <p>
        <strong>Hasil method POST:</strong><br>
        Hello <?= htmlspecialchars($username) ?>, password anda adalah <?= htmlspecialchars($password) ?>
    </p>
<?php endif; ?>

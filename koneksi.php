<?php
// Koneksi database untuk aplikasi Web Data Diri
// Pastikan database sudah dibuat (lihat dataset/dbdatadiri.sql)

$dsn = 'mysql:dbname=dbdatadiri;host=localhost;port=3306;charset=utf8mb4';
$user = 'root';
$password = '';

try {
	$dbh = new PDO($dsn, $user, $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	echo 'Terjadi kesalahan koneksi dengan sebab ' . $e->getMessage();
	exit;
}


<?php
session_start();

if (!isset($_SESSION['AUTH']) || (($_SESSION['AUTH']['role'] ?? '') !== 'admin')) {
    header('Location: ../index.php?hal=login');
    exit;
}

include_once '../koneksi.php';
include_once '../models/User.php';
include_once '../models/Profile.php';

// Controller sederhana untuk update data diri (opsional)
$user_id = (int)($_POST['user_id'] ?? 1);

$nama_lengkap = $_POST['nama_lengkap'] ?? null;
$email = $_POST['email'] ?? null;
$photo = $_POST['photo'] ?? null;

$tempat_lahir = $_POST['tempat_lahir'] ?? null;
$tanggal_lahir = $_POST['tanggal_lahir'] ?? null;
$alamat = $_POST['alamat'] ?? null;
$no_hp = $_POST['no_hp'] ?? null;
$github_url = $_POST['github_url'] ?? null;
$instagram_url = $_POST['instagram_url'] ?? null;
$about_me = $_POST['about_me'] ?? null;
$summary = $_POST['summary'] ?? null;
$skills = $_POST['skills'] ?? null;
$experience = $_POST['experience'] ?? null;

$objUser = new User();
$objProfile = new Profile();

if ($nama_lengkap && $email) {
    $objUser->upsert([$user_id, null, $nama_lengkap, $email, $photo]);
}

$objProfile->upsert([
    $user_id,
    $tempat_lahir,
    $tanggal_lahir ?: null,
    $alamat,
    $no_hp,
    $github_url,
    $instagram_url,
    $about_me,
    $summary,
    $skills,
    $experience,
]);

header('Location: ../index.php?hal=profile');
exit;

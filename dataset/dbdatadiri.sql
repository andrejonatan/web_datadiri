-- Struktur Database: Web Data Diri
-- Jalankan di phpMyAdmin / MySQL client

CREATE DATABASE IF NOT EXISTS dbdatadiri
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_unicode_ci;

USE dbdatadiri;

-- Users (profil user sederhana, tanpa sistem login wajib)
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NULL,
  password_hash VARCHAR(255) NULL,
  role VARCHAR(20) NOT NULL DEFAULT 'user',
  nama_lengkap VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  photo VARCHAR(255) NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Data diri + CV
CREATE TABLE IF NOT EXISTS profiles (
  user_id INT PRIMARY KEY,
  tempat_lahir VARCHAR(80) NULL,
  tanggal_lahir DATE NULL,
  alamat TEXT NULL,
  no_hp VARCHAR(30) NULL,
  github_url VARCHAR(255) NULL,
  instagram_url VARCHAR(255) NULL,
  about_me TEXT NULL,
  summary TEXT NULL,
  skills TEXT NULL,
  experience TEXT NULL,
  CONSTRAINT fk_profiles_user
    FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Pendidikan (My Studies)
CREATE TABLE IF NOT EXISTS educations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  jenjang VARCHAR(30) NOT NULL,
  institusi VARCHAR(120) NOT NULL,
  jurusan VARCHAR(120) NULL,
  tahun_mulai YEAR NOT NULL,
  tahun_selesai YEAR NULL,
  deskripsi TEXT NULL,
  CONSTRAINT fk_educations_user
    FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  INDEX idx_educations_user (user_id)
) ENGINE=InnoDB;

-- Sample data (User id=1)
INSERT INTO users (id, username, nama_lengkap, email, photo)
VALUES (1, 'user', 'Nama Kamu', 'kamu@email.com', 'img/sttnf.png')
ON DUPLICATE KEY UPDATE
  nama_lengkap = VALUES(nama_lengkap),
  email = VALUES(email),
  photo = VALUES(photo);

-- Sample admin (login untuk edit dinamis)
INSERT INTO users (id, username, password_hash, role, nama_lengkap, email, photo)
VALUES (2, 'admin', '$2y$10$mw.9cas94ayjQ98SsXBzreElZJz4Vdy8wyP0QegwUYlxo/N5wo/Tm', 'admin', 'Administrator', 'admin@email.com', 'img/sttnf.png')
ON DUPLICATE KEY UPDATE
  username = VALUES(username),
  password_hash = VALUES(password_hash),
  role = VALUES(role),
  nama_lengkap = VALUES(nama_lengkap),
  email = VALUES(email),
  photo = VALUES(photo);

INSERT INTO profiles (user_id, tempat_lahir, tanggal_lahir, alamat, no_hp, github_url, instagram_url, about_me, summary, skills, experience)
VALUES (
  1,
  'Kota Kamu',
  '2000-01-01',
  'Alamat kamu di sini',
  '08xxxxxxxxxx',
  'https://github.com/username',
  'https://instagram.com/username',
  'Saya adalah mahasiswa/pelajar yang tertarik pada web development.',
  'Ringkasan singkat tentang CV kamu.',
  'HTML, CSS, Bootstrap, PHP, MySQL',
  'Contoh pengalaman: proyek web data diri / tugas pemrograman web.'
)
ON DUPLICATE KEY UPDATE
  tempat_lahir = VALUES(tempat_lahir),
  tanggal_lahir = VALUES(tanggal_lahir),
  alamat = VALUES(alamat),
  no_hp = VALUES(no_hp),
  github_url = VALUES(github_url),
  instagram_url = VALUES(instagram_url),
  about_me = VALUES(about_me),
  summary = VALUES(summary),
  skills = VALUES(skills),
  experience = VALUES(experience);

INSERT INTO educations (user_id, jenjang, institusi, jurusan, tahun_mulai, tahun_selesai, deskripsi)
VALUES
  (1, 'SMA/SMK', 'Sekolah Kamu', 'Jurusan Kamu', 2016, 2019, 'Aktif organisasi / kegiatan sekolah.'),
  (1, 'S1', 'Kampus Kamu', 'Informatika', 2022, NULL, 'Fokus pemrograman web dan basis data.');

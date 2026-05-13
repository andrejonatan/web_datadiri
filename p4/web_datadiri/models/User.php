<?php
class User
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function getById($id)
    {
        $sql = 'SELECT id, username, nama_lengkap, email, photo, created_at FROM users WHERE id = ?';
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch();
    }

    public function upsert($data)
    {
        // $data: [id, username, nama_lengkap, email, photo]
        $sql = 'INSERT INTO users (id, username, nama_lengkap, email, photo)
                VALUES (?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
                    username = VALUES(username),
                    nama_lengkap = VALUES(nama_lengkap),
                    email = VALUES(email),
                    photo = VALUES(photo)';
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}

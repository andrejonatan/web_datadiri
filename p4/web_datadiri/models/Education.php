<?php
class Education
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function indexByUserId($userId)
    {
        $sql = 'SELECT id, user_id, jenjang, institusi, jurusan, tahun_mulai, tahun_selesai, deskripsi
                FROM educations
                WHERE user_id = ?
                ORDER BY tahun_mulai DESC';
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$userId]);
        return $ps;
    }

    public function getById($id)
    {
        $sql = 'SELECT id, user_id, jenjang, institusi, jurusan, tahun_mulai, tahun_selesai, deskripsi
                FROM educations
                WHERE id = ?';
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch();
    }

    public function simpan($data)
    {
        // $data: [user_id, jenjang, institusi, jurusan, tahun_mulai, tahun_selesai, deskripsi]
        $sql = 'INSERT INTO educations (user_id, jenjang, institusi, jurusan, tahun_mulai, tahun_selesai, deskripsi)
                VALUES (?, ?, ?, ?, ?, ?, ?)';
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data)
    {
        // $data: [jenjang, institusi, jurusan, tahun_mulai, tahun_selesai, deskripsi, id]
        $sql = 'UPDATE educations SET
                  jenjang = ?,
                  institusi = ?,
                  jurusan = ?,
                  tahun_mulai = ?,
                  tahun_selesai = ?,
                  deskripsi = ?
                WHERE id = ?';
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id)
    {
        $sql = 'DELETE FROM educations WHERE id = ?';
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
}

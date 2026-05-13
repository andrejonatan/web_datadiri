<?php
class Profile
{
    private $koneksi;
    private $profilesColumns = null;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function getByUserId($userId)
    {
        $sql = 'SELECT * FROM profiles WHERE user_id = ?';
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$userId]);
        return $ps->fetch();
    }

    public function upsert($data)
    {
        // $data: [user_id, tempat_lahir, tanggal_lahir, alamat, no_hp, github_url, instagram_url, about_me, summary, skills, experience]
        // Catatan: DB yang lama mungkin belum punya kolom github_url/instagram_url.
        // Untuk mencegah fatal error, query dibangun dari kolom yang benar-benar ada.

        $expected = [
            'user_id',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'no_hp',
            'github_url',
            'instagram_url',
            'about_me',
            'summary',
            'skills',
            'experience',
        ];

        if (!is_array($data) || count($data) !== count($expected)) {
            throw new InvalidArgumentException('Data profile tidak sesuai format upsert.');
        }

        $assoc = array_combine($expected, array_values($data));
        $columns = $this->getProfilesColumns();

        // filter hanya kolom yang ada di tabel
        $insertAssoc = [];
        foreach ($assoc as $key => $value) {
            if (in_array($key, $columns, true)) {
                $insertAssoc[$key] = $value;
            }
        }

        if (!isset($insertAssoc['user_id'])) {
            throw new RuntimeException('Kolom user_id tidak ditemukan di tabel profiles.');
        }

        $insertColumns = array_keys($insertAssoc);
        $placeholders = implode(', ', array_fill(0, count($insertColumns), '?'));

        $updateColumns = array_values(array_filter($insertColumns, function ($c) {
            return $c !== 'user_id';
        }));

        $updateSql = '';
        if ($updateColumns) {
            $parts = [];
            foreach ($updateColumns as $col) {
                $parts[] = $col . ' = VALUES(' . $col . ')';
            }
            $updateSql = ' ON DUPLICATE KEY UPDATE ' . implode(', ', $parts);
        }

        $sql = 'INSERT INTO profiles (' . implode(', ', $insertColumns) . ') VALUES (' . $placeholders . ')' . $updateSql;

        $ps = $this->koneksi->prepare($sql);
        $ps->execute(array_values($insertAssoc));
    }

    private function getProfilesColumns(): array
    {
        if (is_array($this->profilesColumns)) {
            return $this->profilesColumns;
        }

        $cols = [];
        $stmt = $this->koneksi->query('SHOW COLUMNS FROM profiles');
        foreach ($stmt->fetchAll() as $row) {
            if (isset($row['Field'])) {
                $cols[] = $row['Field'];
            }
        }

        $this->profilesColumns = $cols;
        return $cols;
    }
}

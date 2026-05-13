# CARA GANTI PW USERS
php -r "echo password_hash('PASSWORD_BARU', PASSWORD_BCRYPT);"

JIKA SUDAH KLIK ENTER, dan salin kode unik nya.

KE MYSQL

USE dbdatadiri;

UPDATE users
SET password_hash = '$2y$10$.3t.roivD8Snr7URCAHHz.3uLfzKaa2aruwvq9tN3jjK5R4rLVEAq' 
WHERE username = 'admin';
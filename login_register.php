<?php
session_start(); // mulai session untuk menyimpan flash message dan user_id
require_once 'config.php'; // muat koneksi PDO: $db

// proses pendaftaran
if (isset($_POST['register'])) {
    $username = trim($_POST['username'] ?? ''); // ambil username dari form, hapus spasi
    $password_raw = $_POST['password'] ?? ''; // ambil password dari form

    // validasi sederhana: tidak boleh kosong
    if ($username === '' || $password_raw === '') {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Username dan password wajib diisi.'];
        header("Location: index.php?page=register"); // kembali ke form register
        exit();
    }

    // cek apakah username sudah terdaftar (prepared statement untuk mencegah SQL injection)
    $check = $db->prepare("SELECT id_user FROM `user` WHERE `name` = :name LIMIT 1");
    $check->execute([':name' => $username]);
    if ($check->fetch()) {
        // jika ditemukan, kembalikan ke halaman register
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Username sudah terdaftar.'];
        header("Location: index.php?page=register");
        exit();
    }

    // hash password sebelum disimpan
    $password_hash = password_hash($password_raw, PASSWORD_DEFAULT);
    try {
        // simpan user baru ke tabel `user`
        $ins = $db->prepare("INSERT INTO `user` (`name`, `password`) VALUES (:name, :password)");
        $ins->execute([
            ':name' => $username,
            ':password' => $password_hash
        ]);
        // set pesan sukses dan redirect ke halaman login
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Registrasi berhasil. Silakan login.'];
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        // tangani error DB secara umum (jangan tunjukkan detail ke user)
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Terjadi kesalahan saat registrasi.'];
        header("Location: index.php?page=register");
        exit();
    }
}

// proses login
if (isset($_POST['login'])) {
    $username = trim($_POST['username'] ?? ''); // ambil username
    $password_raw = $_POST['password'] ?? ''; // ambil password

    // validasi sederhana
    if ($username === '' || $password_raw === '') {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Masukkan username dan password.'];
        header("Location: index.php");
        exit();
    }

    // ambil record user berdasarkan username
    $stmt = $db->prepare("SELECT id_user, password FROM `user` WHERE `name` = :name LIMIT 1");
    $stmt->execute([':name' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // verifikasi password dan set session user_id jika benar
    if ($user && password_verify($password_raw, $user['password'])) {
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Login berhasil.'];
        header("Location: lowongan.php"); // redirect ke halaman lowongan setelah login sukses
        exit();
    } else {
        // gagal login — beri flash dan kembali ke login
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Username atau password salah.'];
        header("Location: index.php");
        exit();
    }
}
?>
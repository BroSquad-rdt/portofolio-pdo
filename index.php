<?php session_start(); // mulai session untuk membaca flash dan status login ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register - Portofolio SMK</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* styling untuk pesan flash (sukses / error) */
        .flash {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }

        .flash.success {
            background: #e6ffed;
            color: #046b2d;
            border: 1px solid #b7f0c9;
        }

        .flash.error {
            background: #ffecec;
            color: #7b1e1e;
            border: 1px solid #f0b9b9;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="container">
            <a href="index.php" class="logo">Portofolio SMK</a>
        </div>
    </nav>

    <?php
    // tentukan halaman yang ditampilkan: login (default) atau register jika ?page=register
    $page = isset($_GET['page']) && $_GET['page'] === 'register' ? 'register' : 'login';
    // tampilkan flash message bila ada, lalu hapus agar hanya tampil sekali
    if (isset($_SESSION['flash'])) {
        $f = $_SESSION['flash'];
        echo '<div class="flash ' . htmlspecialchars($f['type']) . '">' . htmlspecialchars($f['message']) . '</div>';
        unset($_SESSION['flash']);
    }
    ?>
<!-- titid -->
    <main class="container">
        <div class="form-container card">
            <?php if ($page === 'login') { ?>
                <!-- form login -->
                <h2>Login Akun</h2>
                <form id="form-login" action="login_register.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <!-- name="username" harus cocok dengan yang diproses di login_register.php -->
                        <input type="text" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <!-- name="password" harus cocok juga -->
                        <input type="password" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn" name="login" id="login">Login</button>
                </form>
                <p style="margin-top: 15px; text-align: center;">
                    Belum punya akun? <a href="?page=register">Daftar di sini</a>
                </p>
            <?php } else { ?>
                <!-- form register -->
                <h2>Register Akun</h2>
                <form id="form-register" action="login_register.php" method="post">
                    <div class="form-group">
                        <label for="reg-username">Username</label>
                        <input type="text" name="username" id="reg-username" required>
                    </div>
                    <div class="form-group">
                        <label for="reg-password">Password</label>
                        <input type="password" name="password" id="reg-password" required>
                    </div>
                    <button type="submit" class="btn" name="register" id="register">Register</button>
                </form>
                <p style="margin-top: 15px; text-align: center;">
                    Sudah punya akun? <a href="?page=login">Login di sini</a>
                </p>
            <?php } ?>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; 2025 Portofolio SMK Sekabupaten.</p>
    </footer>

</body>

</html>

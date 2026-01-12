<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Lowongan Kerja - Portofolio SMK</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Style khusus untuk kartu lowongan */
        .job-card {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .job-card img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: contain;
            border: 1px solid #eee;
        }
        .job-card-info h3 { margin-bottom: 5px; }
        .job-card-info p { color: #555; margin-bottom: 5px; }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <a href="main_menu.php" class="logo">Portofolio SMK</a>
            <ul class="nav-links" id="nav-links">
                <li><a href="lowongan.php">Cari Lowongan</a></li>
            </ul>
            <div class="hamburger" id="hamburger-btn">☰</div>
        </div>
    </nav>

    <main class="container">
        <h1 style="margin: 20px 0;">Lowongan Kerja Tersedia</h1>

        <div class="card form-container" style="max-width: none;">
            <form style="display: flex; gap: 15px;">
                <input type="text" placeholder="Ketik jabatan (misal: Admin, IT)" style="flex-grow: 1;">
                <button type="submit" class="btn">Cari</button>
            </form>
        </div>

        <section>
            
            <div class="card job-card">
                <img src="https://via.placeholder.com/100x100.png?text=Logo+PT" alt="Logo Perusahaan">
                <div class="job-card-info">
                    <h3>Junior IT Support</h3>
                    <p>PT. Maju Jaya (Teknologi)</p>
                    <p>Lokasi: Jakarta | Tipe: Full-time</p>
                </div>
                <a href="#" class="btn" style="margin-left: auto;">Lihat Detail</a>
            </div>

            <div class="card job-card">
                <img src="https://via.placeholder.com/100x100.png?text=Logo+CV" alt="Logo Perusahaan">
                <div class="job-card-info">
                    <h3>Admin Media Sosial</h3>
                    <p>CV. Kreatif Bersama (Marketing)</p>
                    <p>Lokasi: Surabaya | Tipe: Internship</p>
                </div>
                <a href="#" class="btn" style="margin-left: auto;">Lihat Detail</a>
            </div>

            <div class="card job-card">
                <img src="https://via.placeholder.com/100x100.png?text=Logo+Biz" alt="Logo Perusahaan">
                <div class="job-card-info">
                    <h3>Operator Produksi</h3>
                    <p>PT. Manufaktur Sejahtera</p>
                    <p>Lokasi: Sekitar Kabupaten | Tipe: Full-time</p>
                </div>
                <a href="#" class="btn" style="margin-left: auto;">Lihat Detail</a>
            </div>

        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2025 Portofolio SMK Sekabupaten.</p>
    </footer>
    
    <script src="assets/js/main.js"></script>
</body>
</html>
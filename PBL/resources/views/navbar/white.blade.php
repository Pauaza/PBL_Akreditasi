<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: ; /* Ganti dengan background gambar jika diperlukan */
        }

        /* Custom Navabar */
        .custom-navbar {
            background : #fff;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 20px 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 95%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Nama dan Logo kiri */
        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .navbar-brand img {
            height: 30px;
            margin-right: 5px;
        }

        .navbar-brand span {
            color: #315287;
            font-weight: 500;
            font-size: 16px;
        }

        .navbar-nav {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        .nav-link {
            color: #315287;
            text-decoration: none;
            font-size: 16px;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .button-logout {
            background: #993A36;
            color: white;
            padding: 10px 50px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 100;
        }

        .button-logout:hover {
            background: #7a2e2a;
        }
    </style>
</head>
<body>
    <nav class="custom-navbar">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('assets/img/logo-polinema.png') }}" alt="Logo">
                <span>Akreditasi D4 Sistem Informasi Bisnis</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#" class="nav-link">Beranda</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Website Polinema</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Kriteria</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Denah Gedung</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Kontak</a></li>
                <li class="nav-item"><a href="#" class="button-logout">Logout</a></li>
            </ul>
        </div>
    </nav>
</body>
</html>
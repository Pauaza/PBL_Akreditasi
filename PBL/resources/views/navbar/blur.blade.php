<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #f4f4f4;
        }

        .custom-navbar {
            background: rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 20px 10px;
        }

        .container {
            max-width: 95%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

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
            color: #fff;
            font-weight: 500;
            font-size: 16px;
        }

        .navbar-nav {
            list-style: none;
            display: flex;
            gap: 25px;
            align-items: center;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .button-logout {
            background: #993a36;
            color: white;
            padding: 10px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            border: none;
            cursor: pointer;
        }

        .button-logout:hover {
            background: #7a2e2a;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background: white;
            min-width: 180px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px 0;
            top: 35px;
            z-index: 999;
        }

        .dropdown-menu li {
            list-style: none;
            padding: 0;
        }

        .dropdown-menu li a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .dropdown-menu li a:hover {
            background-color: #f0f0f0;
        }

        /* Hamburger menu (responsive) */
        .hamburger {
            display: none;
            font-size: 24px;
            color: white;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column;
                width: 100%;
                display: none;
                margin-top: 15px;
                background: rgba(0, 0, 0, 0.3);
                padding: 10px;
                border-radius: 8px;
            }

            .navbar-nav.show {
                display: flex;
            }

            .hamburger {
                display: block;
            }
        }
    </style>
</head>

<body>
    <nav class="custom-navbar">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('assets/img/logo-polinema.png') }}" alt="Logo" />
                <span>Akreditasi D4 Sistem Informasi Bisnis</span>
            </a>

            <div class="hamburger" onclick="toggleMobileMenu()">☰</div>

            <ul class="navbar-nav" id="navbarNav">
                <li class="nav-item"><a href="#" class="nav-link">Beranda</a></li>
                <li class="nav-item">
                    <a href="https://www.polinema.ac.id/" class="nav-link" target="_blank" rel="noopener noreferrer">
                        Website Polinema
                    </a>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">Kriteria</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" onclick="toggleDropdown(event)" aria-haspopup="true"
                        aria-expanded="false">
                        Denah Gedung ▾
                    </a>
                    <ul class="dropdown-menu" id="dropdownMenu">
                        <li><a href="https://my.matterport.com/show/?m=xufa7UrDLJe" target="_blank"
                                rel="noopener noreferrer">Gedung Lantai 5</a></li>
                        <li><a href="https://my.matterport.com/show/?m=Fj8fbnjLjQq" target="_blank"
                                rel="noopener noreferrer">Gedung Lantai 6</a></li>
                        <li><a href="https://my.matterport.com/show/?m=fAgiViGeZaB" target="_blank"
                                rel="noopener noreferrer">Gedung Lantai 7</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">Kontak</a></li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin logout?')">
                        @csrf
                        <button type="submit" class="button-logout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        function toggleDropdown(event) {
            event.preventDefault();
            const menu = document.getElementById('dropdownMenu');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        }

        function toggleMobileMenu() {
            const nav = document.getElementById('navbarNav');
            nav.classList.toggle('show');
        }

        document.addEventListener('click', function(event) {
            const dropdown = document.querySelector('.dropdown');
            const menu = document.getElementById('dropdownMenu');
            if (!dropdown.contains(event.target)) {
                menu.style.display = 'none';
            }
        });
    </script>
</body>

</html>

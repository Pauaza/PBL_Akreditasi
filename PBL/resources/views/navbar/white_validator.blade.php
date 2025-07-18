<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar dengan Logout</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #f5f5f5;
        }

        .custom-navbar {
            background: #fff;
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
            align-items: center;
        }

        .nav-item {
            display: flex;
            align-items: center;
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
            border: none;
            cursor: pointer;
        }

        .button-logout:hover {
            background: #7a2e2a;
        }

        /* Dropdown */
        .dropdown {
            position: relative;
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
                <li class="nav-item"><a href="{{ route('dashboard_validator') }}" class="nav-link">Beranda</a></li>

                <li class="nav-item">
                    <a href="https://www.polinema.ac.id/" class="nav-link" target="_blank" rel="noopener noreferrer">
                        Website Polinema
                    </a>
                </li>
                <!-- Kriteria Dropdown -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" onclick="toggleDropdown(event, 'dropdownKriteria')">Kriteria
                        ▾</a>
                    <ul class="dropdown-menu" id="dropdownKriteria">
                        <li><a href="/kriteria/validator/kriteria1" rel="noopener noreferrer">Kriteria 1</a></li>
                        <li><a href="/kriteria/validator/kriteria2" rel="noopener noreferrer">Kriteria 2</a></li>
                        <li><a href="/kriteria/validator/kriteria3" rel="noopener noreferrer">Kriteria 3</a></li>
                        <li><a href="/kriteria/validator/kriteria4" rel="noopener noreferrer">Kriteria 4</a></li>
                        <li><a href="/kriteria/validator/kriteria5" rel="noopener noreferrer">Kriteria 5</a></li>
                        <li><a href="/kriteria/validator/kriteria6" rel="noopener noreferrer">Kriteria 6</a></li>
                        <li><a href="/kriteria/validator/kriteria7" rel="noopener noreferrer">Kriteria 7</a></li>
                        <li><a href="/kriteria/validator/kriteria8" rel="noopener noreferrer">Kriteria 8</a></li>
                        <li><a href="/kriteria/validator/kriteria9" rel="noopener noreferrer">Kriteria 9</a></li>
                    </ul>


                    <!-- Denah Gedung Dropdown -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" onclick="toggleDropdown(event, 'dropdownDenah')">Denah Gedung
                        ▾</a>
                    <ul class="dropdown-menu" id="dropdownDenah">
                        <li>
                            <a href="https://my.matterport.com/show/?m=xufa7UrDLJe" target="_blank"
                                rel="noopener noreferrer">Gedung
                                Lantai 5</a>
                        </li>
                        <li>
                            <a href="https://my.matterport.com/show/?m=Fj8fbnjLjQq" target="_blank"
                                rel="noopener noreferrer">Gedung
                                Lantai 6</a>
                        </li>
                        <li>
                            <a href="https://my.matterport.com/show/?m=fAgiViGeZaB" target="_blank"
                                rel="noopener noreferrer">Gedung
                                Lantai 7</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard_validator') }}#contact">Kontak</a>
                </li>

                <li class="nav-item">
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="button" class="button-logout"
                            title="Logout sebagai {{ Auth::user()->username }}, {{ Auth::user()->name }}">
                            <i></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    @include('alert.logout_alert')

    <script>
        function toggleDropdown(event, menuId) {
            event.preventDefault();

            // Hide all dropdown menus first
            const dropdowns = document.querySelectorAll('.dropdown-menu');
            dropdowns.forEach((dd) => {
                if (dd.id !== menuId) {
                    dd.style.display = 'none';
                }
            });

            // Toggle clicked menu
            const menu = document.getElementById(menuId);
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        }

        // Close dropdown if clicked outside
        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('.dropdown-menu');
            const dropdownContainers = document.querySelectorAll('.dropdown');

            let clickedInsideDropdown = false;

            dropdownContainers.forEach((container) => {
                if (container.contains(event.target)) {
                    clickedInsideDropdown = true;
                }
            });

            if (!clickedInsideDropdown) {
                dropdowns.forEach((dd) => {
                    dd.style.display = 'none';
                });
            }
        });
    </script>
</body>

</html>

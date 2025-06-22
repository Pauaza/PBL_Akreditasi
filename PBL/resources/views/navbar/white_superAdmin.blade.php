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
            @php
                $username = Auth::user()->username;
                $name = Auth::user()->name;
                $akses = [
                    'superadmin' => 14,
                ];
            @endphp
            <li class="nav-item">
                <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="button" class="button-logout"
                        title="Logout sebagai {{ Auth::user()->username }}, {{ Auth::user()->name }}">
                        Logout
                    </button>
                </form>
            </li>
            </ul>
        </div>
    </nav>
    @include('alert.logout_alert')
</body>

</html>

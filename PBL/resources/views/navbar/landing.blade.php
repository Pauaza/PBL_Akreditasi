<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            cursor: pointer;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .button-login {
            background: #315287;
            color: white;
            padding: 10px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 100;
            border: none;
            cursor: pointer;
        }

        .button-login:hover {
            background: #264170;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                gap: 15px;
            }

            .button-login {
                padding: 8px 20px;
                font-size: 10px;
            }
        }
    </style>
</head>

<body>
    <nav class="custom-navbar">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('assets/img/jti.png') }}" alt="Logo">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#" class="nav-link">Beranda</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Tentang</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Fitur</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Informasi</a></li>
            </ul>
            <a href="{{ route('login') }}" class="button-login">Masuk ke Sistem</a>
        </div>
    </nav>
</body>

</html>
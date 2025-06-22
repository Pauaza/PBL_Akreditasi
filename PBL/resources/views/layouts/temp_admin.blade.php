<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiAkred - Admin</title>
    <link rel="icon" href="{{ asset('assets/img/jti.png?v=2') }}" type="image/png">
    <!-- Tambahkan Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 20px;
            margin-left: 250px;
            margin-top: 110px;
        }

        .header {
            background-color: #315287;
            color: white;
            padding: 40px 0px 15px 20px;
            position: fixed;
            left: 250px;
            top: 55px;
            right: 0;
            z-index: 900;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .header h2 {
            margin: 0;
            font-size: 30px;
            font-weight: 600;
        }

        .header h3 {
            font-size: 11px;
            font-weight: 200;
        }

        /* Card */
        .card {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 20px;
            border:none;
        }

        .card-header {
            background-color: #fff;
            padding: 20px 20px;
        }

        .card-header h5 {
            display: inline-block;
            font-size: 18px;
            font-weight: 500;
            background: #315287;
            color: white;
            border: none;
            padding: 10px 20px;
            width: 100%;
        }

        .card-body {
            padding: 20px;
        }

        /* Form Elements */
        .form-container {
            width: 100%;
            max-width: 1000px;
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 200;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-group textarea {
            width: 100%;
            min-height: 100px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            resize: vertical;
            font-family: 'Montserrat', sans-serif;
        }

        /* buttons */
        .button-group {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-bottom: 20px;
            font-size: 11px;
        }

        .btn-blue,
        .btn-green,
        .btn-yellow,
        .status-btn.draft {
            margin: 0;
            display: inline-block;
            font-weight: 400;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
        }

        .btn-blues {
            background: #315287;
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
            border:none;
            cursor:pointer;
        }

        .btn-greens {
            background: #28A745;
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
            border:none;
            cursor:pointer;
        }

        .btn-yellows {
            background: #FFC107;
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
            border:none;
            cursor:pointer;
        }

        .status-btn.draft {
            background: #d3d3d3;
            color: white;
        }

        .upload-photo {
            width: 130px;
            height: 160px;
            background-color: #E5E5E5;
            border: 1px solid #828282;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 10px;
            max-width: 1000px;
            position: relative;
        }

        .upload-photo .upload-text {
            font-size: 18px;
            color: #6c757d;
        }

        .upload-photo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            display: none;
            /* Hide preview by default */
        }
    </style>
</head>

<body>
    <!-- Include Navbar -->
    @include('navbar.white_admin')

    <!-- Include Sidebar -->
    @include('sidebar.sidebar_admin')

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>
</body>

</html>

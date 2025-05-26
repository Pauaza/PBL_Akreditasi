<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Informasi Bisnis</title>
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
        position: fixed center;
        margin-top: 110px;
    }

    .header {
        background-color: #315287;
        color: white;
        padding: 40px 0px 15px 20px;
        position: fixed;
        left: 0;
        top: 55px;
        right: 0;
        z-index: 900;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .header h2 {
        margin-left: 30px;
        font-size: 30px;
        font-weight: 600;
    }

    .header h3 {
        margin-left: 30px;
        font-size: 11px;
        font-weight: 200;
    }

    /* Card */
    .card {
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #fff;
        padding: 10px 20px;
        display: flex; /* Menggunakan flexbox */
        justify-content: space-between; /* Memisahkan Status Validasi dan tombol ke kanan */
        margin-top: 30px;
        margin-bottom: -10px;
    }

    .card-header h5 {
        margin-top: 30px;
        margin-left: -20px;
        display: inline-block;
        font-size: 18px;
        font-weight: 600;
        color: #315287;
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
    }

    .card-body {
        padding: 0px 20px 20px 20px;
    }

    .add-button {
        background: #315287;
        border: none;
        border-radius: 50px;
        padding: 8px 20px;
        font-weight: 500;
        cursor: pointer;
        font-size: 14px;
        height: 40px;
        box-sizing: border-box;
        margin-top: 25px;
    }
    .add-button a {
        color: white; /* warna font */
        text-decoration: none;
    }

    /* Form Elements */
    .form-container {
        width: 100%;
        box-sizing: border-box; /* Ensure padding/borders are included in width */
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
        font-weight: 600;
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

    .btn-blue, .btn-green, .btn-yellow {
        margin: 0;
        display: inline-block;
        font-weight: 500;
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
    }

    .btn-blue {
        background: #315287;
        color: white;
    }

    .btn-green {
        background: #28A745;
        color: white;
    }

    .btn-yellow {
        background: #FFC107;
        color: white;
    }

    /* Status Button Styling */
    .status-btn {
        display: inline-block;
        padding: 5px 15px;
        border-radius: 20px;
        color: white;
        font-weight: 500;
        text-align: center;
        min-width: 120px; /* Ensures consistent width */
        box-sizing: border-box;
    }

    .acc {
        background-color: #28A745; /* Green for Acc */
    }

    .on-progress {
        background-color: #FFC107; /* Yellow for On Progress */
    }

    .selesai {
        background-color: #007BFF; /* Blue for Selesai */
    }

    .ditolak {
        background-color: #DC3545; /* Red for Ditolak */
    }

    /* Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: auto; /* Allow table to adjust column widths based on content */
        position: fixed center;

    }

    table th {
        background-color: #315287;
        color: white;
        padding: 10px;
        text-align: center;
        border: 1px solid #dee2e6;
        font-weight: 500;
    }

    table td {
        padding: 10px;
        border: 1px solid #dee2e6;
        text-align: center;
        align-content: center;
    }

    .action-icons {
        display: flex;
        gap: 5px;
        justify-content: center; /* Memusatkan ikon secara horizontal */
        align-items: center;
    }

    .action-icons button {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0px 30px;
    }

    .action-icons img {
        size: 100%;
    }
    </style>
</head>
<body>
    <!-- Include Navbar -->
    @include('navbar.white_admin')

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
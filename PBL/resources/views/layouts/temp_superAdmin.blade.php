<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin</title>
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
        margin-top: 60px;
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
        border-radius: 20px;
        margin-bottom: 15px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
    }

    .card-title {
        background-color: #fff;
        padding: 8px 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        min-height: 50px; /* Pastikan ukuran minimal untuk judul */
    }

    .card-title h5 {
        margin: 0;
        font-size: 15px;
        font-weight: 600;
        color: #315287; /* Biru sesuai template */
        background: none; /* Tanpa background */
    }

    .card-content {
        background-color: #fff;
        border-radius: 0 0 10px 10px;
        flex: 1;
        overflow-y: auto;
    }

    .card-body {
        padding: 15px;
    }

    /* Dashboard Tables */
    .dashboard-table {
        width: 100%;
        border-collapse: collapse;
    }

    .dashboard-table th,
    .dashboard-table td {
        padding: 6px 8px;
        text-align: left;
        font-size: 13px;
        font-weight: 600;
        color: #315287; /* Teks tabel berwarna biru sesuai template */
    }

    .dashboard-table th {
        border-bottom: 1px solid #dee2e6;
        font-weight: 400;
    }

    .dashboard-table tbody tr:nth-child(odd) {
        background-color: #f9f9f9; /* Zebra stripes: baris ganjil */
    }

    .dashboard-table tbody tr:nth-child(even) {
        background-color: #fff; /* Zebra stripes: baris genap */
    }

    /* Manage Content Section */
    .manage-content-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .manage-content-item {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .manage-content-item h6 {
        color: #315287;
        font-weight: 400;
        margin: 0;
        font-size: 13px;
    }

    .content-placeholder {
        background-color: #f4f4f4;
        height: 100px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .content-placeholder img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Pastikan gambar tidak terdistorsi */
    }

    /* Buttons */
    .view-more-btn {
        background-color: #315287;
        color: white;
        border: none;
        border-radius: 20px;
        padding: 7px 15px;
        font-size: 11px;
        font-weight: 400;
        cursor: pointer;
        text-decoration: none;
    }

    .view-more-btn:hover {
        background-color: #27406a;
    }

    .logout-btn {
        background-color: #993A36;
        color: white;
        border: none;
        border-radius: 20px;
        padding: 4px 12px;
        font-size: 11px;
        font-weight: 400;
        cursor: pointer;
        text-decoration: none;
        text-transform: uppercase;
    }

    .logout-btn:hover {
        background-color: #7a2e2a;
    }

    /* Dashboard Container */
    .dashboard-container {
        margin-top: 100px;
    }

    .dashboard-flex {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
    }

    .dashboard-section {
        flex: 1;
        display: flex;
        flex-direction: column;
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
    }
    </style>
</head>
<body>
    <!-- Include Navbar -->
    @include('navbar.white_superAdmin')

    <!-- Include Sidebar -->
    @include('sidebar.sidebar_superAdmin')

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
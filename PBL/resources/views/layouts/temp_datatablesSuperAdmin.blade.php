<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datatables Super Admin</title>
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
        margin-top: 160px;
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
        color: #315287;
    }

    .dashboard-table th {
        border-bottom: 1px solid #dee2e6;
        font-weight: 400;
    }

    .dashboard-table tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .dashboard-table tbody tr:nth-child(even) {
        background-color: #fff;
    }

    /* Search Bar */
    .search-container {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 10px;
    }

    .search-bar {
        display: flex;
        align-items: center;
        border: 1px solid #ced4da;
        border-radius: 20px;
        padding: 5px 10px;
        width: 300px;
        background-color: #fff;
    }

    .search-bar input {
        border: none;
        outline: none;
        flex: 1;
        font-size: 13px;
        font-family: 'Montserrat', sans-serif;
    }

    .search-bar .search-icon {
        width: 20px;
        height: 20px;
        margin-left: 5px;
    }

    /* Action Icons */
    .action-icons {
        display: flex;
        gap: 15px;
        justify-content: left;
    }

    .action-icon {
        width: 20px;
        height: 20px;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .action-icon:hover {
        transform: scale(1.1);
    }

    .action-buttons {
        display: flex;
        gap: 10px;
    }
    .action-button {
        background: none;
        border: none;
        cursor: pointer;
        padding: 5px;
        transition: transform 0.2s;
    }
    .action-button:hover {
        transform: scale(1.1);
    }
    .action-button img {
        width: 24px;
        height: 24px;
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
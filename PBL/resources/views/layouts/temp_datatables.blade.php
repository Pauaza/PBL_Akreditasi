```html
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
        margin-top: 110px;
        margin-left: -150px;
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
        border-radius: 20px;
        margin-bottom: 15px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        padding: 15px;
    }

    .card-title {
        background-color: #fff;
        padding: 8px 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        min-height: 50px;
    }

    .card-title h5 {
        margin: 0;
        font-size: 24px;
        font-weight: 600;
        color: #315287;
        background: none;
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
    }

    .add-button a {
        color: white;
        text-decoration: none;
    }

    /* Form Elements */
    .form-container {
        width: 100%;
        box-sizing: border-box;
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

    /* Buttons */
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
        min-width: 120px;
        box-sizing: border-box;
    }

    .acc {
        background-color: #28A745;
    }

    .on-progress {
        background-color: #FFC107;
    }

    .selesai {
        background-color: #007BFF;
    }

    .ditolak {
        background-color: #DC3545;
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
    @include('navbar.white_admin')

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
```
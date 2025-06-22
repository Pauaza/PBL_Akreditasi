<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sidebar SuperAdmin</title>
    <style>
        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #fff;
            padding: 20px;
            border-right: 1px solid #dee2e6;
            position: fixed;
            top: 60px;
            left: 0;
            height: calc(100vh - 60px);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar .menu {
            flex-grow: 1;
        }

        .sidebar .menu-item {
            padding: 10px 0;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition for background color */
            margin-left: -20px; /* Offset left padding to extend background to edge */
            margin-right: -20px; /* Offset right padding to extend background to edge */
            padding-left: 20px; /* Restore padding for content alignment */
            padding-right: 20px; /* Restore padding for content alignment */
        }

        .sidebar .menu-item.clicked {
            background-color: #F5F5F5; /* Background changes to #F5F5F5 when clicked */
        }

        .sidebar .menu-item h5 {
            color: #315287;
            margin: 0;
            font-size: 18px;
            font-weight: 500;
        }

        .sidebar .menu-item a {
            text-decoration: none;
        }

        .sidebar .menu-item.active {
            background-color: #315287;
            padding-left: 15px;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
        }

        .sidebar .menu-item.active h5 {
            color: #fff;
        }

        .sidebar .version {
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #315287;
        }

        .sidebar .version p {
            margin: 0;
            font-size: 12px;
            color: #666;
            font-weight: 400;
        }

        .top-logo {
            display: flex;
            justify-content: left;
            align-items: center;
            padding: 10px 0;
            margin-bottom: 15px;
        }

        .logo-img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .back-button {
            background: #315287;
            border: none;
            border-radius: 50px;
            padding: 10px 10px;
            font-weight: 500;
            cursor: pointer;
            font-size: 14px;
            box-sizing: border-box;
            text-align: center;
        }

        .back-button a {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="top-logo">
            <img src="{{ asset('assets/img/jti.png') }}" alt="Logo" class="logo-img" />
        </div>
        <div class="menu">
            <div class="menu-item">
                <a href="{{ route('superAdmin.dashboard') }}"><h5>Dashboard</h5></a>
            </div>
            <div class="menu-item">
                <a href="{{ route('superAdmin.user.index') }}"><h5>User Configuration</h5></a>
            </div>
            <div class="menu-item">
                <a href="{{ route('superAdmin.kriteria.index') }}"><h5>Kriteria Configuration</h5></a>
            </div>
            <div class="menu-item">
                <a href="{{ route('superAdmin.page.index') }}"><h5>Page Configuration</h5></a>
            </div>
        </div>
        
    </div>

    <script>
        // Add click event listener to each menu item
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                // Remove 'clicked' class from all menu items
                menuItems.forEach(menu => menu.classList.remove('clicked'));
                // Add 'clicked' class to the clicked menu item
                this.classList.add('clicked');
            });
        });
    </script>
</body>
</html>
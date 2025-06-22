<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        .menu-item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .sidebar .menu-item h5 {
            color: #315287;
            margin: 0;
            font-size: 18px;
            font-weight: 500;
        }
        .sidebar .dropdown-icon {
            scale: 65%;
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
        .add-button {
            display: none;
            width: 100%;
            padding: 5px 10px;
            background: none;
            border: 1px solid #315287;
            border-radius: 4px;
            text-align: left;
            cursor: pointer;
            margin-top: 5px;
            color: #315287;
        }
        .add-button.show {
            display: block;
        }
        .add-button:hover {
            background-color: #e9ecef;
        }
        /* Active state styles */
        .sidebar .menu-item.active {
            background-color: #315287;
            padding-left: 15px;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
        }
        .sidebar .menu-item.active h5 {
            color: #fff;
        }
        /* Clicked state styles */
        .sidebar .menu-item.clicked {
            background-color: #F5F5F5; /* Gray background when clicked */
        }
        /* Ensure links don't override styles */
        .sidebar .menu-item a {
            text-decoration: none;
            display: block;
            width: 100%;
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
                <div class="menu-item-header">
                    <a href="/kriteria/validator/kriteria1"><h5>Kriteria 1</h5></a>
                </div>
            </div>
            <div class="menu-item">
                <div class="menu-item-header">
                    <a href="/kriteria/validator/kriteria2"><h5>Kriteria 2</h5></a>
                </div>
            </div>
            <div class="menu-item">
                <div class="menu-item-header">
                   <a href="/kriteria/validator/kriteria3"><h5>Kriteria 3</h5></a>
                </div>
            </div>
            <div class="menu-item">
                <div class="menu-item-header">
                    <a href="/kriteria/validator/kriteria4"><h5>Kriteria 4</h5></a>
                </div>
            </div>
            <div class="menu-item">
                <div class="menu-item-header">
                  <a href="/kriteria/validator/kriteria5"><h5>Kriteria 5</h5></a>
                </div>
            </div>
            <div class="menu-item">
                <div class="menu-item-header">
                    <a href="/kriteria/validator/kriteria6"><h5>Kriteria 6</h5></a>
                </div>
            </div>
            <div class="menu-item">
                <div class="menu-item-header">
                   <a href="/kriteria/validator/kriteria7"><h5>Kriteria 7</h5></a>
                </div>
            </div>
            <div class="menu-item">
                <div class="menu-item-header">
                   <a href="/kriteria/validator/kriteria8"><h5>Kriteria 8</h5></a>
                </div>
            </div>
            <div class="menu-item">
                <div class="menu-item-header">
                    <a href="/kriteria/validator/kriteria9"><h5>Kriteria 9</h5></a>
                </div>
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

        // Optional: Set 'clicked' class based on current URL
        const currentPath = window.location.pathname;
        menuItems.forEach(item => {
            const link = item.querySelector('a');
            if (link && link.getAttribute('href') === currentPath) {
                item.classList.add('clicked');
            }
        });
    </script>
</body>
</html>
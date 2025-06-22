<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Login Page - 2 Containers</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Montserrat, sans-serif;
        }

        body {
            background-image: url('{{ asset('assets/img/background-login.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            overflow: hidden;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Montserrat', sans-serif;
            gap: 220px;
        }

        .login-container1 {
            width: 600px;
            height: 600px;
            background: #fff;
            border-radius: 50px;
            padding: 40px 70px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .tab-buttons {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin-bottom: -10px;
        }

        .tab-button {
            background: #ffffff;
            color: #315287;
            border: none;
            padding: 15px 20px 15px 15px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: background 0.3s, color 0.3s;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .tab-button.active {
            background: #315287;
            color: white;
        }

        .tab-content {
            display: none;
            width: 99%;
            height: 400px;
            text-align: left;
            padding: 25px;
            border-radius: 10px;
            font-size: 12px;
            overflow-y: auto;
        }

        .tab-content.active {
            display: block;
        }

        #profile,
        #vision,
        #mission,
        #goals,
        #objectives {
            background: #315287;
        }

        .tab-content img {
            width: 100%;
            height: auto;
            max-height: 150px;
            object-fit: cover;
            margin-top: 10px;
            border-radius: 15px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        h3 {
            color: #fff;
            margin-bottom: 10px;
        }

        p {
            color: #fff;
            line-height: 1.6;
        }

        .login-container2 {
            width: 550px;
            height: 600px;
            background: #fff;
            border-radius: 50px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 40px 70px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .login-header {
            margin-bottom: 20px;
        }

        .login-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 2px;
        }

        .login-desc {
            font-size: 14px;
            font-style: italic;
            font-weight: 500;
            color: #315287;
            margin-bottom: 10px;
        }

        .login-container2 h2 {
            margin-bottom: 20px;
            color: #315287;
        }

        .login-container2 form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 15px;
        }

        .login-container2 input {
            width: 100%;
            padding: 17px;
            margin-bottom: 20px;
            border-radius: 50px;
            border: 2px solid #315287;
            font-size: 14px;
            font-weight: 500;
        }

        .login-container2 button {
            width: 100%;
            padding: 17px;
            background: #315287;
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-container2 button:hover {
            background: #243c65;
        }

        .login-container2 input::placeholder {
            color: #315287;
            font-style: italic;
            font-size: 13px;
            opacity: 70%;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            align-self: flex-start;
            font-size: 13px;
            font-weight: 500;
            color: #315287;
            margin-bottom: 10px;
            gap: 10px;
            font-style: italic;
            line-height: 1;
        }

        .checkbox-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #315287;
            margin: 0;
            vertical-align: middle;
            flex-shrink: 0;
        }

        .top-logo {
            position: absolute;
            top: 40px;
            left: 50px;
            background: white;
            border-radius: 50%;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .top-logo img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <div class="top-logo">
        <img src="assets/img/jti.png" alt="Logo" />
    </div>

    <div class="login-container1">
        <div class="tab-buttons">
            <button class="tab-button active" onclick="openTab('profile')">Profile</button>
            <button class="tab-button" onclick="openTab('vision')">Vision</button>
            <button class="tab-button" onclick="openTab('mission')">Mission</button>
            <button class="tab-button" onclick="openTab('goals')">Goals</button>
            <button class="tab-button" onclick="openTab('objectives')">Objectives</button>
        </div>

        <div id="profile" class="tab-content active">
            @php
                $page = $pages['login-form']['profile'] ?? null;
            @endphp
            @if ($page && !empty($page['image_path']))
                <img src="{{ asset('storage/' . $page['image_path']) }}" alt="Profile Image" />
            @endif
            <p>{!! $page['content'] ?? 'No data available' !!}</p>
        </div>

        <div id="vision" class="tab-content">
            @php
                $page = $pages['login-form']['vision'] ?? null;
            @endphp
            @if ($page && !empty($page['image_path']))
                <img src="{{ asset('storage/' . $page['image_path']) }}" alt="Vision Image" />
            @endif
            <p>{!! $page['content'] ?? 'No data available' !!}</p>
        </div>

        <div id="mission" class="tab-content">
            @php
                $page = $pages['login-form']['mission'] ?? null;
            @endphp
            @if ($page && !empty($page['image_path']))
                <img src="{{ asset('storage/' . $page['image_path']) }}" alt="Mission Image" />
            @endif
            <p>{!! $page['content'] ?? 'No data available' !!}</p>
        </div>

        <div id="goals" class="tab-content">
            @php
                $page = $pages['login-form']['goals'] ?? null;
            @endphp
            @if ($page && !empty($page['image_path']))
                <img src="{{ asset('storage/' . $page['image_path']) }}" alt="Goals Image" />
            @endif
            <p>{!! $page['content'] ?? 'No data available' !!}</p>
        </div>

        <div id="objectives" class="tab-content">
            @php
                $page = $pages['login-form']['objectives'] ?? null;
            @endphp
            @if ($page && !empty($page['image_path']))
                <img src="{{ asset('storage/' . $page['image_path']) }}" alt="Objectives Image" />
            @endif
            <p>{!! $page['content'] ?? 'No data available' !!}</p>
        </div>
    </div>

    <div class="login-container2">
        <div class="login-header">
            <img src="assets/icon/user.png" alt="Login Icon" class="login-icon" />
            <p class="login-desc">Please input registered username and password</p>
        </div>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

<script>
    function openTab(tabName) {
        const tabContents = document.getElementsByClassName("tab-content");
        for (let i = 0; i < tabContents.length; i++) {
            tabContents[i].classList.remove("active");
        }

        const tabButtons = document.getElementsByClassName("tab-button");
        for (let i = 0; i < tabButtons.length; i++) {
            tabButtons[i].classList.remove("active");
        }

        document.getElementById(tabName).classList.add("active");
        event.currentTarget.classList.add("active");
    }
</script>

</html>

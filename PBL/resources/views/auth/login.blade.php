<script type="text/javascript">
        var gk_isXlsx = false;
        var gk_xlsxFileLookup = {};
        var gk_fileData = {};
        function filledCell(cell) {
          return cell !== '' && cell != null;
        }
        function loadFileData(filename) {
        if (gk_isXlsx && gk_xlsxFileLookup[filename]) {
            try {
                var workbook = XLSX.read(gk_fileData[filename], { type: 'base64' });
                var firstSheetName = workbook.SheetNames[0];
                var worksheet = workbook.Sheets[firstSheetName];

                // Convert sheet to JSON to filter blank rows
                var jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, blankrows: false, defval: '' });
                // Filter out blank rows (rows where all cells are empty, null, or undefined)
                var filteredData = jsonData.filter(row => row.some(filledCell));

                // Heuristic to find the header row by ignoring rows with fewer filled cells than the next row
                var headerRowIndex = filteredData.findIndex((row, index) =>
                  row.filter(filledCell).length >= filteredData[index + 1]?.filter(filledCell).length
                );
                // Fallback
                if (headerRowIndex === -1 || headerRowIndex > 25) {
                  headerRowIndex = 0;
                }

                // Convert filtered JSON back to CSV
                var csv = XLSX.utils.aoa_to_sheet(filteredData.slice(headerRowIndex)); // Create a new sheet from filtered array of arrays
                csv = XLSX.utils.sheet_to_csv(csv, { header: 1 });
                return csv;
            } catch (e) {
                console.error(e);
                return "";
            }
        }
        return gk_fileData[filename] || "";
        }
        </script><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Laman Login</title>
    <link rel="icon" href="url " type="image/png">
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

        #profile, #vision, #mission, #goals, #objectives {
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

        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 30px;
            background-color: #315287;
            color: #fff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="top-logo">
        <img src="{{ asset('assets/img/jti.png') }}" alt="Logo" />
    </div>

    <div class="login-container1">
        <div class="tab-buttons">
            <button class="tab-button active" onclick="openTab('profile')">Profil</button>
            <button class="tab-button" onclick="openTab('vision')">Visi</button>
            <button class="tab-button" onclick="openTab('mission')">Misi</button>
            <button class="tab-button" onclick="openTab('goals')">Tujuan</button>
            <button class="tab-button" onclick="openTab('objectives')">Objektif</button>
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
            <img src="{{ asset('assets/icon/user.png') }}" alt="Login Icon" class="login-icon" />
            <p class="login-desc">Please input registered username and password</p>
        </div>
        <form id="loginForm" method="POST" action="{{ route('login.post') }}">
            @csrf
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    // Fungsi showAlert dari kriteria1/create.blade.php
    function showAlert(message, iconSrc, backgroundColor) {
        const existingAlert = document.querySelector('.custom-alert');
        if (existingAlert) existingAlert.remove();

        const alertDiv = document.createElement('div');
        alertDiv.className = 'custom-alert';
        alertDiv.style.position = 'fixed';
        alertDiv.style.top = '20px';
        alertDiv.style.right = '20px';
        alertDiv.style.padding = '15px 30px';
        alertDiv.style.backgroundColor = backgroundColor;
        alertDiv.style.color = '#fff';
        alertDiv.style.borderRadius = '10px';
        alertDiv.style.display = 'flex';
        alertDiv.style.alignItems = 'center';
        alertDiv.style.gap = '10px';
        alertDiv.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.2)';
        alertDiv.style.zIndex = '1000';
        alertDiv.style.fontFamily = 'Montserrat, sans-serif';
        alertDiv.style.fontSize = '14px';
        alertDiv.style.fontWeight = '500';

        const icon = document.createElement('img');
        icon.src = iconSrc;
        icon.style.width = '24px';
        icon.style.height = '24px';
        icon.style.objectFit = 'contain';
        icon.onerror = () => console.error('Gagal memuat ikon:', iconSrc);

        const messageSpan = document.createElement('span');
        messageSpan.textContent = message;

        alertDiv.appendChild(icon);
        alertDiv.appendChild(messageSpan);
        document.body.appendChild(alertDiv);

        console.log('Alert ditampilkan:', message);

        setTimeout(() => {
            alertDiv.remove();
            if (backgroundColor === '#315287') {
                window.location.href = document.querySelector('#loginForm button[type="submit"]').getAttribute('data-redirect');
            }
        }, 3000);
    }

    // Handle form submission with AJAX
    $(document).ready(function() {
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const url = form.attr('action');
            const csrfToken = form.find('input[name="_token"]').val();

            $.ajax({
                url: url,
                type: 'POST',
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                success: function(response) {
                    if (response.status) {
                        showAlert(response.message, response.icon, response.backgroundColor);
                        document.querySelector('#loginForm button[type="submit"]').setAttribute('data-redirect', response.redirect);
                    } else {
                        showAlert(response.message, response.icon, response.backgroundColor);
                    }
                },
                error: function(xhr) {
                    const response = xhr.responseJSON || { message: 'Terjadi kesalahan pada server' };
                    showAlert(response.message, '{{ asset('assets/icon/cross.png') }}', '#993a36');
                }
            });
        });
    });
</script>

</html>
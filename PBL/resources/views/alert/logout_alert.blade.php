<div id="logoutAlert" class="logout-alert" style="display: none;">
        <!-- Tambahkan Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <div class="logout-alert-content">
        <div class="logout-alert-bg" style="background: linear-gradient(135deg, #315287, #132144);"></div>
        <div class="logout-alert-overlay" style="background-image: url('{{ asset('assets/img/jti.png') }}');"></div>
        <div class="logout-alert-text">
            <h3>Logout Alert</h3>
            <p>Apakah Anda yakin ingin keluar?</p>
            <div class="logout-alert-buttons">
                <button class="btn-yes" onclick="confirmLogout()">Ya</button>
                <button class="btn-no" onclick="cancelLogout()">Tidak</button>
            </div>
        </div>
    </div>
</div>

<style>
    .logout-alert {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 10000;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .logout-alert-content {
        position: relative;
        background: linear-gradient(135deg, #315287, #132144);
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        width: 600px;
        z-index: 10001;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .logout-alert-overlay {
        position: absolute;
        top: -68px;
        left: -20px;
        width: 230px;
        height: 230px;
        background-image: url('{{ asset('assets/img/jti.png') }}');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: top left;
        opacity: 0.35;
        z-index: 0;
        border-radius: 20px 0 0 0;
    }

    
    .logout-alert-text {
        position: relative;
        z-index: 2;
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .logout-alert-text h3 {
        margin-bottom: 15px;
        font-size: 24px;
        font-weight: bold;
    }

    .logout-alert-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .btn-yes,
    .btn-no {
        padding: 10px 30px;
        border: none;
        border-radius: 999px;
        background-color: #fff;
        color: #132144;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-yes {
        color: #007bff;
    }

    .btn-yes:hover {
        background-color: #007bff;
        color: #fff;
    }

    .btn-no {
        color: #dc3545;
    }

    .btn-no:hover {
        background-color: #dc3545;
        color: #fff;
    }
</style>


<script>
    function showLogoutAlert() {
        const alert = document.getElementById('logoutAlert');
        if (alert) {
            alert.style.display = 'flex';
        } else {
            console.log('Alert tidak ditemukan!');
        }
    }

    function confirmLogout() {
        const alert = document.getElementById('logoutAlert');
        if (alert) {
            alert.style.display = 'none';
            const form = document.getElementById('logoutForm');
            if (form) {
                form.submit();
            } else {
                console.log('Form logout tidak ditemukan!');
            }
        }
    }

    function cancelLogout() {
        const alert = document.getElementById('logoutAlert');
        if (alert) {
            alert.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const logoutButton = document.querySelector('.button-logout');
        if (logoutButton) {
            logoutButton.addEventListener('click', function(e) {
                e.preventDefault();
                showLogoutAlert();
            });
        } else {
            console.log('Tombol logout tidak ditemukan!');
        }
    });
</script>

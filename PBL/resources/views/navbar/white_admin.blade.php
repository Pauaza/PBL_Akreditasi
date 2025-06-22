<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Navbar dengan Logout</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #f5f5f5;
        }

        .custom-navbar {
            background: #fff;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 20px 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 95%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .navbar-brand img {
            height: 30px;
            margin-right: 5px;
        }

        .navbar-brand span {
            color: #315287;
            font-weight: 500;
            font-size: 16px;
        }

        .navbar-nav {
            list-style: none;
            display: flex;
            gap: 25px;
            align-items: center;
        }

        .nav-item {
            display: flex;
            align-items: center;
        }

        .nav-link {
            color: #315287;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .button-logout {
            background: #993A36;
            color: white;
            padding: 10px 50px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 100;
            border: none;
            cursor: pointer;
        }

        .button-logout:hover {
            background: #7a2e2a;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 1000px;
            border-radius: 5px;
            position: relative;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            line-height: 1;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }

        .pdf-viewer {
            width: 100%;
            height: 600px;
            border: 1px solid #ccc;
            margin-top: 20px;
            border-radius: 5px;
        }

        .pdf-viewer-container {
            position: relative;
        }

        .pdf-fallback {
            display: none;
            text-align: center;
            color: #721c24;
            background-color: #f8d7da;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .loading-spinner {
            display: none;
            text-align: center;
            padding: 20px;
            font-size: 16px;
            color: #555;
        }

        .btn-primary {
            background: #315287;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-primary:hover {
            background: #264170;
        }

        @media (max-width: 768px) {
            .pdf-viewer {
                height: 400px;
            }

            .modal-content {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <nav class="custom-navbar">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('assets/img/logo-polinema.png') }}" alt="Logo">
                <span>Akreditasi D4 Sistem Informasi Bisnis</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="{{ route('dashboard_admin') }}" class="nav-link">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" onclick="openFinalDocModal()">Finalisasi Dokumen</a></li>
                <!-- Di dalam ul navbar-nav -->
                <li class="nav-item">
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="button" class="button-logout"
                            title="Logout sebagai {{ Auth::user()->username }}, {{ Auth::user()->name }}">
                            <i></i> Logout
                        </button>
                    </form>
                </li>

                <!-- Include alert di bagian bawah file, sebelum </body> -->
            </ul>
        </div>
    </nav>
    @include('alert.logout_alert')

    <!-- Modal for PDF Viewer -->
    <div id="finalDocModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeFinalDocModal()">&times;</span>
            <h2>Finalisasi Dokumen</h2>
            <p>Laporan ini menampilkan semua kriteria (1-9).</p>
            <br>
            <div class="mb-3">
                <a href="{{ route('finalisasi.download') }}" class="btn btn-primary">Unduh Laporan Final</a>
            </div>
            <div class="pdf-viewer-container">
                <div class="loading-spinner">Memuat laporan PDF...</div>
                <iframe id="pdfViewer" class="pdf-viewer" title="Laporan Kriteria Disetujui"></iframe>
                <div class="pdf-fallback">
                    Gagal memuat laporan PDF. Silakan coba unduh laporan atau periksa koneksi Anda.
                </div>
            </div>
        </div>
    </div>

    <script>
        function openFinalDocModal() {
            const modal = document.getElementById('finalDocModal');
            const pdfViewer = document.getElementById('pdfViewer');
            const fallback = document.querySelector('.pdf-fallback');
            const loadingSpinner = document.querySelector('.loading-spinner');

            // Reset states
            pdfViewer.src = '';
            pdfViewer.style.display = 'none';
            fallback.style.display = 'none';
            loadingSpinner.style.display = 'block';
            modal.style.display = 'block';

            fetch('{{ route('finalisasi.stream') }}', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    loadingSpinner.style.display = 'none';
                    console.log('Response data:', data); // Debug log
                    if (data.success && data.pdfBase64) {
                        // Convert base64 to Blob
                        try {
                            const byteCharacters = atob(data.pdfBase64);
                            const byteNumbers = new Array(byteCharacters.length);
                            for (let i = 0; i < byteCharacters.length; i++) {
                                byteNumbers[i] = byteCharacters.charCodeAt(i);
                            }
                            const byteArray = new Uint8Array(byteNumbers);
                            const blob = new Blob([byteArray], {
                                type: 'application/pdf'
                            });
                            const url = URL.createObjectURL(blob);
                            pdfViewer.src = url;
                            pdfViewer.style.display = 'block';
                        } catch (e) {
                            console.error('Error converting base64 to Blob:', e);
                            fallback.style.display = 'block';
                            fallback.textContent = 'Gagal merender PDF: Format data tidak valid.';
                        }
                    } else {
                        fallback.style.display = 'block';
                        fallback.textContent = data.message || 'Gagal memuat laporan PDF.';
                    }
                })
                .catch(error => {
                    loadingSpinner.style.display = 'none';
                    fallback.style.display = 'block';
                    fallback.textContent = 'Gagal memuat laporan PDF: ' + error.message;
                    console.error('Error fetching PDF:', error);
                });
        }

        function closeFinalDocModal() {
            const modal = document.getElementById('finalDocModal');
            const pdfViewer = document.getElementById('pdfViewer');
            const fallback = document.querySelector('.pdf-fallback');
            const loadingSpinner = document.querySelector('.loading-spinner');

            modal.style.display = 'none';
            pdfViewer.src = '';
            pdfViewer.style.display = 'none';
            fallback.style.display = 'none';
            loadingSpinner.style.display = 'none';
        }

        // Close modal when clicking outside content
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('finalDocModal');
            const modalContent = document.querySelector('.modal-content');
            if (event.target === modal && modal.style.display === 'block') {
                closeFinalDocModal();
            }
        });
    </script>
</body>

</html>

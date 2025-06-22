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
        }

        .sidebar .menu-item h5 {
            color: #315287;
            margin: 0;
            font-size: 18px;
            font-weight: 500;
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
            <div class="menu-item" data-section="penetapan-section">
                <h5>I Penetapan</h5>
            </div>
            <div class="menu-item" data-section="pelaksanaan-section">
                <h5>II Pelaksanaan</h5>
            </div>
            <div class="menu-item" data-section="evaluasi-section">
                <h5>III Evaluasi</h5>
            </div>
            <div class="menu-item" data-section="pengendalian-section">
                <h5>IV Pengendalian</h5>
            </div>
            <div class="menu-item" data-section="peningkatan-section">
                <h5>V Peningkatan</h5>
            </div>
        </div>

        @php
            $username = Auth::user()->username;
            $akses = [
                'admin1' => 1,
                'admin2' => 2,
                'admin3' => 3,
                'admin4' => 4,
                'admin5' => 5,
                'admin6' => 6,
                'admin7' => 7,
                'admin8' => 8,
                'admin9' => 9,
            ];
            // Ambil segment ke-3 (kriteria2) dan konversi ke integer
            $segmentId = request()->segment(3)
                ? (int) filter_var(request()->segment(3), FILTER_SANITIZE_NUMBER_INT)
                : null;
            // Gunakan segmentId jika valid, fallback ke akses user
            $kriteriaId = in_array($segmentId, $akses) ? $segmentId : $akses[$username] ?? null;
        @endphp

        <div class="back-button">
            <a href="/kriteria/admin/kriteria{{ $kriteriaId }}">Back to Table</a>
        </div>
    </div>
    <script>
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');

                const sectionId = this.getAttribute('data-section');
                const section = document.getElementById(sectionId);
                if (section) {
                    const headerOffset = 170;
                    const sectionPosition = section.getBoundingClientRect().top + window.scrollY;
                    window.scrollTo({
                        top: sectionPosition - headerOffset,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Highlight menu sidebar berdasarkan posisi scroll
        window.addEventListener('scroll', debounce(() => {
            const sections = [
                'penetapan-section',
                'pelaksanaan-section',
                'evaluasi-section',
                'pengendalian-section',
                'peningkatan-section',
                'comments-section'
            ];

            let currentSection = '';
            const headerOffset = 170;

            for (const sectionId of sections) {
                const section = document.getElementById(sectionId);
                if (section) {
                    const rect = section.getBoundingClientRect();
                    if (rect.top <= headerOffset + 50 && rect.bottom >= headerOffset) {
                        currentSection = sectionId;
                        break;
                    }
                }
            }

            if (currentSection) {
                document.querySelectorAll('.menu-item').forEach(item => item.classList.remove('active'));
                const activeItem = document.querySelector(`.menu-item[data-section="${currentSection}"]`);
                if (activeItem) {
                    activeItem.classList.add('active');
                }
            }
        }, 100));

        // Fungsi debounce untuk mengoptimalkan event scroll
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Si Akred SIB</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/img/jti.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            overflow-x: hidden;
            color: #315287;
            background: #fff;
        }

        /* SECTION ATAS */
        .hero-bg {
            background: url('{{ asset('assets/img/bg_sec_top.png') }}') no-repeat center -50px;
            background-size: cover;
            height: 100vh;
            width: 100%;
            position: relative;
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            padding: 40px;
            padding-top: 170px;
            padding-left: 100px;
            text-align: left;
            color: white;
        }

        .hero-content h1{
          font-size: 50px;
          font-weight: 700;
        }

        .hero-content p{
          font-size: 20px;
          font-weight: 200;
          text-align: justify;
        }

        .button-masuk {
            background: white;
            color: #315287;
            padding: 10px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .button-masuk:hover {
            background: #e0e0e0;
        }

        /* MIRING */
        .angled-border{
          clip-path: polygon(0 30%, 100% 0, 100% 100%, 0 100%);
          background:#fff;
          height:300px;
          position:relative;
          z-index:1;
      }

      .angled-border::after{
          content:'';
          position:absolute;
          bottom:-20px;
          left:0;
          width:100%;
          height:40px;
          background:linear-gradient(to bottom, rgba(255,255,255,0) 0%, #fff 100%);
          z-index:2;
      }

      /* SECTION ABOUT */
        .about-section {
            position: relative;
            padding-left: 0px;
            padding: 40px 20px;
            background: #fff;
            z-index: 2;
        }
        .about-image {
          clip-path: polygon(0 18%, 100% 11%, 100% 100%, 0 100%);
          background: #315287;
          height: 500px;
          position: absolute;
          top: -100px;
          left: 0;
          max-width: 35%;
          overflow: hidden;
      }

      .about-image img {
          width: 100%;
          height: 100%;
          object-fit: cover;
          opacity: 0.7;
      }

      .section-container {
          min-height: 450px;
      }

       .about-title {
          font-size: 32px;
          font-weight: 600;
          margin-bottom: 20px;
          color: #315287;
      }

      .about-text {
          font-size: 18px;
          font-weight: 400;
          line-height: 1.6;
          color: #315287;
          text-align: justify;
      }

      /* SECTION FITUR */
      .features-section {
          padding: 40px 20px;
          background: #315287;
      }
      .features-title {
          font-size: 32px;
          font-weight: 600;
          color: #fff;
          margin-bottom: 36px;
          text-align: center;
      }
      .features-container {
          display: flex;
          justify-content: center;
          gap: 20px;
          flex-wrap: wrap;
      }
      .feature-box {
          background: #fff;
          border-radius: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          width: 250px;
          padding: 20px;
          text-align: left;
          transition: transform 0.3s ease;
      }
      .feature-box:hover {
          transform: translateY(-5px);
      }
      .feature-header {
          display: flex;
          align-items: center;
          margin-bottom: 15px;
      }
      .feature-icon {
          width: 30px;
          height: 30px;
          margin-right: 10px;
      }
      .feature-icon img {
          width: 100%;
          height: 100%;
          object-fit: contain;
      }
      .feature-title {
          font-size: 20px;
          color: #fff;
          font-weight: 600;
      }
      .feature-description {
          font-size: 14px;
          color: #315287;
          line-height: 1.5;
      }

        /* SECTION INFO */
        .info-section {
            padding: 40px 20px;
            background: #f0f0f0; /* Latar belakang abu-abu muda */
        }

        .info-wrapper {
            display: flex;
            justify-content: space-between;
            max-width: 100%;
            margin: 0 auto;
            background: #f0f0f0; /* Latar belakang sedikit gelap/abu-abu */
            padding: 20px;
            border-radius: 8px;
            color: #315287;
        }

        .info-content {
            flex: 2; /* 2x ukuran dari info-links dan info-social */
            padding-right: 20px;
            display: inline;
        }

        .logo-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .info-logo1 {
            max-width: 70px;
        }

        .info-logo2 {
            max-width: 140px;
        }

        .logo-divider {
            width: 1px;
            height: 50px;
            background: #315287;
            margin: 0 15px;
        }

        .contact-info {
            margin-top: 15px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .contact-icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .info-links, .info-social {
            flex: 1; /* Setengah ukuran dari info-content */
        }

        .info-links h3, .info-social h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .info-links ul {
            list-style: none;
            padding: 0;
        }

        .info-links ul li {
            margin-bottom: 10px;
        }

        .info-links ul li a {
            color: #315287;
            text-decoration: none;
        }

        .info-links ul li a:hover {
            text-decoration: underline;
        }

        .social-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .social-link {
            display: flex;
            align-items: center;
            color: #315287;
            text-decoration: none;
        }

        .social-icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .social-link span {
            font-size: 14px;
        }

        /* Tombol Kontak dan Media Sosial */
        .contact-button {
            display: flex;
            align-items: center;
            background: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: #315287;
            margin-bottom: 10px;
            width: fit-content;
            min-width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .social-button {
            display: flex;
            align-items: center;
            background: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: #315287;
            margin-bottom: 10px;
            width: fit-content;
            min-width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-button:hover, .social-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .contact-icon, .social-icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .contact-button span, .social-button span {
            font-size: 14px;
            line-height: 1.2;
        }

        @media (max-width: 768px) {
            .info-wrapper {
                flex-direction: column;
            }
            .info-content, .info-links, .info-social {
                flex: 1;
                margin-bottom: 20px;
            }
        }

      /* FOOTER */
        .footer {
            background: #315287;
            color: white;
            padding: 20px;
            text-align: center;
            font-style: italic;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .section-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-top: -100px;
            position: relative;
            z-index: 10;
            max-width: 900px;
            min-width: 500px;
            margin-left: auto;
        }
        @media (min-width: 768px) {
            .feature-box {
                width: calc(33.33% - 16px);
            }
            .info-card {
                width: calc(50% - 8px);
            }
        }
        @media (max-width: 768px) {
            .about-image {
                width: 100%;
                top: -5000px;
                height: 200px;
            }
            .hero-content {
                padding: 20px;
            }
            .feature-box, .info-card {
                margin: 10px 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    @include('navbar.landing')

    <!-- Hero Section -->
    <section class="hero-bg">
        <div class="hero-content">
            <h1>Sistem Akreditasi <br> D4 Sistem Informasi <br> Bisnis</h1> <br>
            <p>Sistem Akreditasi kami dirancang untuk mempermudah proses <br> penilaian dan peningkatan mutu secara transparan, efisien, dan <br> terstandar. Dengan teknologi digital yang modern, Admin dapat <br> mengelola dokumen, melakukan asesmen, serta memantau hasil <br> akreditasi secara real-time dalam satu platform terintegrasi.</p>
            <br>
            <br>
            <a href="{{ route('login') }}" class="button-masuk">Masuk ke Sistem</a>
        </div>
        <div class="angled-border"></div>
    </section>
    <br>

    <!-- About Section -->
    <section class="about-section relative">
        <div class="container">
            <div class="about-image">
                <img src="{{ asset('assets/img/akred.jpg') }}" alt="Building">
            </div>
            <div class="section-container">
                <h2 class="about-title">Tentang Sistem Akreditasi</h2><br>
                <p class="about-text">Sistem Akreditasi Program Studi Sistem Informasi Bisnis merupakan platform digital yang dirancang untuk memudahkan proses penilaian mutu akademik secara efisien dan terstandar. Sistem ini memfasilitasi penyusunan dokumen akreditasi, pengisian instrument, serta proses asesmen lapangan secara transparan. Dengan adanya sistem ini, seluruh tahapan akreditasi dapat diintegrasikan dalam satu platform terpadu yang mendukung pengelolaan data secara real-time, memantau proses, serta menghasilkan laporan akreditasi yang akurat dan terpercaya.</p>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
      <h2 class="features-title">Fitur</h2>
        <div class="container">
            <div class="features-container">
                <div class="feature-box">
                    <div class="feature-header">
                        <div class="feature-icon"><img src="{{ asset('assets/img/super_admin.png') }}" alt="SuperAdmin Icon"></div>
                        <h3 class="feature-title">SuperAdmin</h3>
                    </div>
                    <p class="feature-description">Mengelola seluruh sistem, pengguna, dan proses akreditasi secara terpusat.</p>
                </div>
                <div class="feature-box">
                    <div class="feature-header">
                        <div class="feature-icon"><img src="{{ asset('assets/img/kriteria_admin.png') }}" alt="Admin Kriteria Icon"></div>
                        <h3 class="feature-title">Admin Kriteria</h3>
                    </div>
                    <p class="feature-description">Mengelola data kriteria akreditasi dan menyusun dokumen dengan efisien.</p>
                </div>
                <div class="feature-box">
                    <div class="feature-header">
                        <div class="feature-icon"><img src="{{ asset('assets/img/validator.png') }}" alt="Validator Icon"></div>
                        <h3 class="feature-title">Validator</h3>
                    </div>
                    <p class="feature-description">Melakukan validasi dan asesmen lapangan untuk memastikan mutu.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="info-section">
        <div class="container">
            <div class="info-wrapper">
                <div class="info-content">
                    <div class="logo-group">
                        <img src="{{ asset('assets/img/jti.png') }}" alt="Logo 1" class="info-logo1">
                        <div class="logo-divider"></div>
                        <img src="{{ asset('assets/img/logo_akred.png') }}" alt="Logo 2" class="info-logo2">
                    </div>
                    <p style="text-align:justify">Sistem Akreditasi kami dirancang untuk mempermudah proses penilaian dan peningkatan mutu secara transparan, efisien, dan terstandar. Dengan teknologi digital yang modern, Admin dapat mengelola dokumen, melakukan asesmen, serta memantau hasil akreditasi secara real-time dalam satu platform terintegrasi.</p>
                    <div class="contact-info">
                        <a href="#" class="contact-button">
                            <img src="{{ asset('assets/icon/address.png') }}" alt="Address Icon" class="contact-icon">
                            <p>Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur</p>
                        </a>
                        <a href="tel:+62341404226" class="contact-button">
                            <img src="{{ asset('assets/icon/call.png') }}" alt="Phone Icon" class="contact-icon">
                            <p>(0341) 404226</p>
                        </a>
                    </div>
                </div>
                <div class="info-links">
                    <h3>Pintasan</h3>
                    <ul>
                        <li><a href="#">> Beranda</a></li>
                        <li><a href="#">> Tentang</a></li>
                        <li><a href="#">> Fitur</a></li>
                        <li><a href="#">> Informasi</a></li>
                        <li><a style= "font-weight:600" href="{{ route('login') }}">> Masuk ke Sistem</a></li>
                    </ul>
                </div>
                <div class="info-social">
                    <h3>Media Sosial</h3>
                    <div class="social-links">
                        <a href="mailto:humas@polinema.ac.id" class="social-button">
                            <img src="{{ asset('assets/icon/mail.png') }}" alt="Email Icon" class="social-icon">
                            <span>Email Us</span><br><span>humas@polinema.ac.id</span>
                        </a>
                        <a href="https://instagram.com/polinema.campus" class="social-button">
                            <img src="{{ asset('assets/icon/instagram.png') }}" alt="Instagram Icon" class="social-icon">
                            <span>Visit Us</span><br><span>@polinema.campus</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="footer">
        <p>©Copyright Kelompok e Paudra, 2025</p>
    </footer>
</body>
</html>
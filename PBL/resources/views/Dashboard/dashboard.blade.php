<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
        }

        /* Fixed background container */
        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{ asset('assets/img/welcome.png') }}") no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            z-index: -1;
        }

        /* Welcome Section */
        .welcome {
            position: relative;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: transparent;
            z-index: 1;
        }

        .welcome::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.3) 30%, rgba(255, 255, 255, 0.7) 70%, rgba(255, 255, 255, 1) 100%);
            pointer-events: none;
            z-index: 2;
        }

        .welcome-text {
            position: relative;
            z-index: 3;
            color: white;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .welcome h1 {
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .welcome p {
            font-size: 15px;
            font-weight: 500;
            margin: 1px 0;
        }

        /* SECTIONS */
        .section {
            padding: 60px 20px;
            text-align: center;
            background: #fff;
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
        }

        .section-container {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            margin: 0 auto;
            width: 100%;
            max-width: 90%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #333333;
            box-sizing: border-box;
            text-align: center;
            height: auto;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        /* NEWS */
        .news img {
            width: 97%;
            max-width: 100%;
            border-radius: 10px;
            object-fit: cover;
            margin: 10px auto;
            max-height: 500px;
        }

        .news h2 {
            color: #315287;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .news p {
            margin: 10px 0;
            padding: 0 20px;
            font-size: 16px;
            text-align: justify;
            color: #315287;
        }

        /* CONTACT SECTION */
        .contact h2 {
            color: #315287;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .contact .section-container {
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            padding: 30px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 15px;
            max-width: 300px;
            text-align: left;
        }

        .contact-item img {
            width: 30px;
            height: 30px;
        }

        .contact-item div {
            display: flex;
            flex-direction: column;
        }

        .contact-item span:first-child {
            font-weight: 600;
            color: #315287;
            margin-bottom: 5px;
        }

        .contact-item span {
            font-size: 14px;
            color: #333333;
        }

        /* Responsive Design for Contact */
        @media (max-width: 600px) {
            .contact .section-container {
                flex-direction: column;
                align-items: center;
            }

            .contact-item {
                max-width: 100%;
                justify-content: center;
            }
        }

        /* Responsive Design for Other Sections */
        @media (max-width: 600px) {
            .section-container {
                width: 95%;
            }
            .news img {
                max-height: 300px;
            }
        }

        /* DENAH */
        .map {
            background: #315287;
        }

        .map h2 {
            margin-bottom: 10px;
            color: #fff;
            font-weight: 600;
        }

        .map img {
            width: 80%;
            max-width: 800px;
            border-radius: 10px;
            object-fit: contain;
            margin: 0 auto;
        }

        .map button {
            margin-top: 10px;
            background: #315287;
            color: white;
            padding: 10px 100px;
            border-radius: 50px;
            border: none;
            font-size: 12px;
            font-weight: 500;
        }

        /* FOOTER */
        footer {
            background: #600000;
            color: white;
            padding: 15px 0;
            text-align: center;
            position: relative;
            z-index: 1;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="background"></div>

    @include('navbar.blur')

    <div class="welcome">
        <div class="welcome-text">
            <h1>Selamat Datang</h1>
            <p>Di Akreditasi D4 Sistem Informasi Bisnis</p>
            <p>Jurusan Teknologi Informasi</p>
            <p>Politeknik Negeri Malang</p>
        </div>
    </div>

    <div class="section news">
        <h2>Berita Terbaru</h2>
        <div class="section-container">
            <img src="{{ asset('assets/img/news.png') }}">
            <p><strong>Selasa, 29 April 2025:</strong> 
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus cursus tortor id elit placerat cursus. Nunc at lectus id enim tristique tincidunt. Nam at pellentesque tellus. Phasellus interdum leo non auctor iaculis. Nunc feugiat dolor nec lectus laoreet posuere. Cras ac porttitor massa. Maecenas ligula orci, egestas id orci nec, lacinia facilisis mauris. Mauris sed interdum felis, in rhoncus mauris. Donec non tincidunt tellus. Suspendisse tempor leo rutrum, rutrum dolor sit amet, viverra risus. Nulla fringilla maximus imperdiet. In hac habitasse platea dictumst. Proin egestas auctor interdum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p>
        </div>
    </div>

    <div class="section map">
        <h2>Denah Gedung JTI</h2>
        <div class="section-container">
            <img src="{{ asset('assets/img/map.png') }}">
            <button type="submit">Selengkapnya</button>
        </div>
    </div>

    <div class="section contact">
        <h2>Contact</h2>
        <div class="section-container">
            <div class="contact-item">
                <img src="assets/icon/address.png" alt="Address Icon">
                <div>
                    <span>Address</span>
                    <span>Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141</span>
                </div>
            </div>
            <div class="contact-item">
                <img src="assets/icon/call.png" alt="Contact Icon">
                <div>
                    <span>Contact Us</span>
                    <span>(0341) 404424</span>
                </div>
            </div>
            <div class="contact-item">
                <img src="assets/icon/mail.png" alt="Email Icon">
                <div>
                    <span>Email Us</span>
                    <span>humas@polinema.ac.id</span>
                </div>
            </div>
            <div class="contact-item">
                <img src="assets/icon/instagram.png" alt="Instagram Icon">
                <div>
                    <span>Visit Us</span>
                    <span>@polinema_campus</span>
                </div>
            </div>
        </div>
    </div>

    <footer>
        ©Copyright Kelompok 4 - King Paudra, 2025
    </footer>
</body>
</html>
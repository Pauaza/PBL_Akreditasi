<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page - 2 Containers</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Montserrat, sans-serif;
    }

    body {
      /* background-image: url('{{ asset('assets/img/background-login.png') }}'); */
      background-image: url('{{ asset('assets/img/bg.png') }}');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      overflow: hidden;
      height:100%;
      height:100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Montserrat', sans-serif;
      gap: 220px;
      
    }

    /* CONTAINER KIRI */
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
      padding: 15px 20px 15px 18px;
      border-radius: 
      cursor: pointer;
      font-size: 14px;
      transition: background 0.3s, color 0.3s; /* Added color transition */
      border-top-left-radius:10px;
      border-top-right-radius:10px;
    }

    .tab-button.active {
      background: #315287;
      color: white;
    }

    .tab-content {
      display: none;
      width: 98%;
      height: 400px; /* Fixed height for uniformity */
      text-align: left;
      padding: 25px;
      border-radius: 10px;
      overflow-y: auto; /* Allow scrolling if content overflows */
      font-size:14px;
    }

    .tab-content.active {
      display: block;
    }

    #profile { background: #315287; }
    #vision { background: #315287; } 
    #mission { background: #315287; }
    #goals { background: #315287; }
    #objectives { background: #315287; } 

    .tab-content img {
      width: 100%;
      height: auto;
      max-height: 150px; /* Adjust height as needed */
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




    
    /* CONTAINER KANAN */
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
  font-style:italic;
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
  font-size:15px;
}

.login-container2 input {
  width: 100%;
  padding: 17px;
  margin-bottom: 20px;
  border-radius: 50px;
  border: 2px solid #315287;
  font-size: 14px;
}

.login-container2 button {
  width: 100%;
  padding: 17px;
  background: #315287;
  color: white;
  border: none;
  border-radius: 50px;
  font-size: 11px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.login-container2 button:hover {
  background: #243c65;
}

/* Placeholder styling */
.login-container2 input::placeholder {
  color: #315287;          /* Warna placeholder */
  font-style: italic;   /* Gaya huruf */
  font-size: 13px;      /* Ukuran font */
  opacity:70%;
}

.checkbox-label {
  display: flex;
  align-items: center; /* Keeps vertical alignment */
  align-self: flex-start;
  font-size: 13px;
  color: #315287;
  margin-bottom: 10px;
  gap: 10px;
  font-style: italic;
  line-height: 1; /* Ensures text doesn't add extra height */
}

.checkbox-label input[type="checkbox"] {
  width: 16px;
  height: 16px;
  accent-color: #315287;
  margin: 0; /* Removes any default margins that might offset alignment */
  vertical-align: middle; /* Fallback for older browsers */
  flex-shrink: 0; /* Prevents checkbox from shrinking and misaligning */
}

/* LOGO JTI */
.top-logo {
  position: absolute;
  top: 40px;
  left: 100px;
  background: white;           /* latar belakang putih */
  border-radius: 50%;          /* bentuk lingkaran */
  padding: 20px;               /* spasi dalam lingkaran */
}

.top-logo img {
  width: 70px;
  height: 70px;
  object-fit: contain;
  border-radius: %;          /* pastikan gambar juga bulat */
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
      <h3>Profile</h3>
      <img src="assets/img/profile.png" alt="Long Image" />
      <p>Politeknik Negeri Malang (Polinema) berdiri berdasarkan SK Presiden RI No. 59 Tahun 1982. Statusnya berubah menjadi institusi mandiri melalui SK Mendikbud No. 0313/O/1991. Polinema terus berkembang dalam bidang pendidikan, penelitian, dan pengabdian kepada masyarakat berkhasis teknologi terapan. Upaya memperoleh hasil, antara lain akreditasi A dari BAN-PT pada 2018 dan akreditasi internasional ASIC untuk 20 program studi pada 2020.</p>
    </div>

    <div id="vision" class="tab-content">
      <h3>Vision</h3>
      <img src="assets/img/profile.png" alt="Long Image" />
      <p>Become a leading polytechnic in Indonesia, producing graduates who are competent, innovative, and globally competitive in applied technology.</p>
    </div>

    <div id="mission" class="tab-content">
      <h3>Mission</h3>
      <img src="assets/img/profile.png" alt="Long Image" />
      <p>1. Provide high-quality education in applied technology.<br>2. Conduct research that supports innovation and industry needs.<br>3. Contribute to community development through technology transfer and collaboration.</p>
    </div>

    <div id="goals" class="tab-content">
      <h3>Goals</h3>
      <img src="assets/img/profile.png" alt="Long Image" />
      <p>- Achieve international recognition in applied technology education.<br>- Produce graduates with entrepreneurial skills and global perspectives.<br>- Strengthen partnerships with industries and global institutions.</p>
    </div>

    <div id="objectives" class="tab-content">
      <h3>Objectives</h3>
      <img src="assets/img/profile.png" alt="Long Image" />
      <p>- Enhance curriculum to meet industry standards.<br>- Increase research output and publications.<br>- Expand international collaborations and student exchange programs.</p>
    </div>
  </div>

  <div class="login-container2">
    <div class="login-header">
      <img src="assets/img/user.png" alt="Login Icon" class="login-icon" />
      <p class="login-desc">Please input registered username and password</p>
    </div>
    <form>
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <label class="checkbox-label">
        <input type="checkbox" name="setuju" checked />Hide Password
      </label>      
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
<script>
  function openTab(tabName) {
    // Hide all tab contents
    const tabContents = document.getElementsByClassName("tab-content");
    for (let i = 0; i < tabContents.length; i++) {
      tabContents[i].classList.remove("active");
    }

    // Remove active class from all buttons
    const tabButtons = document.getElementsByClassName("tab-button");
    for (let i = 0; i < tabButtons.length; i++) {
      tabButtons[i].classList.remove("active");
    }

    // Show the selected tab content and set the button as active
    document.getElementById(tabName).classList.add("active");
    event.currentTarget.classList.add("active");
  }
</script>
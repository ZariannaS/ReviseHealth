<!DOCTYPE html>
<html>
<head>
    <title>Revise Health Resources</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding-top: 50px; /* Add padding to accommodate the navigation bar */
            background-color: white;
            color: #333;
        }
        h1 {
            margin: 20px 0;
            text-align: center;
            font-size: 32px;
        }
        p {
            margin: 20px 0;
            line-height: 1.6;
        }
        .links {
            margin: 20px 0;
        }
        .links a {
            display: block;
            margin-bottom: 10px;
            color: black;
            text-decoration: none;
        }
        .links a:hover {
            text-decoration: underline;
        }
        .testimonial {
            border-top: 1px solid #ccc;
            padding-top: 20px;
            margin: 20px 0;
        }
        .testimonial p {
            font-style: italic;
            line-height: 1.6;
        }

        .section-divider {
            border-bottom: 4px solid #007bff;
            margin: 20px 0;
        }

        .w3-bar .w3-button {
            padding: 16px;
        }

        /* Sidebar */
        .w3-sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .w3-sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .w3-sidebar a:hover {
            background-color: #ccc;
            color: black;
        }

        .w3-sidebar a.active {
            background-color: #007bff;
            color: white;
        }

        .w3-sidebar .close-btn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        /* Container */
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
      <div class="w3-bar w3-white w3-card" id="myNavbar">
        <a href="index.php" class="w3-bar-item w3-button w3-wide">REVISE HEALTH</a>
        <!-- Right-sided navbar links -->
        <div class="w3-right w3-hide-small">
          <a href="login.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Login</a>
          <a href="payment_login.php" class="w3-bar-item w3-button"><i class="fa fa-money"></i> Payment</a>
          <a href="getVirtualTour.php" class="w3-bar-item w3-button"><i class="fa fa-desktop"></i> Virtual Tour</a>
          <a href="getLiveChat.php" class="w3-bar-item w3-button"><i class="fa fa-comment"></i> Live Chat</a>
        </div>
        <!-- Hide right-floated links on small screens and replace them with a menu icon -->

        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
          <i class="fa fa-bars"></i>
        </a>
      </div>
    </div>

    <!-- Sidebar on small screens when clicking the menu icon -->
    <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
      <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16 close-btn">Close ×</a>
      <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
      <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">TEAM</a>
      <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">WORK</a>
      <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button">PRICING</a>
      <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
    </nav>

    <div class="container">
        <h1>Revise Health</h1>
        <p><strong>Mission statement</strong><br>
        Welcome to Revise Health Virtual Clinic, where we are committed to supporting individuals on their journey to sobriety and wellness. Our online platform offers comprehensive services for those recovering from drug and alcohol addiction, providing a safe and supportive environment for healing and growth.</p>
        
        <div class="section-divider"></div>

        <h2>Services offered</h2>
        <ul class="links">
            <li><strong>Primary Care:</strong> Our team of experienced physicians offers primary care services for patients of all ages, focusing on preventive care, health maintenance, and managing chronic conditions.</li>
            <li><strong>Specialized Care:</strong> We provide specialized care in areas such as women's health, men's health, geriatrics, and pediatric care, ensuring that every patient receives personalized attention and treatment.</li>
            <li><strong>Telemedicine Services:</strong> For added convenience, we offer telemedicine consultations, allowing patients to access quality healthcare from the comfort of their homes.</li>
        </ul>

        <div class="section-divider"></div>

        <div class="links">
            <h2>Additional Resources</h2>
            <a href="articles/addiction101.php">Understanding Addiction: A 101 Guide</a>
            <a href="articles/recoveryjourney.php">Personal Recovery Journey Stories</a>
            <a href="blogs/blog1.php">Blog: Coping Strategies for Cravings</a>
            <a href="blogs/blog2.php">Blog: Overcoming Stigma in Recovery</a>
        </div>

        <div class="section-divider"></div>

        <div class="testimonial">
            <h2>Testimonials</h2>
            <p>"I never thought I could overcome my addiction, but Revise Health provided me with the support and resources I needed to start my journey to recovery. I'm forever grateful."</p>
            <p>"The telemedicine services offered by Revise Health have been a game-changer for me. Being able to consult with a healthcare professional from home has made managing my recovery much easier."</p>
        </div>
    </div>
    
    <script>
        function w3_open() {
          document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
          document.getElementById("mySidebar").style.display = "none";
        }
    </script>
</body>
</html>

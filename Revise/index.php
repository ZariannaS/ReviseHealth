<!DOCTYPE html>
<html>
  <head>
    <title>Revise Health</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.7/lottie.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

    body, html {
      height: 100%;
      line-height: 1.8;
    }

    /* Full height image header */
    .bgimg-1 {
      background-position: center;
      background-size: cover;
      background-color:white ;
      min-height: 100%;
    }

    .recovery {
    position: absolute; /* Set image position to absolute */
    bottom: 0; /* Align image to the bottom */
    right: 0; /* Align image to the right */
    margin-bottom: 20px; /* Optional: Add some margin for spacing */
    margin-right: 20px; /* Optional: Add some margin for spacing */
    }

    .w3-bar .w3-button {
      padding: 16px;
    }

    /* Thick line under each section */
    .section-divider {
      border-bottom: 6px solid #4169E1;
      margin-bottom: 20px;
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
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">TEAM</a>
  <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">WORK</a>
  <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button">PRICING</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-white w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-blue" style="padding:48px">
    <span class="w3-jumbo w3-hide-small">"Empowering Recovery, Redefining Lives: Your Path to Sobriety Starts Here"</span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium">Start something that matters</span><br>
    <span class="w3-large">Put your health first.</span>
    <p><a href="#about" class="w3-button w3-blue w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Learn more and start today</a></p>
  </div> 
  <!-- Lottie animation container -->
  <div id="lottie-recovery" class="recovery"></div>
</header>

<!-- JavaScript to load Lottie animation -->
<script>
  var animation = bodymovin.loadAnimation({
    container: document.getElementById('lottie-recovery'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'img/Animation - 1715054754937.json' // path to your Lottie animation JSON file
  });
</script>

<!-- Thick line under section -->
<hr class="section-divider">

<!-- Promo Section - "We know design" -->
<div class="w3-container w3-white" style="padding:128px 16px">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>Therapy and Counseling Services</h3>
      <p>Our Therapy and Counseling Services section is dedicated to connecting individuals in recovery with licensed therapists, counselors, and addiction specialists who provide virtual counseling services tailored to their specific needs. These professionals offer a compassionate and understanding approach to support clients through every stage of the recovery journey. Whether you're seeking individual counseling, group therapy, or specialized addiction treatment, our network of qualified professionals is here to provide personalized support and guidance. With convenient virtual sessions, you can access high-quality care from the comfort and privacy of your own home, making it easier than ever to prioritize your mental health and well-being on the road to lasting recovery.</p>

      <h3>Online Support</h3>
      <p>Our Online Support Groups section offers a curated selection of reputable online support groups and forums designed to foster connection, share experiences, and provide mutual support for individuals in recovery. These platforms provide a safe and supportive environment where you can connect with others who understand your journey, offering encouragement, empathy, and solidarity along the way. Whether you're looking for a virtual space to share your story, seek advice, or simply find comfort in knowing you're not alone, these online communities are here to support you. Explore the links below to join a diverse network of individuals committed to supporting each other in overcoming addiction and embracing a life of sobriety.</p>
      <p><a href="getResources.php" class="w3-button w3-blue"><i class="fa fa-th"> </i> Resources</a></p>
    </div>
    <!-- Lottie animation column -->
    <div class="w3-col m6">
      <div id="lottie-animation" style="width: 100%; height: auto;"></div>
    </div>
  </div>
</div>

<script>
  // Load Lottie animation
  var animation = bodymovin.loadAnimation({
    container: document.getElementById('lottie-animation'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'img/Animation - 1714671918081.json' // path to your Lottie animation JSON file
  });
</script>

<!-- Thick line under section -->
<hr class="section-divider">

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px; background-color: white; color: black;" id="about">
  <h3 class="w3-center">ABOUT REVISE HEALTH</h3>
  <p class="w3-center w3-large">Key features of our company</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-third">
      <div id="lottie-responsive"></div>
      <p class="w3-large">Responsive</p>
      <p>The website is designed to adapt seamlessly to different screen sizes and devices, ensuring an optimal viewing experience for users on desktops, laptops, tablets, and smartphones. This responsiveness enables easy navigation and access to information regardless of the device being used.</p>
    </div>
    <div class="w3-third">
      <div id="lottie-passion"></div>
      <p class="w3-large">Passion</p>
      <p>REVISE HEALTH is driven by a deep commitment to empowering recovery and redefining lives. With a passionate team dedicated to supporting individuals on their journey to sobriety, the website provides resources, counseling services, and online support groups to foster connection, understanding, and encouragement.</p>
    </div>
    <div class="w3-third">
      <div id="lottie-support"></div>
      <p class="w3-large">Support</p>
      <p>At REVISE HEALTH, support is at the heart of everything we do. From licensed therapists and counselors offering personalized virtual counseling sessions to curated online support groups and forums, the website provides a nurturing environment where individuals in recovery can find the guidance, empathy, and solidarity they need to navigate their challenges and embrace a life of sobriety.</p>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.7/lottie.min.js"></script>
<script>
  var animationResponsive = bodymovin.loadAnimation({
    container: document.getElementById('lottie-responsive'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'img/Animation - 1715050889612.json' // replace 'path/to/your/lottie/file' with the actual path to your animation JSON file for responsive
  });

  var animationPassion = bodymovin.loadAnimation({
    container: document.getElementById('lottie-passion'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'img/Animation - 1715050287634.json' // replace 'path/to/your/lottie/file' with the actual path to your animation JSON file for passion
  });

  var animationSupport = bodymovin.loadAnimation({
    container: document.getElementById('lottie-support'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'img/Animation - 1715050429492.json' // replace 'path/to/your/lottie/file' with the actual path to your animation JSON file for support
  });
</script>

<!-- Thick line under section -->
<hr class="section-divider">

<!-- Team Section -->
<div class="w3-container" style="padding:128px 16px; background-color: white; color: black;" id="team">
  <h3 class="w3-center">THE TEAM</h3>
  <p class="w3-center w3-large">The ones who run this company</p>
  <div class="w3-row-padding" style="margin-top:64px; display: flex; justify-content: space-around;">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card" style="width: 90%;">
        <img src="img/pravesh.jpg" alt="Ahmad Pravesh" style="width:100%">
        <div class="w3-container">
          <h3>Ahmad Pravesh</h3>
          <p class="w3-opacity">Therapist</p>
          <p>Ahmad is a licensed therapist specializing in addiction recovery. He is compassionate, empathetic, and dedicated to helping individuals overcome their challenges. Ahmad conducts virtual counseling sessions with clients, providing personalized support and guidance tailored to their specific needs. He also contributes to the development of therapy programs and resources offered on the website.</p>
          <p><button class="w3-button w3-light-blue w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card" style="width: 90%;">
        <img src="img/hill.jpg" alt="Samantha Hill" style="width:100%">
        <div class="w3-container">
          <h3>Samantha Hill</h3>
          <p class="w3-opacity">Admin</p>
          <p>Samantha is an administrative staff member responsible for managing appointments, payments, and patient records on the rehab website. She ensures smooth operation by scheduling appointments, processing payments, and updating patient information accurately. Samantha is detail-oriented, organized, and efficient in her tasks, helping to streamline administrative processes for the team.</p>
          <p><button class="w3-button w3-light-blue w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card" style="width: 90%;">
        <img src="img/stone.jpg" alt="Amy Stone" style="width:100%">
        <div class="w3-container">
          <h3>Amy Stone</h3>
          <p class="w3-opacity">Web Developer</p>
          <p>Amy is a web developer tasked with maintaining and updating the rehab website. She is proficient in HTML, CSS, and JavaScript, continuously optimizing the website's performance and user experience. Amy collaborates with the design team to implement new features, fix bugs, and ensure the website remains secure and responsive across all devices.</p>
          <p><button class="w3-button w3-light-blue w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card" style="width: 90%;">
        <img src="img/tyler.jpg" alt="Dan Tyler" style="width:100%">
        <div class="w3-container">
          <h3>Dan Tyler</h3>
          <p class="w3-opacity">Support Specialist</p>
          <p>Dan is a support specialist who provides assistance to individuals accessing the website's virtual tour and live chat features. He is patient, knowledgeable, and skilled in communication, offering guidance and troubleshooting solutions to users experiencing technical difficulties. Dan also moderates online support groups, fostering a safe and supportive environment for community members.</p>
          <p><button class="w3-button w3-block w3-light-blue"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

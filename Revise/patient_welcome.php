<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revise Health</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.7/lottie.min.js"></script>
    <style>
        body {
            font-family: 'Raleway', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            margin-top: 50px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 36px;
            font-weight: bold;
            margin: 0;
            color: #333;
        }
        .links {
            margin-top: 20px;
        }
        .search-bar {
            margin-left: 20px;
        }
        .search-bar input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
            box-sizing: border-box;
        }
        .overlay {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.9);
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .overlay-content {
            position: relative;
            text-align: center;
            margin-top: 25%;
        }

        .overlay a {
            padding: 8px;
            text-decoration: none;
            font-size: 24px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .overlay a:hover, .overlay a:focus {
            color: #f1f1f1;
        }

        .overlay .closebtn {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 36px;
            cursor: pointer;
            color: white;
        }

        @media screen and (max-height: 450px) {
            .overlay a {font-size: 20px}
            .overlay .closebtn {
            font-size: 30px;
            top: 15px;
            right: 35px;
            }
        }
        .welcome-text {
            color: white;
            text-align: center;
            font-size: 18px;
            padding: 20px;
            background-color: skyblue;
            border-radius: 10px;
            margin-top: 20px;
        }
        #lottie-animation {
            margin-top: 20px;
            width: 100%;
            max-width: 600px;
            margin-right: auto;
            margin-left: auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Revise Health Patient Portal</h1>
        <div class="links">
            <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
            <div class="search-bar">
                <input type="text" placeholder="Search">
            </div>
        </div>
    </div>

    <!-- Welcome text -->
    <div class="welcome-text">
        <p>Welcome to your Revise Health Patient Portal! Here you can access your records regarding your profile and treatment plan. To view or update records, navigate to the menu option.</p>
    </div>

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <a href="viewpatientprofile.php">View Profile</a>
            <a href="patient_update.php">Update Profile</a>
            <a href="patient_appointment.php">View Appointment</a>
            <a href="patient_treatment.php">View Treatment Plan</a>

        </div>
    </div>

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

    <!-- Lottie animation -->
    <div id="lottie-animation"></div>

    <script>
        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }

        // Load Lottie animation
        var animation = bodymovin.loadAnimation({
            container: document.getElementById('lottie-animation'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'img/Animation - 1715080103905.json' // path to your Lottie animation JSON file
        });
    </script>
</body>
</html>

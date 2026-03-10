<?php
// Start the session at the beginning of the script
session_start();

// Include the file containing database connection
include("connect.php");

// Check if the database connection is established successfully
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Name = $_POST['Name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];


    if (!empty($Name) && !empty($email) && !empty($subject) && !empty($msg) && !is_numeric($email)) {
        // Use prepared statements to prevent SQL injection
        $query = "INSERT INTO contact (Name, email, subject, msg) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        
        // Check if the prepared statement was created successfully
        if (!$stmt) {
            die("Error in prepared statement: " . mysqli_error($conn));
        }
        
        // Bind parameters to the prepared statement
        $success = mysqli_stmt_bind_param($stmt, "ssss", $Name, $email, $subject, $msg);
        
        // Check if binding parameters was successful
        if (!$success) {
            die("Error in binding parameters: " . mysqli_stmt_error($stmt));
        }

        // Execute the prepared statement
        $success = mysqli_stmt_execute($stmt);
        
        // Check if execution was successful
        if (!$success) {
            die("Error in execution: " . mysqli_stmt_error($stmt));
        }

        // Redirect to index.html after successful data insertion
        header("Location: contact.html");
        exit; // Make sure to exit after redirecting
    } else {
        echo "<script type='text/javascript'> alert('Please enter valid information')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rakta Seva Sagar</title>

    <!---- CSS Linkage ------>
    <link rel="stylesheet" href="style.css">

    <!---- Font Awesome Cdn Linkage ------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!------- Favicon Linkage --------->
    <link rel="shortcut icon" href="fav2.png" type="x-icon">
</head>

<body>

    <!------- Pre Loader --------->
    <div class="preloader">
        <div class="load"></div>
        <div class="load"></div>
        <div class="load"></div>
        <div class="load"></div>
        <div class="load"></div>
    </div>
    <!------- Pre Loader End --------->

    <!------------- Pop-up ------------->
    <div class="popup">
        <div class="pop-container">
            <div class="popup-box">
                <div class="close">
                    <img src="close.png" alt="pic">
                </div>
                <div class="pop-img">
                    <img src="pop.png" alt="pic">
                </div>
                <div class="pop-content">
                    <div>
                        <h3>Become a Donar</h3>
                        <h2>We <span>Care</span></h2>
                        <p>Hello us save lives become a donor now by filling this form</p>
                        <a href="form.html" target="_blank">Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------- Pop-up End ------------->


    <!------------ Scroll-top button -------------->
    <div class="scroll-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <!------------ Scroll-top button End -------------->


    <!---- Navigation ------>
    <header>
        <div class="tbox" id="tbox">
            <div id="toogle"></div>
        </div>
        <nav class="navigation">
            <div class="logo">
                <img src="logo2.png" alt="logo">
            </div>
            <div class="nav-list" id="nav-list">
                <ul>
                    <li><a class="list" href="#home">Home</a></li>
                    <li><a class="list" href="#about">About</a></li>
                    <li><a class="list" href="#services">Services</a></li>
                    <li><a class="list" href="#gallery">Gallery</a></li>
                    <li><a class="list" href="#contact">Contact</a></li>
                    <li><a class="list" href="#team">Team</a></li>
                    <li><a class="list" href="Login And Registration HTML.html">Logout</a></li>

                    
                </ul>
            </div>
        </nav>
    </header>
    <!---- Navigation End ------>

    <!---- Home Section ------>
    <section class="home" id="home">
        <div class="intro">
            <h1>You are someone's Hero - donate Blood</h1>
            <p>Where giving becomes a lifeline. 
                Join us in the noble journey of blood donation, where a single act can save lives.
                 Be a hero today. Welcome to the heart of compassion."</p>
            <span><a href="#contact">Contact Us</a></span>
            <span><a href="form.php">Donate Now</a></span>
        </div>
        <div class="home-img">
            <img src="img1.webp" alt="">
        </div>
    </section>
    <!---- Home Section End ------>

    <hr id="about">

    <!---- About Section ------>
    <section class="about">
        <h1 class="heading">About Us</h1>
        <div class="about-container">
            <div class="img">
                <img src="donation.jpg" alt="">
            </div>
            <div class="text">
                <p>Have you at anytime witnessed a relative of yours or a close friend searching  for a blood donor, when blood banks say out of stock, the donors in mind are out of reach and the time keep sticking? Have you witnessed loss of life for the only reason that a donor was not available at the most needed hour? Is it something that we as a society can do nothing to prevent? This thought laid our foundation.</p>
                <p>"Rakta Seva Sagar" is an organization that brings voluntary blood donors and those in need of blood on
                    to a common platform. Through this website, we seek donors who are willing to donate blood, as well as provide the timeliest support to those in frantic need of it.</p>
            </div>
        </div>
    </section>
    <!---- About Section End ------>

    <hr id="services">

    <!---- Services Section ------>
    <section class="services">
        <h2 class="heading">Our Services</h2>
        <div class="service-container">
            <div class="box">
                <i class="fas fa-bone"></i>
                <h3>What we do</h3>
                <p>Rakta Seva Sagar connect blood donors with recipients, without any intermediary such as blood banks, for an
                    efficient and seamless process.</p>
            </div>
            <div class="box">
                <i class="fas fa-user-graduate"></i>
                <h3>Innovative</h3>
                <p> Rakta Seva Sagar is an innovative approach to address global health. We provide immediate access to
                    blood donors.
                </p>
            </div>
            <div class="box">
                <i class="fas fa-child"></i>
                <h3>Network</h3>
                <p>Rakta Seva Sagar is one of several community organizations working together as a network that responds to emergencies in an efficient manner.</p>
            </div>
            <div class="box">
                <i class="fas fa-hand-holding-usd"></i>
                <h3>Get notified</h3>
                <p>Rakta Seva Sagar works with network partners to connect blood donors and recipients through an
                    automated SMS service and a mobile app.</p>
            </div>
            <div class="box">
                <i class="fas fa-hands-helping"></i>
                <h3>Totally Free</h3>
                <p>Rakta Seva Sagar's ultimate goal is to provide an easy-to-use, easy-to-access, fast, efficient, and
                    reliable way to get life-saving blood, totally Free of cost.</p>
            </div>
            <div class="box">
                <i class="fas fa-people-carry"></i>
                <h3>Save Life</h3>
                <p>We are a non profit foundation and our main objective is to make sure that everything is done to protect vulnerable persons. Help us by making a gift !</p>
            </div>
            <div class="box">
                <i class="fas fa-hand-holding-water"></i>
                <h3>Alaways Available</h3>
                <p>Rakta Seva Sagar gives you 24x7 Service that too Free Of Cost</p>
            </div>
            <div class="box">
                <i class="fas fa-hand-holding-medical"></i>
                <h3>MEDICAL FACILITIES</h3>
                <p>We provide free of cost medical services to needy people and provide treatment faciliries and
                    rehabilation centers are also there</p>
            </div>
        </div>
    </section>
    <!---- Services Section End ------>

    <hr id="gallery">

    <!---- Gallery Section ------>
    <section class="gallary-img">
        <h1 class="heading">Our Gallery</h1>
        <div class="gbox">
            <div class="gallery">
                <img src="B1.jpg" alt="Cinque Terre">
                <div class="desc">Educating needy children</div>
            </div>

            <div class="gallery">
                <img src="B2.webp" alt="Forest">
                <div class="desc">Providing food to needy peoples</div>
            </div>

            <div class="gallery">
                <img src="B3.jpeg" alt="Northern Lights">
                <div class="desc">Donation for growth</div>
            </div>

            <div class="gallery">
                <img src="c4.jpg" alt="Mountains">
                <div class="desc">Blood Donation Campaign</div>
            </div>
            <div class="gallery">
                <img src="B4.jpg" alt="Mountains">
                <div class="desc">Our team in Telangana helping children</div>
            </div>
            <div class="gallery">
                <img src="B5.jpg" alt="Mountains">
                <div class="desc">Our team IN INDIA children</div>
            </div>
            <div class="gallery">
                <img src="c7.jpg" alt="Mountains">
                <div class="desc">Proving medication to homeless</div>
            </div>
            <div class="gallery">
                <img src="c8.jpg" alt="Mountains">
                <div class="desc">Helping homeless</div>
            </div>
            <div class="gallery">
                <img src="c9.jpg" alt="Mountains">
                <div class="desc">Always available for your help</div>
            </div>
        </div>
    </section>
    <!---- Gallery Section End ------>

    <hr id="contact">

    <!---- Contact Us Section ------>
    <section class="contact">
        <h1>Contact Us</h1>
        <form action="" method="POST" autocomplete="off">
            <div class="input-wrap">
                <input type="text" name="Name" placeholder="Your Name (*)" >
                <input type="email" name="email" placeholder="Your Email (*)">
            </div>
            <div class="input-wrap-2">
                <input type="text" name="subject" placeholder="Your Subject....">
                <input type="text" name="msg" placeholder="Your Message....">
                
            </div>
            <div class="btn">
                <button type="submit">Send Message</button>
            </div>
        </form>
    </section>
    <!---- Contact Us Section End ------>

    <hr id="team">

    <!---- Teams Section ------>
    <section class="section-team">
        <h1 class="heading">Our Team</h1>
        <div class="container">
            <div class="card">
                <div class="imgbox">
                    <img src="image1web.jpg" alt="image">
                </div>
                <div class="content">
                    <div class="details">
                        <h2>VENUGOPAL</h2>
                       
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="imgbox">
                    <img src="image2web.jpeg" alt="image">
                </div>
                <div class="content">
                    <div class="details">
                        <h2>AMARSAINATH</h2>
                        
                        
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="imgbox">
                    <img src="webdev.jpg" alt="image">
                </div>
                <div class="content">
                    <div class="details">
                        <h2>JAY</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---- Teams Section End ------>



    <!------------- Footer ------------->
    <footer>
        <div class="footer-content">
            <h1 class="heading">Rakta Seva Sagar</h1>
            <p>We are ready to help you anytime because <b>We Care ..</b> </p>
            <ul class="solink">
                <li><a href="#" target="blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" target="blank"><i class="fab fa-github"></i></a></li>
                <li><a href="#" target="blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#" target="blank"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy; 2024 Rakta Seva Sagar. Designed by <span>Group of 3</span></p>
        </div>
    </footer>
    <!------------- Footer End ------------->


    <!---- Javascript Linkage ------>
    <script src="app.js"></script>
    
    
    
</body>

</html>
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
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $DOB = $_POST['DOB'];
    $bgroup = $_POST['bgroup'];
    $Lastdate = $_POST['Lastdate'];
    $phno = $_POST['phno'];
    $stadd = $_POST['stadd'];
    $city = $_POST['city'];
    $state = $_POST['state'];


    if (!empty($firstname) && !empty($lastname) && !empty($DOB) && !empty($bgroup) && !empty($Lastdate) && !empty($phno) && !empty($stadd) && !empty($city) && !empty($state) && !is_numeric($stadd)) {
        // Use prepared statements to prevent SQL injection 
        $query = "INSERT INTO form (firstname, lastname, DOB, bgroup, Lastdate, phno, stadd, city, state) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = mysqli_prepare($conn, $query);
        
        // Check if the prepared statement was created successfully
        if (!$stmt) {
            die("Error in prepared statement: " . mysqli_error($conn));
        }
        
        // Bind parameters to the prepared statement
        $success = mysqli_stmt_bind_param($stmt, "sssssssss", $firstname, $lastname, $DOB, $bgroup, $Lastdate, $phno, $stadd, $city, $state);
        
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
        header("Location: conform.html");
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
    <meta firstname="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Website </title>
    <!---- CSS Linkage ------>
    <link rel="stylesheet" href="style.css">

    <!---- Font Awesome Cdn Linkage ------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!------- Favicon Linkage --------->
    <link rel="shortcut icon" href="fav2.png" type="x-icon">
</head>
<style>
    .home-link{
        position: absolute;
        top: 10px;
        left: 120px;
        width: 60px;
        height: 60px;
        background-color: #eeeeef;
        border-radius: 50%;
    }
    
    .home-link a{
        align-items: center;
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .home-link a img{
        line-height: 50px;
        width: 70%;
        height: 70%;
    }
</style>
<body>
    <div class="home-link">
        <a href="index.html">
            <img src="home 2.png" alt="pic">
        </a>
    </div>
    <div class="img-folder">
        <img src="IMG2.jpg" alt="">
    </div>

    <!------- Form Start --------->
    <h1 class="heading">Blood Donation Form</h1>
    <div class="form-wrapper">
        <form action="" method="POST" autocomplete="off">
            <div class="form-wrapper1">
                <input type="text" name="firstname" placeholder="firstname" required>
                <input type="text" name="lastname" placeholder=" lastname" required>
            </div>

            <br>

            <div class="form-wrapper2">
                <label for="DOB">Date of birth</label> <br>
                <input type="date" name="DOB" id="DOB" required>
            </div>

            <br>

            <div class="form-wrapper2">
                <label for="group"> Your Blood Group: <br> <br>
                    <select id="group" name="bgroup" required>
                        <option>Select</option>
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>O+</option>
                        <option>O-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                    </select>
                </label>
            </div>

            <br>

            <div class="form-wrapper2">
                <label for="Last">Last Donated Date</label> <br>
                <input type="date" name="Lastdate" id="Last" required>
            </div>

            <br>

            <div class="form-wrapper2">
                <label for="Last">Phone Number </label> <br>
                <input type="tel" name="phno" placeholder="(+91) Number" required>
            </div>

            <br>

            <div class="form-wrapper2">
                <label for="st_add">Address:- <br></label>
                <input type="text" name="stadd" id="Address" placeholder="Street Address" required>
            </div>

            <div class="form-wrapper1">
                <input type="text" name="city" placeholder="City(*)" required>
                <input type="text" name="state" placeholder="State(*)" required>
            </div>

            <br>

            <div class="btn">
                <button type="submit" ><a href="conform.html">Submit</a></button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
    <!------- Form End --------->

    <!------------- Footer ------------->
    <footer>
        <div class="footer-content">
            <h1 class="heading">Rakta Seva Sagar</h1>
            <p>We are ready to help you anytime </p>
            </div>
        <div class="footer-bottom">
            <p>Copyright &copy; 202 Rakta Seva Sagar. Designed by <span>Group 3</span></p>
        </div>
    </footer>
    <!------------- Footer End ------------->

</body>

</html>
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
    $EMAIL = $_POST['EMAIL'];
    $PASSWORD = $_POST['PASSWORD'];

    if (!empty($EMAIL) && !empty($PASSWORD)) {
        // Use prepared statements to prevent SQL injection
        $query = "SELECT * FROM signup WHERE EMAIL = ? AND PASSWORD = ?";
        $stmt = mysqli_prepare($conn, $query);
        
        // Check if the prepared statement was created successfully
        if (!$stmt) {
            die("Error in prepared statement: " . mysqli_error($conn));
        }
        
        // Bind parameters to the prepared statement
        $success = mysqli_stmt_bind_param($stmt, "ss", $EMAIL, $PASSWORD);
        
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

        // Check if a row was returned
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
            // Authentication successful, set session variable and redirect
            $_SESSION['EMAIL'] = $EMAIL;
            // Insert login details into signin table
            $insert_query = "INSERT INTO signin (EMAIL,PASSWORD) VALUES (?, ?)";
            $insert_stmt = mysqli_prepare($conn, $insert_query);
            
            if (!$insert_stmt) {
                die("Error in prepared statement for inserting login details: " . mysqli_error($conn));
            }

            // Bind parameters to the prepared statement
            $success = mysqli_stmt_bind_param($insert_stmt, "ss", $EMAIL, $PASSWORD);
            
            if (!$success) {
                die("Error in binding parameters for inserting login details: " . mysqli_stmt_error($insert_stmt));
            }

            // Execute the prepared statement to insert login details
            $success = mysqli_stmt_execute($insert_stmt);
            
            if (!$success) {
                die("Error in execution: " . mysqli_stmt_error($insert_stmt));
            }

            // Close the statement
            mysqli_stmt_close($insert_stmt);

            // Redirect to index page
            header("Location: index.php");
            exit; // Make sure to exit after redirecting
        } else {
            echo "<script type='text/javascript'> alert('Invalid email or password')</script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Please enter valid information')</script>";
    }
}
?>






<!DOCTYPE html>

<!--This is a login page made up with HTML,CSS and javascript-->

<html>

    <head>

        <title>
            
            Rakta Seva Sagar Login Page
        
        </title>

        <link type="text/css" rel="stylesheet" href="Login And Registration CSS.css">

        <script src="https://kit.fontawesome.com/5471644867.js" crossorigin="anonymous"></script>
        
        <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>
        <link rel="shortcut icon" href="fav2.png" type="x-icon">
    </head>

    <body>

        <section class="imp">

            <section>

            <div class="login show" id="one">

                <div class="textbox slide-left2">

                <div class="head">

                    <h1>
                        
                        Sign In to Rakta Seva Sagar
                    
                    </h1>

                    <ul>

                        <li>
                            
                            <i class="fab fa-facebook-f" style = "cursor: pointer;"></i>
                        
                        </li>

                        <li>
                            
                            <i class="fab fa-google-plus-g" style = "cursor: pointer;"></i>
                        
                        </li>

                        <li>
                            
                            <i class="fab fa-linkedin-in" style = "cursor: pointer;"></i>
                        
                        </li>

                    </ul>

                    <h3 style = "cursor: pointer;">
                        
                        Use your E-mail ID
                    
                    </h3>

                </div>

                <form action="" method="POST" autocomplete="off">

                    <input type="text" name="EMAIL" placeholder="EMAIL"  required>

                    <input type="password" name="PASSWORD" placeholder="PASSWORD" required>

                    

                    <button type="submit" class = 'sign_in_btn'>

                        <a href = 'index.php' style = 'color: white;'>
                        
                            SIGN IN

                        </a>
                    
                    </button>

                </form>



                </div>

            </div>

            <div class="sec show" id="two">

                <div class="textbox slide-left">

                <h1>
                    
                    Not a Donor ?
                
                </h1>

                <p>
                    
                    Sign up and start Donating
                
                </p>

                <button id="b1" style = "cursor: pointer;" class = 'prompt_sign_up'>

                    
                    <a href ='SIGNUP.php' style = 'color: white;'>
                        
                            SIGN UP

                        </a>
                
                </button>

                </div>

            </div>

        
        </section>

        </section>

        
    <script src="Login And Registration JS.js"></script>

    </body>

</html>

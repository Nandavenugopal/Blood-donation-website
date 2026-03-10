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
    $name = $_POST['name'];
    $EMAIL= $_POST['EMAIL'];
    $PASSWORD= $_POST['PASSWORD'];
    $phoneno= $_POST['phoneno'];
    
    if (!empty($name) && !empty($EMAIL) && !empty($PASSWORD) && !empty($phoneno) && !is_numeric($EMAIL)) {
        // Use prepared statements to prevent SQL injection
        $query = "INSERT INTO signup (name, EMAIL, PASSWORD, phoneno) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        
        // Check if the prepared statement was created successfully
        if (!$stmt) {
            die("Error in prepared statement: " . mysqli_error($conn));
        }
        
        // Bind parameters to the prepared statement
        $success = mysqli_stmt_bind_param($stmt, "ssss", $name, $EMAIL, $PASSWORD, $phoneno);
        
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
        header("Location: SIGNUPCONFORM.html");
        exit; // Make sure to exit after redirecting
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
            
            Rakta Seva Sagar Sign Up Page
        
        </title>

        <link type="text/css" rel="stylesheet" href="Login And Registration CSS.css">

        <script src="https://kit.fontawesome.com/5471644867.js" crossorigin="anonymous"></script>
        
        <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>

    </head>

    <body>

        <section class="imp">

            <section>

            <div class="login show" id="one">

                <div class="textbox slide-left2">

                <div class="head">

                    <h1>
                        
                        Sign UP to Rakta Seva Sagar
                    
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
                        
                        ENTER YOUR DETAILS TO CREATE ACCOUNT 
                    
                    </h3>

                </div>

                    <form action="" method="POST" autocomplete="off">

                        <input type="text" name="name" placeholder="NAME" required>

                        <input type="text" name="EMAIL" placeholder="EMAIL" required>

                        <input type="text" name="PASSWORD" placeholder="PASSWORD IN ALPHABET'S" required>

                        <input type="text" name="phoneno" placeholder="PHONE NO." required>

                        <button id="b">
                            
                            <a href="#" style = "cursor: pointer;">
                                
                                                            
                            </a>
                        
                        </button>

                        <button type="submit" class = 'sign_in_btn'>

                            <a href = 'SIGNUPCONFORM.HTML' style = 'color: white;'>
                            
                                SIGN UP

                            </a>
                        
                        </button>

                    </form>

                </div>

            </div>

            <div class="sec show" id="two">

                <div class="textbox slide-left">

                <h1>
                    
                    Already a member?
                
                </h1>

                <p>
                    
                    Sign in  and start shopping.
                
                </p>

                <button id="b1" style = "cursor: pointer;" class = 'prompt_sign_up'>
                    <a href = 'login1.PHP' style = 'color: white;'>
                    SIGN IN
                    </a>
                </button>

                </div>

            </div>

        

        </section>

        </section>

        
    <script src="Login And Registration JS.js"></script>

    </body>

</html>

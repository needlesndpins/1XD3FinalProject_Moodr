<?php 
/**
 * Author: Team 18, CSS Ninjas
 * Created: March, 2025
 * Submitted: April 26th, 2025
 * Description: php file for 1XD3, Final Delivery.
 * This is the login page
 */

session_start();

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css">
    <script src = "../js/login.js"></script>
</head>

<body>
    <div id="header">
         <p id="moodr">M o o d r</p>
    </div>
   

    <div id="container">



        <div id="content"> 
            
            <div id = "login"> 
                <h1>Enter Login</h1>
                <form id = "loginform" action = "loginhandler.php" method = "POST">
                    <input id="username" type = "text" name = "user" placeholder = "Username" required maxlength = "20"> 
                    <input id="password" type = "password" name = "password" placeholder = "Password" required minlength = "8">
                <input type = "submit">

                <?php   
                    if(isset($_SESSION["loginFail"])){ // Invalid login
                        echo "<p class = 'warning'>INVALID LOGIN</p>";
                        $_SESSION["loginFail"] = null;  //Clear session variable
                        
                    }elseif(isset($_SESSION["newUser"])){ // Created account
                        echo "<p class = 'create'>ACCOUNT CREATED SUCCESSFULLY</p>";
                        $_SESSION["newUser"] = null; //Clear session variable
                    }
                    elseif(isset($_SESSION["inactive"])){ // Account banned
                        echo "<p class = 'warning'>THIS ACCOUNT IS BANNED</p>";
                        $_SESSION["inactive"] = null; //Clear session variable
                    }

                    // Used for adminHandler check 
                    $badLogin = filter_input(INPUT_GET,"status",FILTER_VALIDATE_INT);
                    if($badLogin !== null && $badLogin !== false){ 
                        if($badLogin === 1){  // status = 1 means adminHandler failed
                            echo "<p class = 'warning'>SESSION EXPIRED, PLEASE LOGIN AGAIN</p>";
                        }
                    }
                    ?>
                    
                    <a href="newAccount.php">Create new account</a>
                    <a href = "index.php">Dashboard</a>
                </form>
                
            </div>

        </div>

        <!-- <div id="footer"> TODO </div> -->

        
    </div>
</body>

</html>
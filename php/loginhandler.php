<?php 

    /** 
     * Password verification 
     * Checks if user exists in database, and if they do 
     * checks if the password matches
     */
    session_start();
    include "connect.php";
    $username = filter_input(INPUT_POST,"user",FILTER_SANITIZE_SPECIAL_CHARS); 
    $password = filter_input(INPUT_POST,"password");


    if($username !== null && $password !== null && $username !==false){ 

        /** 
         * Prepare SELECT command to see if they exist
         */
        $cmd = "SELECT username,password,role,bio FROM users WHERE username = ?";
        $stmt = $dbh->prepare($cmd);
        $success = $stmt->execute([$username]);

        //Check if user found
        if($row = $stmt->fetch()){ 

            if(password_verify($password,$row["password"])){ 
                //Access granted
                //Set SESSION variables
                $_SESSION["username"] = $row["username"];
                $_SESSION["role"] = $row["role"];
                $_SESSION["bio"] = $row["bio"];
                header('Location: index.php');
                exit;

            }else {
                //Set session as failed login
                $_SESSION["loginFail"] = true;
                //Sends you back to login
                header('Location: login.php');
                exit;

            }
        }else {//User does not exist 

            //Set session as failed login
            $_SESSION["loginFail"] = true;
            //Sends you back to login
            header('Location: login.php');
        
        }

    }
?>

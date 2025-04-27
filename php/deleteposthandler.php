<?php
/**
 * Author: Team 18, CSS Ninjas
 * Created: March, 2025
 * Submitted: April 26th, 2025
 * Description: php file for 1XD3, Final Delivery.
 * Delete Post Processing, checks if user is admin then allows them to delete posts
 */


session_start();
include "connect.php";

$loggedIn = false;
// Checks if there is an Active Session
if (isset($_SESSION["username"])) {
    $loggedIn = true;
}


if ($loggedIn) {
    if ($_SESSION["role"] === "admin") {
        $postId = filter_input(INPUT_POST, "postId", FILTER_VALIDATE_INT);

        if($postId !== null && $postId !== false){ 

            $cmd = "DELETE FROM announcements WHERE postId=?";
            $stmt = $dbh->prepare($cmd);
            $success = $stmt->execute([$postId]);
            if($success){ 
                echo (1);
            }else{ 
                echo(-1);
            }
        }
    }
} else {
    session_destroy();
    header('Location: login.php'); // redirects logged out session to the login page.
    exit();
}

<?php
/**
 * Author: Team 18, CSS Ninjas
 * Created: March, 2025
 * Submitted: April 26th, 2025
 * Description: php file for 1XD3, Final Delivery.
 * Resets all admins except main Admin, receives request from Administration
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

        $cmd = "UPDATE `users` SET `role`=? WHERE `username` != 'Admin'";
        $stmt = $dbh->prepare($cmd);
        $success = $stmt->execute(["user"]);
        if (!$success) {
            echo (-1);
            exit();
        }
        else {
            echo 1;
        }
    }
} else {
    session_destroy();
    header('Location: login.php'); // redirects logged out session to the login page.
    exit();
}

<?php
/**
 * Author: Team 18, CSS Ninjas
 * Created: March, 2025
 * Submitted: April 26th, 2025
 * Description: php file for 1XD3, Final Delivery.
 * Makes user admin, receives request from Administration page
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
        $user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_SPECIAL_CHARS);

        if ($user===null || $user === "") {
            echo "Error: Invalid user.";
            exit();
        }

        $cmd = "SELECT `role` FROM users WHERE username=?";
        $stmt = $dbh->prepare($cmd);
        $success = $stmt->execute([$user]);
        $row = $stmt->fetch();

        if (!$success || $row["role"] === "admin") {
            echo (-1);
            exit();
        }

        if($row["role"]==="user"){
            $cmd = "UPDATE `users` SET `role`=? WHERE `username`=?";
            $stmt = $dbh->prepare($cmd);
            $success = $stmt->execute(["admin",$user]);
            if (!$success) {
                echo "Error: Failed to change role.";
                exit();
            }
            else {
                echo "$user";
            }
        }
    }
} else {
    session_destroy();
    header('Location: login.php'); // redirects logged out session to the login page.
    exit();
}

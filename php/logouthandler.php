<?php
/**
 * Author: Team 18, CSS Ninjas
 * Created: March, 2025
 * Submitted: April 26th, 2025
 * Description: php file for 1XD3, Final Delivery.
 * If the user/admin wants to log out, they are directed to
 * this page which will clear their session variables.
 */

session_start();
session_destroy();  // Destroy the session
header('Location: login.php');
<?php
/**
 * Author: Team 18, CSS Ninjas
 * Created: March, 2025
 * Submitted: April 26th, 2025
 * Description: php file for 1XD3, Final Delivery.
 * Returns the users style settings if it exists
 */

session_start();
header('Content-Type:application/json');

if(isset($_SESSION["style"])){ 
    echo json_encode($_SESSION["style"]);
}else{  // Nothing is set, meaning they aren't logged in
    echo json_encode(-1);
}
    
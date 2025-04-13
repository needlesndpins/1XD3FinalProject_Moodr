<?php 

$primary = filter_input(INPUT_GET, "primary");

$secondary = filter_input(INPUT_GET, "secondary");

$textbox = filter_input(INPUT_GET,"textbox");

$text = filter_input(INPUT_GET, "text");


/** 
 * Takes an input, and returns true if it is a hexadecimal
 * string 6 characters in length
 */
function validateHex($inp) {
    return preg_match('/^[0-9A-Fa-f]{6}$/', $inp);
}
$paramsok = $primary !== null && $pimary !== false && $secondary !== null &&$secondary !== false 
            && $text!== null && $text!==false && validateHex($primary) && validateHex($secondary) 
            && validateHex($text);


if($paramsok){ 
    //CHECK IF STYLE EXISTS

    include "connect.php";

    $cmd = "SELECT * FROM styles WHERE primary_colour = ? AND secondary_colour = ? AND textbox_colour = ?
            AND text_colour = ?";
    $stmt = $dbh->prepare($cmd);
    $succ = $stmt->execute([$primary,$secondary,$textbox,$text]);

    if($row = $stmt->fetch()){
        //Style already exists 
        echo (-1);
        exit;

    }else{ 

        $cmd = "INSERT INTO styles (primary_colour,secondary_colour,textbox_colour,text_colour) VALUES (?,?,?,?)";
        $stmt = $dbh->prepare($cmd);
        $suc = $stmt->execute([$primary,$secondary,$textbox,$text]);

        if($suc){ 
            echo (1);
        }

    }
}else{
    echo(-1);
}



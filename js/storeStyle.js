/**
 * Author: Team 18, CSS Ninjas
 * Created: March, 2025
 * Submitted: April 26th, 2025
 * Description: js file for 1XD3, Final Delivery.
 * Handles AJAX requests to storing custom style inside styles table
 * Calls storeStyle.php
 */


window.addEventListener("load",function(event){ 

    let button = document.getElementById("confirmStyle");
    let primary = document.getElementById("primary");
    let secondary = document.getElementById("secondary");
    let textbox =  document.getElementById("textbox");
    let text = document.getElementById("text");



    button.addEventListener("click",function(event){ 


        let url = "../php/storeStyle.php?primary="+primary.value.substring(1) + 
        "&secondary="+secondary.value.substring(1)+"&text="+text.value.substring(1) 
        + "&textbox=" + textbox.value.substring(1); //Removes the #


        fetch(url)
        .then(response=>response.text())
        .then(success);

    });

    function success(text){ 

        let res = document.getElementById("styleResult");
        if(text != -1){ 
            // Inserted correctly 
            res.innerHTML = "STYLE STORED SUCCESSFULLY";
        }else{
            // Wasn't able to insert
            res.innerHTML = "STYLE ALREADY EXISTS";
        }
    }

});
/**
 * Author: Team 18, CSS Ninjas
 * Created: March, 2025
 * Submitted: April 26th, 2025
 * Description: js file for 1XD3, Final Delivery.
 * Clears login form after being submit
 */

window.addEventListener("load",function(event){ 
    let myForm = document.getElementById("loginform");


    myForm.addEventListener("submit",function(event){ 

        /** 
         * Clear form after 5s, ensures
         * you can't hit back arrow and have 
         * information saved
         */
        setTimeout(function(){ 
            myForm.reset();
        },5000);
    });
    
});
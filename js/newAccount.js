/**
 * Author: Team 18, CSS Ninjas
 * Created: March, 2025
 * Submitted: April 26th, 2025
 * Description: js file for 1XD3, Final Delivery.
 * Client side verification to create account
 */

window.addEventListener("load",function(event){ 

    let email = document.getElementById("email");
    let confirm = document.getElementById("confirm");
    let myForm = document.getElementById("newAccountForm");
    let password = document.getElementById("password");
    let showPassword = document.getElementById("showPassword");


    myForm.addEventListener("submit",function(event){
        if(password.value.length < 8){
            password.value = "";
            password.placeholder = "MUST BE 8 CHARECTERS OR GREATER";
            password.classList.add("invalid");
            event.preventDefault();
        }
        if(email.value !== confirm.value){
            confirm.value = "";
            confirm.placeholder = "MUST MATCH EMAIL ABOVE";
            confirm.classList.add("invalid");
            event.preventDefault();
        }
    })

    showPassword.addEventListener("input",function(event){
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    })
    
    
});


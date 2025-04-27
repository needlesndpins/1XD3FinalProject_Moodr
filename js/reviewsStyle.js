/**
 * Author: Team 18, CSS Ninjas
 * Created: March, 2025
 * Submitted: April 26th, 2025
 * Description: js file for 1XD3, Final Delivery.
 * Applies custom style to reviews.php
 */

window.addEventListener("load", function (event) {


    fetch("style.php")
        .then(response => response.json())
        .then(success)
        .catch(error => console.error("Fetch error:", error));

    function success(styleArr){
        let body = document.body;
        let content = document.getElementById("content");
        let textbox1 = document.querySelectorAll(".review-content");
        //let textbox2 = document.getElementById("make-post");
        let textbox3 = document.querySelectorAll(".triangle");
        let headers = document.getElementsByTagName("h1");
        let pars = document.getElementsByTagName("p");

        body.style["background-color"] = styleArr["primary"];
        content.style["background-color"] = styleArr["secondary"];
        textbox1.forEach(elm => {
            elm.style["background-color"] = styleArr["textbox"];
        });
        textbox3.forEach(elm => {
            elm.style.borderRight = "20px solid " + styleArr["textbox"];
        });
        //textbox2.style["background-color"] = styleArr["textbox"];
        headers[0].style.color = styleArr["textbox"];
        for(let i = 1; i < headers.length; i++) {
            headers[i].style.color = styleArr["text"];
        }
        for(let i = 1; i < pars.length; i++) {
            pars[i].style.color = styleArr["text"];
        }
    }
});
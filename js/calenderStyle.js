/**
 * Author: Team 18, CSS Ninjas
 * Created: March, 2025
 * Submitted: April 26th, 2025
 * Description: js file for 1XD3, Final Delivery.
 * Applies custom style to calendar page
 */
window.addEventListener("load", function (event) {


    fetch("style.php")
        .then(response => response.json())
        .then(success)
        .catch(error => console.error("Fetch error:", error));

    function success(styleArr){
        let body = document.body;
        let content = document.getElementById("content");
        let textbox1 = document.getElementById("calender");
        let headers = document.getElementsByTagName("h2");

        body.style["background-color"] = styleArr["primary"];
        content.style["background-color"] = styleArr["secondary"];
        textbox1.style["background-color"] = styleArr["textbox"];
        for(let i = 0; i < headers.length; i++) {
            headers[i].style.color = styleArr["text"];
        }
    }
});
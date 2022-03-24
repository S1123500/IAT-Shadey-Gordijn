window.onload = () => {

    // Get current path name
    var path = window.location.pathname;

    // Depending on pathname, run code..
    if (path === "/") {
        console.log("Homepage")

        // getting the variable from database and making it boolean
        var isOutOfHome = document.getElementById('js--outOfHomeCard').dataset.isoutofhome;
        if (isOutOfHome === 'false') {
            isOutOfHome = false;
        } else {
            isOutOfHome = true;
        }

        // // Get js elements from DOM by ID
        const outOfHomeCard = document.getElementById("js--outOfHomeCard");
        const outOfHomeCard_toggleIcon = document.getElementById("js--outOfHomeCard-toggleIcon");

        // this piece of code is for the intial state of the button after reloading the page
        if (isOutOfHome) {
            outOfHomeCard_toggleIcon.innerHTML = "toggle_on"
        } else {
            outOfHomeCard_toggleIcon.innerHTML = "toggle_off"
        }

        // This event listener is for the animation -> href is for the actual change in database
        outOfHomeCard.addEventListener("click", function () {
            // set false to true, or true to false
            // change icon by changing the innerHTML, depending on Out of Home state
            if (isOutOfHome) {
                outOfHomeCard_toggleIcon.innerHTML = "toggle_off"
            } else {
                outOfHomeCard_toggleIcon.innerHTML = "toggle_on"
            }
            window.location.href = "http://127.0.0.1:8000/vacation";
        })
    }
};

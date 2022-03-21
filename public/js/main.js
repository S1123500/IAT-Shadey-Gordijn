window.onload = () => {

    // Get current path name
    var path = window.location.pathname;

    var isOutOfHome = false;
    // Depending on pathname, run code..

    if (path === "/") {
        console.log("Homepage")

        // // Get js elements from DOM by ID
        const outOfHomeCard = document.getElementById("js--outOfHomeCard");
        const outOfHomeCard_toggleIcon = document.getElementById("js--outOfHomeCard-toggleIcon");

        // Set outOfHome state to false

        // Out of Home icon toggle
        outOfHomeCard.addEventListener("click", function () {
            // set false to true, or true to false
            isOutOfHome = !isOutOfHome

            //     // change icon by changing the innerHTML, depending on Out of Home state
            if (isOutOfHome) {
                outOfHomeCard_toggleIcon.innerHTML = "toggle_on"
            } else {
                outOfHomeCard_toggleIcon.innerHTML = "toggle_off"
            }
        })


    }

    if (path === "/curtain/") {
        console.log("Curtain Detailpage")

    }

};

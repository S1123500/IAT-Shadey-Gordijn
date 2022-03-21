window.onload = () => {

    // Get current path name
    var path =  window.location.pathname;

    // Depending on pathname, run code..

    if (path === "/") {
        console.log("Homepage")

        // // Get js elements from DOM by ID
        const outOfHomeCard = document.getElementById("js--outOfHomeCard");
        const outOfHomeCard_toggleIcon = document.getElementById("js--outOfHomeCard-toggleIcon");

        // Set outOfHome state to false
        var isOutOfHome = false;
        
        // Out of Home icon toggle
        outOfHomeCard.addEventListener("click", function() {
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
        
        // Get js elements from DOM by ID
        const newTimerOverlay = document.getElementById("js--newTimerOverlay");
        const addTimerBtn = document.getElementById("js--addTimerBtn");
        const closeIcon = document.getElementById("js--closeAddNewTimerIcon");
        const closeBtn = document.getElementById("js--closeAddNewTimerBtn");

        // Set outOfHome state to false
        let isNewTimerOverlayOpen = false;
        
        // onclick add timer btn
        addTimerBtn.addEventListener("click", function () {
            
            // toggle overlay met display none en flex
            if (isNewTimerOverlayOpen) {
                newTimerOverlay.style.display = "none";
            } else {
                newTimerOverlay.style.display = "flex";
            }

            // switch
            isNewTimerOverlayOpen = !isNewTimerOverlayOpen
        })

        closeIcon.addEventListener("click", function () {
            closeOverlay();
        })

        closeBtn.addEventListener("click", function () {
            closeOverlay();
        })

        const closeOverlay = () => {
            newTimerOverlay.style.display = "none";
            isNewTimerOverlayOpen = false; 
        }
      
    }

};
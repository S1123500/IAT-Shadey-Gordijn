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

    // /curtain
    if (path === "/curtain/") {
        console.log("Curtain Detailpage")
        
        // Get js elements from DOM by ID
        const newTimerOverlay = document.getElementById("js--newTimerOverlay");
        const addTimerBtn = document.getElementById("js--addTimerBtn");
        const closeTimerIcon = document.getElementById("js--closeAddNewTimerIcon");
        const closeTimerBtn = document.getElementById("js--closeAddNewTimerBtn");

        const areYouSureTimerOverlay = document.getElementById("js--areYouSureTimerOverlay")
        const deleteTimerBtn = document.getElementById("js--deleteTimerBtn");
        const areYouSureCancelBtn = document.getElementById("js--areYouSureCancelBtn");
        const areYouSureCloseIcon = document.getElementById("js--areYouSureCloseIcon");

        const areYouSureCurtainOverlay = document.getElementById("js--areYouSureCurtainOverlay");
        const areYouSureCancelCurtainBtn = document.getElementById("js--areYouSureCancelCurtainBtn");
        const removeCurtainBtn = document.getElementById("js--removeCurtainBtn");
        const areYouSureCloseCurtainIcon = document.getElementById("js--areYouSureCloseCurtainIcon");

        // are you sure

        areYouSureCancelCurtainBtn.addEventListener("click", () => {
            closeOverlay(areYouSureCurtainOverlay);
        })

        areYouSureCloseCurtainIcon.addEventListener("click", () => {
            closeOverlay(areYouSureCurtainOverlay);
        })

        removeCurtainBtn.addEventListener("click", () => {
            areYouSureCurtainOverlay.style.display = "flex";
        })


        deleteTimerBtn.addEventListener("click", () => {
            areYouSureTimerOverlay.style.display = "flex";
        })

        areYouSureCancelBtn.addEventListener("click", () => {
            closeOverlay(areYouSureTimerOverlay);
        })

        areYouSureCloseIcon.addEventListener("click", () => {
            closeOverlay(areYouSureTimerOverlay);
        })

    
        
        // onclick add timer btn
        addTimerBtn.addEventListener("click", function () {
            newTimerOverlay.style.display = "flex";
        })

        closeTimerIcon.addEventListener("click", function () {
            closeOverlay(newTimerOverlay);
        })

        closeTimerBtn.addEventListener("click", function () {
            closeOverlay(newTimerOverlay);
        })

        const closeOverlay = (el) => {
            el.style.display = "none";
        }
      
    }

};
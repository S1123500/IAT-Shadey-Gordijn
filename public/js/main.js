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
        const addLocationInput = document.getElementById('js--newLocation');
        const addLocationBtn = document.getElementById('addLocation');
        const addCurtainForm = document.getElementById('js--addCurtainForm');
        const addCurtainOverlay = document.getElementById("js--addCurtainOverlay");
        const addCurtainBtn = document.getElementById("js--addCurtainBtn");
        const closeAddCurtainBtn = document.getElementById("js--closeAddCurtain");
        const cancelAddCurtainBtn = document.getElementById("js--cancelAddCurtain");

      

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
                outOfHomeCard_toggleIcon.classList.add("active")
            } else {
                outOfHomeCard_toggleIcon.innerHTML = "toggle_on"
                outOfHomeCard_toggleIcon.classList.remove("active")
            }
        });



        // Eventlistener on form
        addCurtainForm.addEventListener('click', function (event) {
            // If a radio button is checked
            if (event.target && event.target.matches("input[type='radio']")) {
                // Check if radio button check is the addLocationBtn
                if(addLocationBtn.checked) {
                    addLocationInput.style.display = "inline-block"
                } else {
                    addLocationInput.style.display = "none"
                }
            }
        });

        addCurtainBtn.addEventListener("click", () => {
            openOverlay(addCurtainOverlay);
        })

        closeAddCurtainBtn.addEventListener("click", () => {
            closeOverlay(addCurtainOverlay);
        })
        cancelAddCurtainBtn.addEventListener("click", () => {
            closeOverlay(addCurtainOverlay);
        })
        
    }

    // /curtain
    if (path === "/curtain/") {
        console.log("Curtain Detailpage")
        
        // Get js elements from DOM by ID
        // add timer
        const newTimerOverlay = document.getElementById("js--newTimerOverlay");
        const addTimerBtn = document.getElementById("js--addTimerBtn");
        const closeTimerIcon = document.getElementById("js--closeAddNewTimerIcon");
        const closeTimerBtn = document.getElementById("js--closeAddNewTimerBtn");
        // are you sure timer
        const areYouSureTimerOverlay = document.getElementById("js--areYouSureTimerOverlay")
        const areYouSureCancelBtn = document.getElementById("js--areYouSureCancelBtn");
        const areYouSureCloseIcon = document.getElementById("js--areYouSureCloseIcon");
        
        // are you sure curtain
        
        const areYouSureCurtainOverlay = document.getElementById("js--areYouSureCurtainOverlay");
        const areYouSureCancelCurtainBtn = document.getElementById("js--areYouSureCancelCurtainBtn");
        const removeCurtainBtn = document.getElementById("js--removeCurtainBtn");
        const areYouSureCloseCurtainIcon = document.getElementById("js--areYouSureCloseCurtainIcon");
        const deleteTimerBtns = document.querySelectorAll(".js--deleteTimerBtn");
    

        for (let i = 0; i < deleteTimerBtns.length; i++) {
            deleteTimerBtns[i].addEventListener("click", () => {
                openOverlay(areYouSureTimerOverlay);
            });
        }
        


        // are you sure curtain

        areYouSureCancelCurtainBtn.addEventListener("click", () => {
            closeOverlay(areYouSureCurtainOverlay);
        })

        areYouSureCloseCurtainIcon.addEventListener("click", () => {
            closeOverlay(areYouSureCurtainOverlay);
        })

        removeCurtainBtn.addEventListener("click", () => {
            openOverlay(areYouSureCurtainOverlay);
        })
        
        // are you sure timer

        areYouSureCancelBtn.addEventListener("click", () => {
            closeOverlay(areYouSureTimerOverlay);
        })

        areYouSureCloseIcon.addEventListener("click", () => {
            closeOverlay(areYouSureTimerOverlay);
        })
        
        // onclick add timer btn

        addTimerBtn.addEventListener("click", function () {
            openOverlay(newTimerOverlay);
        })

        closeTimerIcon.addEventListener("click", function () {
            closeOverlay(newTimerOverlay);
        })

        closeTimerBtn.addEventListener("click", function () {
            closeOverlay(newTimerOverlay);
        })

        
    }


    // overlay open and close + animation

    // om dit goed te laten werken moet in de css het volgende staan bij 'el':
     // top: -2vh, display: none, opacity: 0, background: none, transition: 0.2s all
        
    const closeOverlay = (el) => {
        el.style.background = "none";   

        setTimeout(() => {
            el.style.opacity = "0";
            el.style.top = "-2vh";
        }, 10)

        setTimeout(() => {
            el.style.display = "none"; 
        },200)
    }

    const openOverlay = (el) => {
        el.style.display = "flex"

        setTimeout(() => {
            el.style.opacity = "1";
            el.style.top = "0";  
        }, 1)
            
        setTimeout(() => {
            el.style.background = "rgba(0, 0, 0, 0.7)";
        },75)
    }
};

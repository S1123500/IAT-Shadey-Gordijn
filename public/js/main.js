window.onload = () => {
    // Get current domain name, only add port if it exists
    let domainName = `${window.location.hostname}${window.location.port ? `:${window.location.port}` : ''}`;

    // Get current path name
    let path = window.location.pathname;

    // Regex to check if path is /curtain/{curtain name}
    const regex = new RegExp("\/curtain\/[A-Za-z0-9]+")

    // get time each 5 minutes and refresh the page
    const refreshDelay = 300000;

    setInterval(() => {
        // let reloadTime = new Date().getHours() + ":" + new Date().getMinutes();
        // window.location.replace(`http://${domainName}/autoReload/${reloadTime}`);
    }, refreshDelay);

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
            outOfHomeCard_toggleIcon.classList.add("active")
        } else {
            outOfHomeCard_toggleIcon.innerHTML = "toggle_off"
            outOfHomeCard_toggleIcon.classList.remove("active")
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
            window.location.replace(`http://${domainName}/vacation`);
        })

        // Eventlistener on form
        addCurtainForm.addEventListener('click', function (event) {
            // If a radio button is checked
            if (event.target && event.target.matches("input[type='radio']")) {
                // Check if radio button check is the addLocationBtn
                if (addLocationBtn.checked) {
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
    if (regex.test(path)) {
        console.log("Curtain Detailpage")

        // ------ Elements ------
        // Add timer to curtain
        const newTimerOverlay = document.getElementById("js--newTimerOverlay");
        const addTimerBtn = document.getElementById("js--addTimerBtn");
        const closeTimerIcon = document.getElementById("js--closeAddNewTimerIcon");
        const closeTimerBtn = document.getElementById("js--closeAddNewTimerBtn");
        // Are you sure timer
        const areYouSureTimerOverlay = document.getElementById("js--areYouSureTimerOverlay")
        const areYouSureCancelBtn = document.getElementById("js--areYouSureCancelBtn");
        const areYouSureCloseIcon = document.getElementById("js--areYouSureCloseIcon");
        // Are you sure curtain 
        const areYouSureCurtainOverlay = document.getElementById("js--areYouSureCurtainOverlay");
        const areYouSureCancelCurtainBtn = document.getElementById("js--areYouSureCancelCurtainBtn");
        const removeCurtainBtn = document.getElementById("js--removeCurtainBtn");
        const areYouSureCloseCurtainIcon = document.getElementById("js--areYouSureCloseCurtainIcon");
        const deleteTimerBtns = document.querySelectorAll(".js--deleteTimerBtn");
        // System status popup 
        const systemStatusPopup = document.getElementById("js--systemStatusPopup");
        const systemStatusPopupBtnClose = document.getElementById("js--systemStatusPopupClose");
        const systemStatusPopupBtn = document.getElementById("js--systemStatusPopupBtn");
        // Slider
        const openCloseSlider = document.getElementById("openCloseSlider__slider");
        // Curtain name
        const curtainName = document.getElementById("js--curtainName").innerHTML;
        // Timer card
        const timerCardDay = document.getElementsByClassName("timerCard__title");
        const timersTimeline = document.getElementsByClassName("timerCard__openToClose");

        // ------ Arrays ------
        // 1: Button el that needs evtlistener, 2: Overlay el that needs animation, 3: Give it either open or close animation
        const OpenAndCloseButtons = [
            [areYouSureCancelCurtainBtn, areYouSureCurtainOverlay, "close"],
            [areYouSureCloseCurtainIcon, areYouSureCurtainOverlay, "close"],
            [areYouSureCancelBtn, areYouSureTimerOverlay, "close"],
            [areYouSureCloseIcon, areYouSureTimerOverlay, "close"],
            [closeTimerIcon, newTimerOverlay, "close"],
            [closeTimerBtn, newTimerOverlay, "close"],
            [removeCurtainBtn, areYouSureCurtainOverlay, "open"],
            [addTimerBtn, newTimerOverlay, "open"]
        ];

        // ------ Functions ------
        // Adds correct evtlistener & animation to elements from array
        const addOpenAndCloseEvents = (arr) => {
            for (let i = 0; i < arr.length; i++) {
                arr[i][0] ? arr[i][0].addEventListener("click", () => {
                    arr[i][2] === "open" ? openOverlay(arr[i][1]) : closeOverlay(arr[i][1]);
                }) : null;
            };
        };
        console.log(OpenAndCloseButtons);
        addOpenAndCloseEvents(OpenAndCloseButtons);

        // ------ Other Animations & Elements ------
        // System status popup close button
        // systemStatusPopupBtnClose.addEventListener("click", () => {
        //     systemStatusPopupClose(systemStatusPopup);
        // });

        // Adds eventlistener to all deleteTimer buttons
        for (let i = 0; i < deleteTimerBtns.length; i++) {
            deleteTimerBtns[i].addEventListener("click", () => {
                openOverlay(areYouSureTimerOverlay);
            });
        };

        // Open close slider
        openCloseSlider.addEventListener("mouseup", () => {
            handleSliderClick();
        })
        openCloseSlider.addEventListener("touchend", () => {
            handleSliderClick();
        })

        const handleSliderClick = () => {
            console.log(openCloseSlider.value);
            window.location.replace(`http://${domainName}/curtain/${curtainName}/update/${openCloseSlider.value}`);
        };

        ["mouseup", "touchend"].forEach((i) => {
            openCloseSlider.addEventListener(i, handleSliderClick);
        });

        // Gets a number from 0 to 100 based on a 24 hour time scale (00:00 - 23:59)
        const getPercentageFromTime = (time) => {
            let timeArr = time.split(":");
            let hours = parseInt(timeArr[0]);
            let minutes = parseInt(timeArr[1]);
            let percentage = (hours * 60 + minutes) / 1440 * 100;
            return Math.round(percentage);
        };

        // Timer card timeline percentage calculations
        for (let i = 0; i < timersTimeline.length; i++) {
            let openTime = timersTimeline[i].dataset.opentime;
            let closeTime = timersTimeline[i].dataset.closetime;

            let openTimePercentage = getPercentageFromTime(openTime);
            let closeTimePercentage = getPercentageFromTime(closeTime);

            let openTimeMarginLeft = openTimePercentage + "%";
            let closeTimeWidth = closeTimePercentage - openTimePercentage + "%";

            timersTimeline[i].style.marginLeft = openTimeMarginLeft;
            timersTimeline[i].style.width = closeTimeWidth;
        };

        // Timer card day abbreviation to full word
        for (let i = 0; i < timerCardDay.length; i++) {
            let day = timerCardDay[i].innerHTML;
            switch (day) {
                case "Mon":
                    timerCardDay[i].innerHTML = "Monday";
                    break;
                case "Tue":
                    timerCardDay[i].innerHTML = "Tuesday";
                    break;
                case "Wed":
                    timerCardDay[i].innerHTML = "Wednesday";
                    break;
                case "Thu":
                    timerCardDay[i].innerHTML = "Thursday";
                    break;
                case "Fri":
                    timerCardDay[i].innerHTML = "Friday";
                    break;
                case "Sat":
                    timerCardDay[i].innerHTML = "Saturday";
                    break;
                case "Sun":
                    timerCardDay[i].innerHTML = "Sunday";
                    break;
            }
        }
    }

    // ------ Animation Functions ------
    // css van 'el' -> top: -2vh; display: none; opacity: 0; background: none; transition: 0.2s all;
    const closeOverlay = (el) => {
        el.style.background = "none";
        setTimeout(() => {
            el.style.opacity = "0";
            el.style.top = "-2vh";
        }, 10)
        setTimeout(() => {
            el.style.display = "none"
        }, 200);
    }

    const openOverlay = (el) => {
        el.style.display = "flex"
        setTimeout(() => {
            el.style.opacity = "1";
            el.style.top = "0";
        }, 1)
        setTimeout(() => {
            el.style.background = "rgba(0, 0, 0, 0.7)"
        }, 75);
    }

    const systemStatusPopupOpen = (el) => {
        el.style.display = "flex";
        setTimeout(() => {
            el.style.top = "0"
        }, 150);
    }

    const systemStatusPopupClose = (el) => {
        el.style.top = "-5vh";
        setTimeout(() => {
            el.style.top = "25vh";
        }, 175)
        setTimeout(() => {
            el.style.display = "none";
        }, 500)
    }


};

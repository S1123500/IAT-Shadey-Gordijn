window.onload = () => {
    // Get current domain name, only add port if it exists
    let domainName = `${window.location.hostname}${window.location.port ? `:${window.location.port}` : ''}`;

    // Get current path name
    let path = window.location.pathname;

    // Regex to check if path is /curtain/{curtain name}
    const regex = new RegExp("\/curtain\/[A-Za-z0-9]+")

    // Make error sentence
    let errorSentence = [];
    const errorMessages = {
        curtain: {
            name: ["enter a name", document.getElementById("js--addCurtainCard__nameLabel"), document.querySelector("input[name='name']")],
            location: ["select or create a location", document.getElementById("js--addCurtainCard__locationLabel"), null],
            newLocation: ["enter a new location", document.getElementById("js--addCurtainCard__locationLabel"), null],
            pairCode: ["enter a pair code", document.getElementById("js--addCurtainCard__pairCodeLabel"), document.querySelector("input[name='pairCode']")],
        },
        timer: {
            dotw: ["select a day of the week", document.getElementById("js--addTimer__dotwLabel"), null],
            openTime: ["enter an open time", document.getElementById("js--addTimer__openTimeLabel"), document.querySelector("input[name='open-time']")],
            closeTime: ["enter a close time", document.getElementById("js--addTimer__closeTimeLabel"), document.querySelector("input[name='close-time']")],
            closeBeforeOpen: ["enter a close time that's after open time", null],
        }
    }

    // All pages
    const loadingSpinnerContainer = document.getElementById("js--loadingSpinner__container");

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

    const startLoadingAnimation = (el) => {
        el.style.display = "flex";
        el.style.opacity = "1";
    }

// ========================================= HOMEPAGE =========================================
    if (path === "/") {
        console.log("Homepage")


        const outOfHomeCard = document.getElementById("js--outOfHomeCard");
        const outOfHomeCard_toggleIcon = document.getElementById("js--outOfHomeCard-toggleIcon");
        const addLocationInput = document.getElementById('js--newLocation');
        const addLocationBtn = document.getElementById('addLocation');
        const addCurtainForm = document.getElementById('js--addCurtainForm');
        const addCurtainOverlay = document.getElementById("js--addCurtainOverlay");
        const addCurtainBtn = document.getElementById("js--addCurtainBtn");
        const addCurtainBtnSubmit = document.getElementById("js--addCurtainBtnSubmit");
        const closeAddCurtainBtn = document.getElementById("js--closeAddCurtain");
        const cancelAddCurtainBtn = document.getElementById("js--cancelAddCurtain");
        const curtainCard = document.getElementsByClassName("js--curtainCard");
        const duplicatePopup = document.getElementById("js--duplicatePopup");
        const duplicatePopupBtnClose = document.getElementById("js--duplicatePopupClose");

        // Error senteces
        let nameInputValid = false;
        let pairCodeInputValid = false;
        let locationInputValid = false;
        let addCurtainFormValid = false;

        // Loading animation
        curtainCard.addEventListener("click", () => {
            loadingSpinnerContainer.style.display = "flex";
            loadingSpinnerContainer.style.opacity = "1";
        });
        // Check add curtain form submit
        addCurtainBtnSubmit.addEventListener("click", (e) => {
            e.preventDefault();

            clearErrorStyling(errorMessages.curtain.name[1]);
            clearErrorStyling(errorMessages.curtain.location[1]);
            clearErrorStyling(errorMessages.curtain.pairCode[1]);
            clearErrorStyling(errorMessages.curtain.name[2]);
            clearErrorStyling(errorMessages.curtain.location[2]);
            clearErrorStyling(errorMessages.curtain.pairCode[2]);

            // Check if form inputname is not null
            if (curtainNameInput.value !== "") {
                nameInputValid = true;
            } else {
                nameInputValid = false;
                errorSentence.push(errorMessages.curtain.name[0]);
                errorMessages.curtain.name[1].classList.add("textError");
                errorMessages.curtain.name[2].classList.add("inputError");
            }

            // Check if form input paircode is not null
            if (pairCodeInput.value !== "") {
                pairCodeInputValid = true;
            } else {
                pairCodeInputValid = false;
                errorSentence.push(errorMessages.curtain.pairCode[0]);
                errorMessages.curtain.pairCode[1].classList.add("textError");
                errorMessages.curtain.pairCode[2].classList.add("inputError");
            }
            
            if (!locationInputValid) {
                errorSentence.push(errorMessages.curtain.location[0])
                errorMessages.curtain.location[1].classList.add("textError");
            }
            
            // if nameinputvalid & paircodeinputvalid & locationinputvalid is true, set addCurtainFormValid to true
            if (nameInputValid && pairCodeInputValid && locationInputValid) {
                addCurtainFormValid = true;
            } else {
                addCurtainFormValid = false;
            }

            createErrorSentence(errorSentence, addCurtainErrorMessage);
            errorSentence = [];

            if (addCurtainFormValid) {
                loadingSpinnerContainer.style.display = "flex";
                loadingSpinnerContainer.style.opacity = "1";
                closeOverlay(addCurtainOverlay);
                addCurtainForm.submit();                
            }            
        });



        // =========================== Vacation ===========================
        // getting the variable from database and making it boolean
        var isOutOfHome = outOfHomeCard.dataset.isoutofhome;
        if (isOutOfHome === 'false') {
            isOutOfHome = false;
        } else {
            isOutOfHome = true;
        }

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
                outOfHomeCard_toggleIcon.classList.remove("active")
            } else {
                outOfHomeCard_toggleIcon.innerHTML = "toggle_on"
                outOfHomeCard_toggleIcon.classList.add("active")
            }

            // load spinner
            loadingSpinnerContainer.style.display = "flex";
            loadingSpinnerContainer.style.opacity = "1";

            window.location.replace(`http://${domainName}/vacation`);
        })

        // =========================== Error popup ===========================
        //Error massage if adding a duplicate name
        var Error = duplicatePopup.dataset.error;
        if (Error === 'true') {
            systemStatusPopupOpen(duplicatePopup);
        }

        duplicatePopupBtnClose.addEventListener("click", () => {
            systemStatusPopupClose(duplicatePopup);
            window.location.replace(`http://${domainName}/errorClose`);
        });

        
        // =========================== Loading Animation ===========================
        for (let i = 0; i < curtainCard.length; i++) {
            const element = curtainCard[i];
            element ? element.addEventListener("click", (e) => {
                loadingSpinnerContainer.style.display = "flex";
                loadingSpinnerContainer.style.opacity = "1";
            }) : null;
        }

        // =========================== Form for adding curtain ===========================
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

        // Check if 
        // const pairCodeRegex = /[^[a-zA-Z]{0,4}[0-9]{0,4}$]/;
        const specialChar = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

        const handleInput = (el, evt, rgx) => {
            el.addEventListener(evt, (e) => {
                // if paircoderegex set input to upper case
                el === pairCodeInput ? el.value = el.value.toUpperCase() : null;
                if (rgx.test(e.target.value)) {
                    for(let i = 0; i < e.target.value.length; i++) {
                        rgx ? el.value = el.value.replace(rgx, '') : null;
                    }
                }
            });
        }

        ["paste", "keyup"].forEach((i) => {
            handleInput(pairCodeInput, i, specialChar);
            handleInput(curtainNameInput, i, specialChar);
            handleInput(addLocationInput, i, specialChar);
        });

        locationRadioButtons.forEach((i) => {
            i.addEventListener("click", (e) => {
                if (e.target.checked) {
                    locationInputValid = true;
                    if (e.target.value === "addLocation") {
                        locationInputValid = false;
                        if (addLocationInput.value !== "") {
                            locationInputValid = true;
                        }
                    }
                }                
            })
        })

        addLocationInput.addEventListener("keyup", (e) => {
            if (e.target.value !== "") {
                locationInputValid = true;
            } else {
                locationInputValid = false;
            }
        })
    }



    // ========================================= DETAIL =========================================
    if (regex.test(path)) {
        console.log("Curtain Detailpage")

        // ------ Elements ------
        // Back
        const backToHome = document.getElementById("js--backToHome")
        // Add timer to curtain
        const newTimerOverlay = document.getElementById("js--newTimerOverlay");
        const addTimerBtn = document.getElementById("js--addTimerBtn");
        const closeTimerIcon = document.getElementById("js--closeAddNewTimerIcon");
        const addTimerSubmitBtn = document.getElementById("js--addNewTimerSubmitBtn");
        const closeTimerBtn = document.getElementById("js--closeAddNewTimerBtn");
        // Are you sure timer
        const areYouSureTimerOverlay = document.getElementById("js--areYouSureTimerOverlay")
        const areYouSureCancelBtn = document.getElementById("js--areYouSureCancelBtn");
        const areYouSureCloseIcon = document.getElementById("js--areYouSureCloseIcon");
        const areYouSureDeleteTimerBtn = document.getElementById("js--areYouSure__deleteTimerBtn");
        // Are you sure curtain 
        const areYouSureCurtainOverlay = document.getElementById("js--areYouSureCurtainOverlay");
        const areYouSureCancelCurtainBtn = document.getElementById("js--areYouSureCancelCurtainBtn");
        const removeCurtainBtn = document.getElementById("js--removeCurtainBtn");
        const areYouSureDeleteCurtainBtn = document.getElementById("js--areYouSure__deleteCurtainBtn");
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
        // Addtimer form
        const addTimerForm = document.getElementById("js--addTimerForm");
        // Add timer Error message
        const addTimerErrorMessage = document.getElementById("js--addNewTimer__errorMessage");

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

        addOpenAndCloseEvents(OpenAndCloseButtons);

        // ------ Other Animations & Elements ------
        // System status popup close button
        systemStatusPopupBtnClose.addEventListener("click", () => {
            systemStatusPopupClose(systemStatusPopup);
        });
        areYouSureDeleteCurtainBtn.addEventListener("click", () => {
            closeOverlay(areYouSureCurtainOverlay);
            startLoadingAnimation(loadingSpinnerContainer);

        });
        areYouSureDeleteTimerBtn ? areYouSureDeleteTimerBtn.addEventListener("click", () => {
            closeOverlay(areYouSureTimerOverlay);
            startLoadingAnimation(loadingSpinnerContainer);
        }) : null;
        backToHome.addEventListener("click", () => {
            startLoadingAnimation(loadingSpinnerContainer);
        })

        // Adds eventlistener to all deleteTimer buttons
        for (let i = 0; i < deleteTimerBtns.length; i++) {
            deleteTimerBtns[i].addEventListener("click", () => {
                openOverlay(areYouSureTimerOverlay);
            });
        };

        // =========================== Slider ===========================
        // openCloseSlider.addEventListener("mouseup", () => {
        //     handleSliderClick();
        // })
        // openCloseSlider.addEventListener("touchend", () => {
        //     handleSliderClick();
        // })

        const handleSliderClick = () => {
            startLoadingAnimation(loadingSpinnerContainer);
            window.location.replace(`http://${domainName}/curtain/${curtainName}/update/${openCloseSlider.value}`);
        };

        ["mouseup", "touchend"].forEach((i) => {
            openCloseSlider.addEventListener(i, handleSliderClick);
        });


        // =========================== Timer cards ===========================
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
        
        // =========================== Errors/Validation ===========================
        let dayInputValid = false;
        let openTimeValid = false;
        let closeTimeValid = false;
        let isOpenTimeBeforeCloseTime = false;
        let addTimerFormValid = false;

        // check add timer form and prevevnt default
        addTimerSubmitBtn.addEventListener("click", (e) => {
            e.preventDefault();
            
            clearErrorStyling(errorMessages.timer.dotw[1]);
            clearErrorStyling(errorMessages.timer.openTime[1]);
            clearErrorStyling(errorMessages.timer.closeTime[1]);
            clearErrorStyling(errorMessages.timer.dotw[2]);
            clearErrorStyling(errorMessages.timer.openTime[2]);
            clearErrorStyling(errorMessages.timer.closeTime[2]);

            // get radios checked
            let radioChecked = document.querySelector("input[name='radios']:checked");
            if (radioChecked) {
                dayInputValid = true
            } else {
                dayInputValid = false
                errorSentence.push(errorMessages.timer.dotw[0]);
                errorMessages.timer.dotw[1].classList.add("textError");
            }

            // check open time validity
            let openTimeInput = document.querySelector("#open-time");
            if (openTimeInput.value !== "") {
                openTimeValid = true;
            } else {
                openTimeValid = false;
                errorSentence.push(errorMessages.timer.openTime[0]);
                errorMessages.timer.openTime[1].classList.add("textError");
                errorMessages.timer.openTime[2].classList.add("inputError");
            }
            // check close time validity
            let closeTimeInput = document.querySelector("#close-time");
            if (closeTimeInput.value !== "") {
                closeTimeValid = true;
            } else {
                closeTimeValid = false;
                errorSentence.push(errorMessages.timer.closeTime[0]);
                errorMessages.timer.closeTime[1].classList.add("textError");
                errorMessages.timer.closeTime[2].classList.add("inputError");
            }
            // check open time is before close time
            let openTime = openTimeInput.value;
            let closeTime = closeTimeInput.value;
            if (openTime !== "" && closeTime !== "") {
                let openTimeArr = openTime.split(":");
                let closeTimeArr = closeTime.split(":");
                let openTimeHours = parseInt(openTimeArr[0]);
                let openTimeMinutes = parseInt(openTimeArr[1]);
                let closeTimeHours = parseInt(closeTimeArr[0]);
                let closeTimeMinutes = parseInt(closeTimeArr[1]);
                if (openTimeHours < closeTimeHours || (openTimeHours === closeTimeHours && openTimeMinutes < closeTimeMinutes)) {
                    isOpenTimeBeforeCloseTime = true;
                } else {
                    isOpenTimeBeforeCloseTime = false;
                }
            } else {
                isOpenTimeBeforeCloseTime = false;
            }

            !isOpenTimeBeforeCloseTime && openTime && closeTime ? errorSentence.push(errorMessages.timer.closeBeforeOpen[0]) : null;

            // if all is ok, form valid
            if (dayInputValid && openTimeValid && closeTimeValid && isOpenTimeBeforeCloseTime) {
                addTimerFormValid = true;
            } else {
                addTimerFormValid = false;
            }

            if (addTimerFormValid) {
                loadingSpinnerContainer.style.display = "flex";
                loadingSpinnerContainer.style.opacity = "1";
                closeOverlay(newTimerOverlay);
                addTimerForm.submit();
            }
            
            createErrorSentence(errorSentence, addTimerErrorMessage);
            // clear errorSentence
            errorSentence = [];
        });
    }

    const createErrorSentence = (errorSentence, errorElement) => {
        if (errorSentence.length > 0) {
            errorSentence.unshift("Please");
            if (errorSentence.length === 2) {
                errorSentence = errorSentence[0] + " " + errorSentence[1] + ".";
            }
            if (errorSentence.length === 3) {
                errorSentence = errorSentence[0] + " " + errorSentence[1] + " and " + errorSentence[2] + ".";
            }
            if (errorSentence.length === 4) {
                errorSentence = errorSentence[0] + " " + errorSentence[1] + ", " + errorSentence[2] + " and " + errorSentence[3] + ".";
            }
            errorElement.style.display = "block";
            errorElement.innerHTML = errorSentence;
        }         
    }

    const clearErrorStyling = (el) => {
        if (el) {
            el.classList.remove("inputError");            
            el.classList.remove("textError");
        }
    }
};
<article class="addNewTimer__background" id="js--newTimerOverlay">
    <section class="addNewTimer__wrapper">
        <p class="addNewTimer__p" id="js--closeAddNewTimerIcon">
                <span class="addNewTimer__closeIcon material-icons u-noselect">
                    close   
                </span>
                <span class="addNewTimer__closeHoverText"> Close </span>
            </p>
        <section class="addNewTimer">
            <h2 class="addNewTimer__title"> ADD A TIMER </h2>
            
            <form action="post" class="addNewTimer__form">
                <p>Day of the week</p>
                <section class="addNewTimer__dotw u-noselect">
                        <input type="radio" id="monday" name="radios" value="monday" checked>
                        <label for="monday" >M</label>

                        <input type="radio" id="tuesday" name="radios" value="tuesday">
                        <label for="tuesday">T</label>

                        <input type="radio" id="wednesday" name="radios" value="wednesday">
                        <label for="wednesday">W</label>

                        <input type="radio" id="thursday" name="radios" value="thursday">
                        <label for="thursday">T</label>

                        <input type="radio" id="friday" name="radios" value="friday">
                        <label for="friday">F</label>

                        <input type="radio" id="saturday" name="radios" value="saturday">
                        <label for="saturday">S</label>

                        <input type="radio" id="sunday" name="radios" value="sunday">
                        <label for="sunday">S</label>
                </section>

                <section class="addNewTimer__openAndCloseTimes">
                    <section class="addNewTimer__openTime">
                        <label for="open-time"> Open time </label>
                        <input type="time" step="300" id="open-time" name="open-time">
                    </section>
                    <section class="addNewTimer__closeTime">
                        <label for="close-time"> Close time </label>
                        <input type="time" name="close-time" id="close-time">
                    </section>
                </section>

                <input class="addNewTimer__addCurtainBtn" type="submit" value="ADD CURTAIN">
            </form>
            
            <button class="addNewTimer__cancelBtn" id="js--closeAddNewTimerBtn"> CANCEL </button>
        </section>
    </section>
</article>
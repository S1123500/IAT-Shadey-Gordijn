
<article class="addCurtainCard__overlay" id="js--addCurtainOverlay">
    <section class="addCurtainCard">
        <header class="addCurtainCard__header">
            <h2 class="addCurtainCard__title">Add Curtain</h2>

            <section class="addCurtainCard__close" id="js--addCurtainCloseIcon">

                <span class="addCurtainCard__close-icon material-icons u-noselect" id="js--closeAddCurtain">
                    close   
                </span>
                <span class="addCurtainCard__close-hoverText">Close</span>

            </section>

        </header>

        <form class="addCurtainCard__form" id="js--addCurtainForm">
            <label for="name">Curtain name</label>
            <input type="text" id="name" name="name" placeholder="Give your curtain a name" required>
            
            <label for="location">Curtain location</label>

            <section class="addCurtainCard__form-locations">

                <section class="addCurtainCard__form-location u-noselect">
                    <input type="radio" id="test" name="locations" value="[location]">
                    <label for="test">[location]</label>

                    <input type="radio" id="test2" name="locations" value="[location2]">
                    <label for="test2">[location2]</label>

                    <input type="radio" id="test3" name="locations" value="[location3]">
                    <label for="test3">[location3]</label>

                    <input type="radio" id="test4" name="locations" value="[location4]">
                    <label for="test4">[location4]</label>

                    <input type="radio" id="test5" name="locations" value="[location5]">
                    <label for="test5">[location5]</label>
                </section>

                <section class="add">
                    <input type="radio" id="addLocation" name="locations" value="addLocation">
                    <label for="addLocation"> + </label>
                </section>
            
            </section>

            <input type="text" id="js--newLocation" class="newLocationInput" name="location" placeholder="Add new location">

            <input type="submit" class="addCurtainCard__form-addBtn" id="js--addCurtainBtn" value="Add Curtain">
        </form> 

        <input type="submit" class="addCurtainCard__cancelBtn" id="js--cancelAddCurtain" value="Cancel">

    </section>
</article>
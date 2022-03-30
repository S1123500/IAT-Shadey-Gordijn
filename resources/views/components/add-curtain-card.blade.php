
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

        <form action="addCurtain" method="post" class="addCurtainCard__form" id="js--addCurtainForm">
        @csrf
            <label for="name">Curtain name</label>
            <input type="text" id="name" name="name" placeholder="Give your curtain a name" required pattern="[^()/><\][\\\x22,;|]+">
            
            <label for="location">Curtain Location</label>

            <section class="addCurtainCard__form-locations">

                <section class="addCurtainCard__form-location u-noselect">
                    @foreach ($locations as $location)
                        <input type="radio" id="{{$location->name}}" name="locations" value="{{$location->name}}">
                        <label for="{{$location->name}}">{{$location->name}}</label>
                    @endforeach
                </section>

                <section class="add">
                    <input type="radio" id="addLocation" name="locations" value="addLocation">
                    <label for="addLocation"> + </label>
                </section>
            
            </section>

            <input type="text" id="js--newLocation" class="newLocationInput" name="location" placeholder="Add new location">

            <section class="addCurtainCard__pairCode">
                <label for="pairCode">Unique Pair Code</label>
                <input type="text" id="pairCode" name="pairCode" placeholder="SHDY0000" required>
            </section>

            <input type="submit" class="addCurtainCard__form-addBtn" id="js--addCurtainBtn" value="Add Curtain">
        </form> 

        <input type="submit" class="addCurtainCard__cancelBtn" id="js--cancelAddCurtain" value="Cancel">

    </section>
</article>
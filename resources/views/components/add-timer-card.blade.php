<article class="addNewTimer__background" id="js--newTimerOverlay">
    <section class="addNewTimer__wrapper">
        <p class="addNewTimer__p" id="js--closeAddNewTimerIcon">
                <span class="addNewTimer__closeIcon material-icons u-noselect">
                    close   
                </span>
                <span class="addNewTimer__closeHoverText"> Cancel </span>
            </p>
        <section class="addNewTimer">
            <h2 class="addNewTimer__title"> ADD A TIMER </h2>
            
            <form action="addTimer" id="js--addTimerForm" method="post" class="addNewTimer__form">
            @csrf
                <p id="js--addTimer__dotwLabel">Day of the week</p>
                <section class="addNewTimer__dotw u-noselect">

                    @foreach($daysInAWeek as $day)
                        @if (!in_array($day, $daysAlreadyExist))
                            <input type="radio" id="{{$day}}" name="radios" value="{{$day}}">
                            <label for="{{$day}}">{{$day[0]}}</label>
                        @else
                            <input type="radio" id="{{$day}}" name="radios" value="{{$day}}" disabled>
                            <label for="{{$day}}">{{$day[0]}}</label>
                        @endif
                    @endforeach
                
                </section>

                <section class="addNewTimer__openAndCloseTimes">
                    <section class="addNewTimer__openTime">
                        <label for="open-time" id="js--addTimer__openTimeLabel"> Open time </label>
                        <input type="time" step="300" id="open-time" name="open-time">
                    </section>
                    <section class="addNewTimer__closeTime">
                        <label for="close-time" id="js--addTimer__closeTimeLabel"> Close time </label>
                        <input type="time" step="300" name="close-time" id="close-time">
                    </section>
                </section>

                <p class="addNewTimer__errorMessage textError" id="js--addNewTimer__errorMessage"></p>

                <input class="addNewTimer__addCurtainBtn" id="js--addNewTimerSubmitBtn" type="submit" value="ADD TIMER">
            </form>
            
            <button class="addNewTimer__cancelBtn" id="js--closeAddNewTimerBtn"> CANCEL </button>
        </section>
    </section>
</article>
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
            
            <form action="addTimer" method="post" class="addNewTimer__form">
            @csrf
                <p>Day of the week</p>
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
                        <label for="open-time"> Open time </label>
                        <input type="time" step="300" id="open-time" name="open-time">
                    </section>
                    <section class="addNewTimer__closeTime">
                        <label for="close-time"> Close time </label>
                        <input type="time" step="300" name="close-time" id="close-time">
                    </section>
                </section>

                <input class="addNewTimer__addCurtainBtn" type="submit" id="js--addTimerBtnSubmit" value="ADD TIMER">
            </form>
            
            <button class="addNewTimer__cancelBtn" id="js--closeAddNewTimerBtn"> CANCEL </button>
        </section>
    </section>
</article>
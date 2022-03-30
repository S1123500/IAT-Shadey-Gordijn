<article class="timerCard__wrapper">
    <section class="timerCard">
        <p class="timerCard__p js--deleteTimerBtn" id="js--deleteTimerBtn">
            <span class="timerCard__delete material-icons u-noselect">
                close   
            </span>
            <span class="timerCard__deleteHoverText">Delete</span>
        </p>
                
        <section class="timerCard__content">
            <h3 class="timerCard__title">{{$schedule->whichDay}}</h3>
            <section class="timerCard__schedule">
                <!-- @if ($schedule->timeOpen != NULL && $schedule->timeClose != NULL)
                    <section class="timerCard__openToClose">
                        <p class="timerCard__openToClose-open">{{$schedule->timeOpen}}</p>
                        <p class="timerCard__openToClose-close">{{$schedule->timeClose}}</p>
                    </section>
                @elseif ($schedule->timeOpen != NULL)
                    <section class="timerCard__openToClose">
                        <p class="timerCard__openToClose-open">{{$schedule->timeOpen}}</p>
                    </section>
                @elseif ($schedule->timeClose != NULL)
                    <section class="timerCard__openToClose">
                        <p class="timerCard__openToClose-close">{{$schedule->timeClose}}</p>
                    </section>
                @endif -->
                <section class="timerCard__openToClose" id="timerCard" data-opentime='{{$schedule->timeOpen}}' data-closetime='{{$schedule->timeClose}}'>
                    <p id="timerCardOpen" class="timerCard__openToClose-open">{{substr($schedule->timeOpen,0,-3)}}</p>
                    <p id="timerCardClose" class="timerCard__openToClose-close">{{substr($schedule->timeClose,0,-3)}}</p>
                </section>

            </section>
        </section>
    </section>
</article>
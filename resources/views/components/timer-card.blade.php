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
                <section class="timerCard__openToClose" data-opentime="06:15" data-closetime="21:15">
                    <p class="timerCard__openToClose-open">[open]</p>
                    <p class="timerCard__openToClose-close">[close]</p>
                </section>
            </section>
        </section>
    </section>
</article>
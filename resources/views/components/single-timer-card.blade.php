<article class="singleTimerCard__wrapper">
    <section class="timerCard">
        <p class="timerCard__p js--deleteTimerBtn">
            <span class="timerCard__delete material-icons u-noselect">
                close   
            </span>
            <span class="timerCard__deleteHoverText">Delete</span>
        </p>

        <section class="singleTimerCard__content">
            <h3 class="timerCard__title">{{$schedule->whichDay}}</h3>
            <section class="singleTimerCard__timeInfo">
                <p> [Open/Close] at </p>
                @if($schedule->timeOpen == NULL)
                    <p class="singleTimerCard__time">{{$schedule->timeClose}}</p>
                @elseif ($schedule->timeClose == NULL)
                    <p class="singleTimerCard__time">{{$schedule->timeOpen}}</p>
                @endif
            </section>
        </section>
    </section>
</article>
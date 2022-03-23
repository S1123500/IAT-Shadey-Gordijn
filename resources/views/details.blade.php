@extends('body')
@section('content')


<main class="content">
    <!-- Add timer card -->
    @include('./components/add-timer-card')

    @include('./components/are-you-sure-timer')
    @include('./components/are-you-sure-curtain')

    <!-- Title + Open Close Slider -->
    <section class="contentTop">

        <header class="detailsHeader">
            <a href="{{'/'}}">
                <span class="material-icons u-noselect">
                    keyboard_backspace
                </span>
            </a>
            <h1>[curtain name]</h1>
        </header>

        <section class="openCloseSlider__container">
            <p>Close</p>
            <section class="openCloseSlider">
                <input type="range" class="openCloseSlider__slider" id="openCloseSlider__slider" min="0" value="0" max="4" step="1" list="openCloseSlider__options">
            </section>
            <p>Open</p>
        </section>

    </section>

    <!-- Timers -->
    <section class="timerList">

        @include('./components/timer-card')
        @include('./components/timer-card')
        @include('./components/timer-card')
        @include('./components/timer-card')
        @include('./components/timer-card')
        @include('./components/timer-card')
  
      

        <button class="timerList__addTimerBtn" id="js--addTimerBtn">
            <span class="material-icons u-noselect">
                add
            </span>
            <p class="timerList__addTimerText ">
                ADD NEW TIMER
            </p>
        </button>

      <!-- Remove section -->
        <section class="removeCurtain">
            
            <button class="removeCurtainBtn" id="js--removeCurtainBtn"> 
                <span class="material-icons u-noselect">
                    delete
                </span>    
                Remove This Curtain
            </button>
        </section>
</section>
    </section>
</main>
@endsection


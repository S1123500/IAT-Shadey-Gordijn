@extends('body')
@section('content')

<main class="content">
    <!-- Title + Open Close Slider -->
    <section class="content-top">

        <header class="detailsHeader">
            <span class="material-icons">
                keyboard_backspace
            </span>
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

        @include('timer-card')
        
        <button class="timerList__addTimerBtn">
            <span class="material-icons">
                add
            </span>
            <p class="timerList__addTimerText">
                ADD NEW TIMER
            </p>
        </button>

    </section>

    <!-- Remove section -->
    <section class="removeCurtain">
        
        <button class="removeCurtainBtn"> 
            <span class="material-icons">
                delete
            </span>    
            Remove This Curtain 
        </button>
    </section>
</main>

@endsection
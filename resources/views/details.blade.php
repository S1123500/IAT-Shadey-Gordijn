@extends('body')
@section('content')

<main class="content">
    <!-- Title + Open Close Slider -->
    <section class="contentTop">

        <header class="detailsHeader">
            <a href="{{'/'}}">
                <span class="material-icons u-noselect">
                    keyboard_backspace
                </span>
            </a>
            <h1>{{$name}}</h1>
        </header>

        <section class="openCloseSlider__container">
            <p>Open</p>
            <section class="openCloseSlider">
                <input type="range" class="openCloseSlider__slider" id="openCloseSlider__slider" min="0" value="0" max="4" step="1" list="openCloseSlider__options">
            </section>
            <p>Close</p>
        </section>

    </section>

    <!-- Timers -->
    <section class="timerList">
    @foreach ($schedules as $schedule)
        @include('./components/timer-card')
    @endforeach
        <button class="timerList__addTimerBtn">
            <span class="material-icons u-noselect">
                add
            </span>
            <p class="timerList__addTimerText">
                ADD NEW TIMER
            </p>
        </button>

    </section>

    <!-- Remove section -->
    <section class="removeCurtain">
        
        <button onclick="window.location.href = '/delete/{{$curtain->name}}'" class="removeCurtainBtn"> 
            <span class="material-icons u-noselect">
                delete
            </span>    
            Remove This Curtain
        </button>
    </section>
</main>

@endsection
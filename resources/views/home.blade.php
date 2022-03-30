@section('title')
    {{"S H A D E Y | Home"}}
@endsection

@extends('body')
@section('content')

    <main class="content">
        <!-- Title + Out of Home Toggle -->
        <section class="contentTop">
            <header>
                <span class="material-icons u-noselect">
                    dashboard
                </span>
                <h1>My Curtains</h1>
            </header>

            <section class="outOfHomeCard" id="js--outOfHomeCard" data-isoutofhome="{{$isOutOfHome}}">

                <section class="outOfHomeCard__label">
                    <span class="material-icons u-noselect">
                        home
                    </span>
                    <p> Out of Home</p>
                </section>

                <section class="outOfHomeCard__toggleBtn"> 
                    <span class="material-icons u-noselect" id="js--outOfHomeCard-toggleIcon">
                        toggle_off
                    </span>
                </section>

            </section>

        </section>

        <!-- Curtain Cards -->
        <section class="curtainList">
        @foreach ($curtains as $curtain)
            <a href= '/curtain/{{$curtain->name}}/'>
                @include('./components/curtain-card')
            </a>
        @endforeach

            <section class="curtainList__add" id="js--addCurtainBtn">
                <span class="material-icons u-noselect">add</span>
            </section>

            @include('./components/add-curtain-card')

        </section>
    </main>

@endsection
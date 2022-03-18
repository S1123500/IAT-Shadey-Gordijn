@extends('body')
@section('content')

    <main class="content">
        <!-- Title + Out of Home Toggle -->
        <section class="contentTop">
            <header>
                <span class="material-icons">
                    dashboard
                </span>
                <h1>My Curtains</h1>
            </header>

            <section class="outOfHomeCard">

                <section class="outOfHomeCard__label">
                    <span class="material-icons">
                        home
                    </span>
                    <p> Out of Home</p>
                </section>

                <section class="outOfHomeCard__toggleBtn"> 
                    <span class="material-icons">
                        toggle_off
                    </span>
                </section>

            </section>

        </section>
        
        <!-- Curtain Cards -->
        <section class="curtainList">

            <a href="{{'/curtain/'}}">
                @include('./components/curtain-card')
            </a>
            
            <section class="curtainList__add">
                <span class="material-icons">add</span>
            </section>
        </section>
    </main>

@endsection
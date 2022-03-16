@extends('body')
@section('content')

    <main class="content">
        <section class="content-top">
            <header>
                <span class="material-icons">
                    dashboard
                </span>
                <h1>My Curtains</h1>
            </header>

            <section class="out-of-home">

                <section class="out-of-home-label">
                    <span class="material-icons">
                        home
                    </span>
                    <p> Out of Home</p>
                </section>

                <section class="out-of-home-button"> 
                    <span class="material-icons">
                        toggle_off
                    </span>
                </section>

            </section>
        </section>

        <section class="curtain-list">

            @include('curtain-card')
            
            <section class="curtain-add">
                <span class="material-icons">
                    add
                </span>
            </section>
        </section>
    </main>

@endsection
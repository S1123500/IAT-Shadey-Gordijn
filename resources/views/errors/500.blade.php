@extends('body')
@section('content')

    <main class="content">

        <article class="notFound">
            <section class="notFound__text">
                <p class="notFound__text-404">500</p>
                <p class="notFound__text-oops">Oops, somethin went wrong</p>
                <p>{{$exception->getMessage()}}</p>
            </section>
            <section class="notFound__btn">
                <a href="/">
                    <span class="material-icons u-noselect">
                        home
                    </span>
                    Return to homepage
                </a>
            </section>
        </article>

    </main>

@endsection
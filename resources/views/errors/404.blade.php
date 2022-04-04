@extends('body')
@section('content')

    <main class="content">

        <article class="notFound">
            <section class="notFound__text">
                <p class="notFound__text-404">404</p>
                <p class="notFound__text-oops">Oops, page not found</p>
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
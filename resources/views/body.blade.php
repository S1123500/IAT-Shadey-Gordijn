@extends('baseview')
@section('body')

    <body>
        @include('./components/header')
        @yield('content')
        @include('./components/footer')
    </body>
    
@endsection
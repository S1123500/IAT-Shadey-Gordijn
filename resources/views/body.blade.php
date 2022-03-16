@extends('baseview')
@section('body')

    <body>
        @include('header')
        @yield('content')
        @include('footer')
    </body>
    
@endsection
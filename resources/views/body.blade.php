@extends('baseview')
@section('body')

    <body>
        <!-- Loading animation -->
        @include('./components/loading-spinner')
        
        @include('./components/header')
        @yield('content')
        @include('./components/footer')
    </body>
    
@endsection
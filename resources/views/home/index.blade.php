@extends('welcome')
@section('content')
    <header class="container-fluid">
        <div class="row">
            <div class="col-6 p-0">
                <h1 class="main-title">
                    Relaciones Internacionales - UPEA
                </h1>
            </div>
            <div class="col-6 position-relative p-0 m-0 overflow-hidden" >
                <img class="img-home" id="imgHome" src="{{ url('images/fondo.jpeg') }}" alt="">
                <div class="img-banner" id="imgBanner">
                </div>
            </div>
        </div>
    </header>
    <script src="{{ url('js/home.js') }}"></script>
@endsection

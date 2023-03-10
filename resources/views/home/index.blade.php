@extends('app')
@section('content')
    <!-- Toda la sección del header en la ruta principal "/" -->
    <header class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 p-0 position-relative">
                <h1 class="main-title">
                    Relaciones Internacionales - UPEA
                </h1>

                <div class="position-absolute w-100 top-0 d-flex justify-content-center">
                    <img class="img-mono" src="{{ url('images/fondo_monolito.png') }}" alt="logo monolito">
                </div>
                <p class="intro-home">
                    Encuentre todos los convenios y noticias de Relaciones Internacionales de la UPEA
                </p>
            </div>
            <div
                class="col-12 col-md-6 col-lg-4
            order-first order-md-0 position-relative p-0 m-0 overflow-hidden">
                <img class="img-home" id="imgHome" src="{{ url('images/fondo.jpeg') }}" alt="">
                <button class="btn custom-btn">Ver más</button>

                <div class="img-banner" id="imgBanner">
                </div>

            </div>

            <div class="row p-0 m-0 bg-white">
                <hr>
                <div class="col-3">
                    <p class="counter"><span id="span1">200</span>Convenios Totales</p>
                </div>
                <div class="col-3">
                    <p class="counter"><span id="span2">20</span>Convenios Totales</p>
                </div>
                <div class="col-3">
                    <p class="counter"><span id="span3">23</span>Convenios Totales</p>
                </div>
                <div class="col-3">
                    <p class="counter"><span id="span4">50</span>Convenios Totales</p>
                </div>
                <hr>
            </div>
    </header>
    <main class="container my-3">
        <div class="row d-flex justify-content-around">
            <div class="col-3 news-card">
                <i class="fa fa-file-lines"></i>
            </div>
            <div class="col-3 news-card">asdf</div>
            <div class="col-3 news-card">asdf</div>
        </div>
    </main>
    <script src="{{ url('js/home.js') }}"></script>
@endsection

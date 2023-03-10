@extends('welcome')
@section('content')
<header class="container-fluid">
    <div class="row">
        <div class="col-6 p-0 position-relative">
            <h1 class="main-title">
                Relaciones Internacionales - UPEA
            </h1>
            <div class="position-absolute w-100 top-0 d-flex justify-content-center">
                <img class="img-mono" src="{{ url('images/fondo_monolito.png') }}" alt="logo monolito">
            </div>
        </div>
        <div class="col-6 position-relative p-0 m-0 overflow-hidden">
            <img class="img-home" id="imgHome" src="{{ url('images/fondo.jpeg') }}" alt="imagen del emblemático">
            <div class="img-banner" id="imgBanner">
            </div>
        </div>
    </div>
    <div class="row p-0 m-0">
        <hr>
        <div class="col-3">
            <p><span>23</span>Convenios Totales</p>
        </div>
        <div class="col-3"></div>
        <div class="col-3"></div>
        <div class="col-3"></div>
        <hr>
    </div>
</header>
<script src="{{ url('js/home.js') }}"></script>
@endsection
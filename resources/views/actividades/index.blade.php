@extends('actividades.actividadestemplate')
@section('content')
    <div class="container">
        <h1 class="mt-3">Oferta de Convenios, Becas e Idiomas</h1>
        <div class="row d-flex justify-content-around">
            <h2>Convenios</h2>
            <div class="col-12 col-md-5">
                <a href="convenios/nacionales" class="btn-convenio">
                    Convenios Nacionales
                    <img src="{{ url('iconos/nacional.png') }}" alt="" srcset="">
                </a>
            </div>
            <div class="col-12 col-md-5">
                <a href="convenios/internacionales" class="btn-convenio">
                    Convenios Internacionales
                    <img src="{{ url('iconos/internacionales.png') }}" alt="" srcset="">
                </a>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <h2>Becas</h2>
            <div class="col-12 col-md-5">
                <a href="/becas" class="btn-convenio">
                    Oferta de Becas
                    <img src="{{ url('iconos/becas.png') }}" alt="" srcset="">
                </a>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <h2>Idiomas</h2>
            <div class="col-12 col-md-5">
                <a href="/idiomas" class="btn-convenio">
                    Oferta de Idiomas
                    <img src="{{ url('iconos/idiomas.png') }}" alt="" srcset="">
                </a>
            </div>
        </div>
    </div>
@endsection

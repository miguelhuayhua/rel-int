@extends('galeria.galeriatemplate')
@section('content')
    <section class="container">
        <div class="row">
            @foreach ($imagenes as $imagen)
                <div class="col-4">
                    <img width="100%" src="{{ url($imagen->url_galeria) }}" alt="" srcset="">
                </div>
            @endforeach

        </div>
    </section>
@endsection

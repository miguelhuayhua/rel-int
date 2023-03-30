@extends('galeria.galeriatemplate')
@section('content')
    <section class="container">
        <div class="row">
            @foreach ($imagenes as $imagen)
                <div class="col-12 my-2 my-md-0 col-md-6 col-lg-4  p-0">
                    <div class="img-container position-relative">
                        <div class="img-banner">
                            <h3>
                                {{ $imagen->nombre_galeria }}
                            </h3>
                            <span>
                                {{ date('Y-m-d', strtotime($imagen->fecha_galeria)) }}
                            </span>
                        </div>
                        <img width="100%" src="{{ url($imagen->url_galeria) }}" alt="" srcset="">
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

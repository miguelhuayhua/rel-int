@extends('becas.becastemplate')
@section('content')
    <div class="container">
        <div class="container">
            <h1>
                Sección Becas
            </h1>
        </div>
        <div class="row">
            <ul>
                @foreach ($becas as $beca)
                    <li class="beca-item">
                        <div class="col-12 ">
                            <div class="beca-card">
                                <span>
                                    {{ $beca->correlativo }}
                                </span>
                                <div class="row">
                                    <div class="col-6 col-md-8">

                                        <h2>
                                            {{ $beca->titulo }}
                                        </h2>

                                    </div>
                                    <div class="col-6 col-md-4 mb-4">
                                        <img width="100%" src="{{ url($beca->url) }}" alt="">
                                    </div>
                                </div>
                                <p>
                                    {{ $beca->descripcion }}
                                </p>
                                <span>
                                    {{ $beca->fecha }}
                                </span>
                                <a class="pdf" href="{{ url($beca->nombre_archivo) }}">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </a>
                                <p>
                                    <a class="link" href="{{ $beca->links }}">{{ $beca->links }}</a>

                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

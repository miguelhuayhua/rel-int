@extends('convenios.conveniostemplate')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-around">
            <div class="col-8">
                <ul class="list-group">
                    @foreach ($vista as $carrera)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{$carrera->nom_carrera}}

                            <span class="badge badge-primary badge-pill"> 
                                {{ $carrera->convenios }}
                            </span>
                        </li>
                    @endforeach

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Dapibus ac facilisis in
                        <span class="badge badge-primary badge-pill">2</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Morbi leo risus
                        <span class="badge badge-primary badge-pill">1</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

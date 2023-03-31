<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('css/navbar.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ url('css/convenios/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/actividades/index.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ url('css/footer.css') }}" >
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">


    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
<body>
    @include('cliente.static.navbar')
    @yield('content')
    @include('cliente.static.footer')
    <script src="{{url('js/navbar.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>


</html>
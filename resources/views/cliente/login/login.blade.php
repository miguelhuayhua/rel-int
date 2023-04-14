<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">
    <link rel="stylesheet" href="{{ url('css/login/index.css') }}">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6 offset-3 login-card">
                <form action="/login" method="POST">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <a href="/">
                        <img src="{{ url('images/logorrnnii.png') }}" alt="" srcset="">
                    </a>
                    <h1>Iniciar Sesión</h1>

                    <form>
                        <div class="form-group">
                            <label for="usuario">Nombre de Usuario:</label>
                            <input type="text" class="form-control" id="usuario" aria-describedby="emailHelp"
                                placeholder="Introduzca su nombre de usuario">

                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" id="password"
                                placeholder="Introduzca su contraseña">
                        </div>
                        <button type="submit" class="btn btn-login">Iniciar Sesión</button>
                    </form>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>

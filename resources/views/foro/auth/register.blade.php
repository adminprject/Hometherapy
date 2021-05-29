<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro Usuario</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('pluginsloginforo/css/bootstrap.min.css') }}">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ url('pluginsfororegister/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ url('pluginsfororegister/css/style.css') }}">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                @if(count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Aviso</strong>
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="signup-content">
                    <form method="post" action="{{ url('foro/postRegister') }}" id="signup-form" class="signup-form">
                        @csrf
                        <h2 class="form-title">Crear Cuenta</h2>
                        <div class="form-group">
                            <input required type="text" class="form-input" name="name" id="name" placeholder="Nombre Completo"/>
                        </div>
                        <div class="form-group">
                            <input required type="email" class="form-input" name="email" id="email" placeholder="Correo Electronico"/>
                        </div>
                        <div class="form-group">
                            <input required type="text" class="form-input" name="password" id="password" placeholder="Contraseña"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input required type="password" class="form-input" name="password_confirmation" id="re_password" placeholder="Repite tu correo electronico"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Registrate"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Ya te encuentras registrado ? <a href="{{ url('foro/login') }}" class="loginhere-link">Ingresa</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ url('pluginsfororegister/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('pluginsfororegister/js/main.js') }}"></script>
    <script src="{{ url('pluginsloginforo/js/bootstrap.min.js') }}"></script>
</body>
</html>
<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ url('img/logo2.ico') }}" />

    <title>Hometherapy Admin</title>

    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  </head>

  <body>
    <main class="d-flex w-100">
      <div class="container d-flex flex-column">
        <div class="row vh-100">
          <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

              <div class="text-center mt-4">
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
              </div>

              <div class="card">
                <div class="card-body">
                  <div class="m-sm">
                    <div class="text-center">
                      <img src="{{ url('img/logo.png') }}" alt="Charles Hall" class="img-fluid rounded-circle" width="250" height="250" />
                    </div>
                    <form action="{{ url('admin/login') }}" method="post">
                      @csrf
                      <div class="mb-3">
                        <label class="form-label">Correo Electronico</label>
                        <input class="form-control form-control-lg" type="email" name="email" placeholder="Ingresa tu correo electronico" required />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Ingresa tu Contraseña" required />
                        <!-- <small>
                          <a href="pages-reset-password.html">Forgot password?</a>
                        </small> -->
                      </div>
                     <!--  <div>
                        <label class="form-check">
                          <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                          <span class="form-check-label">
                            Remember me next time
                          </span>
                        </label>
                      </div> -->
                      <div class="text-center mt-3">
                        <input type="submit" class="btn btn-lg btn-primary"/>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </main>

    <script src="{{ url('js/app.js')}}"></script>

  </body>

  </html>
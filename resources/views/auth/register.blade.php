<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stayme : Registro</title>
    <link rel=icon type="image/png" href="{{URL::asset('/img/fv/Stayme-Favicon.png')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/style-admin.css')}}">
</head>
<body>
<div id="cont">
    <header class="centerH">

        <nav class="navbar navbar-base">

            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <img src="{{URL::asset('img/icon/bars.svg')}}" alt="">
                    </button>

                    <a class="navbar-brand centerWH" href="/">
                        <div id="logo" class="centerWH">
                            <img src="{{URL::asset('img/lg/stayme-white.svg')}}" alt="">
                        </div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="bs-navbar">

                    <ul class="nav navbar-nav navbar-right">

                        <!--<li><a href="#conocenos">Conocenos</a></li>-->
                        <li><a href="/register">Regístrate</a></li>
                        <li><a href="/login">Iniciar sesión</a></li>
                        <li><a class="btn-o" href="/propietaryinfo">Anuncia tu alojamiento</a></li>

                    </ul>

                </div><!-- /.navbar-collapse -->

            </div><!-- /.container-fluid -->

        </nav>

    </header>
    <div id="cont-rest">

        <div class="container-fluid spacing centerW">

            <object type="image/svg+xml" id="logo-lg" data="{{URL::asset('/img/lg/stayme.svg')}}">
            </object>

            <div class="card-wel text-center centerWH">

                <object type="image/svg+xml" data="{{URL::asset('/img/cmp/envelope.svg')}}">
                </object>

                <div>

                    <h2 class="submiddle">
                        ¡Crea tu cuenta completamente gratis!
                    </h2>
                    <p class="subtext">
                        Únete a Stayme para ofrecer o buscar alojamientos. Stayme, te conecta con experiencias increíbles con tu inquilino o alojamiento ideal.
                        <a href="{{url('/login')}}"><u><strong>¿Ya tienes una cuenta?</strong></u></a>
                    </p>

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <small>
                            Al registrarme, acepto <a href=""><u>términos, condiciones</u></a> y <a href=""><u>políticas de privacidad</u></a>  de Stayme.
                        </small>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"  class="btn btn-square btn-lg btn-green">
                                    Registrarme
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    <footer>

        <div class="container-fluid spacing centerWH">

            <div id="logo-footer">
                <embed src="{{URL::asset('/img/lg/stayme-cmp.svg')}}" alt=""></embed>
            </div>

            <div id="contact" class="centerW">
                <div class="centerW">
                    <p>info@stayme.co</p>
                </div>
                <p class="hidden-xs">|</p>
                <div class="centerW">
                    <object type="image/svg+xml" id="logo-lg" data="{{URL::asset('/img/icon/wsp.svg')}}">
                    </object>
                    <p>(+57) 314 757 8105</p>
                </div>
            </div>

            <ul class="nav nav-pills">
                <li><a href="#">Sobre nosotros</a></li>
                <li><a href="#">Términos y condiciones</a></li>
                <li><a href="#">Políticas de privacidad</a></li>
                <li><a href="#">Blog</a></li>
            </ul>

            <ul id="redes" class="centerW">
                <li><a href="">
                        <img src="{{URL::asset('/img/icon/fb.svg')}}" alt="facebook">
                    </a></li>
                <li><a href="">
                        <img src="{{URL::asset('/img/icon/tw.svg')}}" alt="tiwter">
                    </a></li>
                <li><a href="">
                        <img src="{{URL::asset('/img/icon/int.svg')}}" alt="instagran">
                    </a></li>
                <li><a href="">
                        <img src="{{URL::asset('/img/icon/gop.svg')}}" alt="">
                    </a></li>
            </ul>

            <h5 id="copy">
                © 2017 Stayme
            </h5>

        </div>

    </footer>

</div>

<script src="{{URL::asset('/js/jquery_1_12_4.js')}}"></script>
<script src="{{URL::asset('/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('/js/animate.js')}}"></script>
<script src="{{URL::asset('/js/registerUser.js')}}"></script>
</body>
</html>
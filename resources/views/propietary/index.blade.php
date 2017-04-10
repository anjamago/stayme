<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stayme</title>
    <link rel=icon type="image/png" href="{{URL::asset('/img/fv/Stayme-Favicon.png')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/style-admin.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

<div id="cont">

    <header class="centerH">

        <nav class="navbar navbar-base">

            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <img src="{{URL::asset('/img/icon/bars.svg')}}" alt="">
                    </button>
                    <a class="navbar-brand centerWH" href="admin-propietario-anuncios.html">
                        <div id="logo" class="centerWH">
                            <img src="{{URL::asset('/img/lg/stayme-white.svg')}}" alt="">
                        </div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="bs-navbar">

                    <ul class="nav navbar-nav">

                        <li class="active"><a href="propietary/advertisements"><i class="material-icons">&#xE896;</i> Mis anuncios</a></li>
                        <li><a href="#">Perfil</a></li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <div class="icon-person centerWH">
                                    <img src="{{URL::asset('/img/person/person.jpg')}}" alt="">
                                    Nombre person
                                    <i class="material-icons">&#xE313;</i>
                                </div>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="#">Perfil</a></li>
                                <li><a href="#">Configuración</a></li>
                                <li><a href="#">Cerrar sesión</a></li>
                            </ul>

                        </li>

                    </ul>

                </div><!-- /.navbar-collapse -->

            </div><!-- /.container-fluid -->

        </nav>

    </header>

    <div id="cont-rest">

        <div class="container-fluid spacing centerW">
            @if(empty($ofertas))
            <div class="card-wel text-center centerWH">

                <object type="image/svg+xml" data="{{URL::asset('/img/cmp/welcome.svg')}}">
                </object>

                <div>
                    <h2 class="submiddle">
                        ¡Bienvenido a Stayme!
                    </h2>
                    <p class="subtext">
                        Estamos felices de que estés aquí. En realidad, nos  parece fabuloso y gratificante que te hayas registrado. <strong>¡Muchas gracias!</strong>

                    </p>
                    <div class="spc firts-anun">
                        <a href="{{url('propietary/register')}}"  class="btn btn-square btn-lg btn-blue">
                            Crear mi primer anuncio
                        </a>
                    </div>
                </div>

            </div>
            @else

            @endif

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
                        <img src="{{URL::asset('/img/icon/fb.svg')}}" alt="">
                    </a></li>
                <li><a href="">
                        <img src="{{URL::asset('/img/icon/tw.svg')}}" alt="">
                    </a></li>
                <li><a href="">
                        <img src="{{URL::asset('/img/icon/int.svg')}}" alt="">
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
</body>
</html>
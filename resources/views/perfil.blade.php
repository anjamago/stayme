<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Alojamientos para estudiantes y jóvenes profesionales | Stayme</title>
    <meta property="og:type" content="website">
    <meta property="og:title" content="Stayme">
    <meta property="og:image" content="img/fv/Stayme-Favicon.png">
    <meta property="og:locale" content="es_CO">
    <meta property="og:description" content="Encuentra alojamientos increíbles y alquila en línea de forma fácil y segura.">
    <meta property="og:url" content="http://www.stayme.co">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Encuentra alojamientos increíbles y alquila en línea de forma fácil y segura.">
    <meta name="keywords" content="Habitaciones, habitación, pensiones, pensión, pensiones en Montería, habitaciones en Montería, habitaciones en arriendo, habitaciones en arriendo en Bogotá, habitaciones en arriendo en Medellín, habitaciones en arriendo en Barranquilla, habitaciones en arriendo en Cartagena, habitaciones en arriendo en Montería, habitaciones en arriendo Cali, habitaciones en Bogotá, habitaciones en Medellín, habitaciones en Cartagena, habitaciones en Barranquilla, habitaciones en Montería, apartamentos en arriendo, apartamentos en arriendo en Bogotá, apartamentos en arriendo en Medellín, apartamentos en arriendo en Bucaramanga, apartamentos en arriendo en Cali, apartamentos en arriendo en Cartagena, apartamentos en arriendo en Barranquilla, apartamentos en arriendo en Montería, arriendo apartamento, arriendo habitación, apartaestudios en arriendo, arriendo apartaestudios Cali, arriendo apartaestudios Medellín, arriendo apartaestudios Bogotá, arriendo apartaestudios Montería, arriendo apartaestudios Cartagena,  arriendo apartaestudios Bucaramanga, Apartaestudios en arriendo Bogotá, , Apartaestudios en arriendo Medellín, , Apartaestudios en arriendo Cali, , Apartaestudios en arriendo Bucaramanga, , Apartaestudios en arriendo Cartagena, , Apartaestudios en arriendo Montería. "/>
    <meta name="roboots" content="">
    <meta name="google-site-verification" content="">

    <link rel=icon type="image/png" href="{{URL::asset('/img/fv/Stayme-Favicon.png')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/style.css')}}">


</head>
<body>

<div id="">

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

</div>


<!-- /#init -->

<section id="conocenos">
    @if($status == 'autorizado')
        <div class="container-fluid spacing centerW">
            <img id="esp" src="{{URL::asset('img/Icono-Stayme2.png')}}" class="img-center">

            <h2 class="subtitle">Por favor seleciona  tu perfil </h2>
            <p class="subtext">
                Este perfil sera con el que podar tanto ofertar tus alojamiento o buscar uno que te haga sentir como en casa
            </p>
            <form action="/userProfile" method="post" class="container row">
                {{ csrf_field() }}
                <input type="hidden" value="{{$id}}" name="id_user">
                <div class="from-group col-sm-4 col-sm-offset-4">
                    @if(count($errors) > 0)
                        <div class="alert alert-warning" role="alert">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    </br>

                    <select name="perfil" id="rol" class="form-control col-sm-12 ">
                        <option value=""></option>
                        @foreach($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->permission}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="from-group col-sm-4 col-sm-offset-4 " style="margin-top: 1rem;">
                    <button class="btn btn-lg btn-header">Selecionar</button>
                </div>
            </form>

        </div>
    @elseif($status =='noAutorizado')
        <div class="container-fluid spacing centerW">
            <img id="esp" src="{{URL::asset('img/Icono-Stayme2.png')}}" class="img-center">
            <p class="subtext">
                Verifica tu cuenta de correo para activar tu cuenta
            </p>
        </div>
    @endif
</section>



<footer>

    <div class="container-fluid spacing centerWH">

        <div id="logo-footer">
            <embed src="{{URL::asset('img/lg/stayme-cmp.svg')}}" alt=""></embed>
        </div>

        <div id="contact" class="centerW">
            <div class="centerW">
                <p>info@stayme.co</p>
            </div>
            <p class="hidden-xs">|</p>
            <div class="centerW">
                <object type="image/svg+xml" id="logo-lg" data="{{URL::asset('img/icon/wsp.svg')}}">
                </object>
                <p>(+57) 314 757 8105</p>
            </div>
        </div>

        <ul class="nav nav-pills">
            <li><a href="#">Sobre nosotros</a></li>
            <li><a href="/terminos">Términos y condiciones</a></li>
            <li><a href="/politicas">Políticas de privacidad</a></li>
            <li><a href="#">Blog</a></li>
        </ul>

        <ul id="redes" class="centerW">
            <li><a href="">
                    <img src="{{URL::asset('img/icon/fb.svg')}}" alt="">
                </a></li>
            <li><a href="">
                    <img src="{{URL::asset('img/icon/tw.svg')}}" alt="">
                </a></li>
            <li><a href="">
                    <img src="{{URL::asset('img/icon/int.svg')}}" alt="">
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
</body>

</html>

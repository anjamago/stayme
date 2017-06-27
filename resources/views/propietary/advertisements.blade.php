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
                    <a class="navbar-brand centerWH" href="{{url('/propietary')}}">
                        <div id="logo" class="centerWH">
                            <img src="{{URL::asset('/img/lg/stayme-white.svg')}}" alt="">
                        </div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="bs-navbar">

                    <ul class="nav navbar-nav">

                        <li class="active"><a href="{{url('/propietary')}}"><i class="material-icons">&#xE88A;</i> Volver</a></li>
                        <!--<li><a href="#">Perfil</a></li>-->

                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <div class="icon-person centerWH">
                                    <img src="{{URL::asset('/img/person/person.jpg')}}" alt="">
                                    {{Auth::user()->name}}
                                    <i class="material-icons">&#xE313;</i>
                                </div>
                            </a>

                            <ul class="dropdown-menu">
                                <!--<li><a href="#">Perfil</a></li>
                                <li><a href="#">Configuración</a></li>-->
                                <li>
                                    <a href=href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>

                        </li>

                    </ul>

                </div><!-- /.navbar-collapse -->

            </div><!-- /.container-fluid -->

        </nav>

    </header>

    <div class="row">
        <div id="cont-rest">
            @for ($i=0; $i<=count($ofertas)-1;$i++)
                <div class="card-wel text-center centerWH col-md-6" >
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                        @foreach($imgs as $key => $img)
                            @if($img->id_lease == $ofertas[$i]->id_lease)
                                <img class="activator" src="{{URL::asset($img->url_img)}}" style="width: 90%; height: 295px !important;">
                            @endif
                        @endforeach
                        </div>
                        <div class="card-content">
                          <div class="card-title activator grey-text text-darken-4"> 
                            Ciudad {{$ofertas[$i]->city}}
                          </div>
                            
                                <div class="infoCard" >Precio : {{$ofertas[$i]->prince}} </div> 
                                <div class="infoCard" >Direccion : {{$ofertas[$i]->address }}</div>
                                <div class="infoCard">Cupos :{{$ofertas[$i]->room}}</div>
                                <div class="infoCard">Sexo : {{$ofertas[$i]->gender}}</div>
                                <div class="infoCard">Tipo de inquilono : {{$ofertas[$i]->permission}}</div>
                            <ul class="advertisement-ul">
                                <li>
                                    <a href="{{url('/propietary/show/'.$ofertas[$i]->id_lease)}}">
                                        <i class="material-icons">visibility</i>
                                        <span>Ver</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="material-icons">create</i>
                                        <span>Editar</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="material-icons">delete_forever</i>
                                        <span>Eliminar</span>
                                    </a>
                                </li>
                            </ul>

                           
                        </div>
                        <!--<div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
                        </div>-->
                    </div>
                </div>
            @endfor
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
@extends("layouts.mailMaster")
@section("content")
    <header class="centerH">
        <img class="img-logo"  align="center" src="{{URL::asset('img/lg/stayme-white.svg')}}" alt="">
    </header>
    <section style="text-align: center;" class="content-body">
        <h2>Biemvenido a Stayme </h2>
        <p>
            Hola! {{$user->name}}


        </p>

            <p id="texto-conten">

                Estamos muy orgullosos de que hagas parte de esta gran familia<br>
                Te invitamos a que valides el registro haciendo clic en el boton validar<br>
                O copiando y pegando esta ruta en el navegado de tu preferencia<br>
                <xmp>
                 {{env("DOMINIO")}}/userProfile/{{$user->id}}/{{csrf_token()}}
                </xmp>


                <a class="button" href="{{env("DOMINIO")}}/userProfile/{{$user->id}}/{{csrf_token()}}"> Validar </a>
            </p>



    </section>

@endsection

@section("flooter")
    <section class="flooter">
        <embed class="img-logo"  src="{{URL::asset('img/lg/stayme-cmp.svg')}}" alt=""></embed>
      
    </section>
@endsection
<!Document html>
<html>
    <head>
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

        <style>
            a{
                text-decoration: none;
            }
            body{
                margin: 0;
                color: #676f77 !important;
                font-family: 'Roboto', sans-serif;
            }
            .centerH {
                display: flex;
                justify-content: center
            }
            .navbar{display:none}
            .navbar-base {
                border-radius: 0;
                border: none;
                margin: 0;
                padding: 0
            }
            header {
                background-color:#54d694;
                flex-direction: column;
                height: 96px;
                min-height: 64px;
                width: 100%;
                position: relative;
                z-index: 1000
            }

            header > nav > div {
                width: 90%
            }
            .container-fluid{padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}
            #cont {
                min-height: 100vh !important;
                width: 100% !important;
            }
            .navbar-header{float:left}
            .img-logo{
                width: 10rem;
                padding-left: 44%;

            }
            .centerW {
                align-items: center;
                display: flex
            }
            .flooter{
                background: #2b4158;
                height: 7rem;
            }
            .content-body{
                margin-top: 4rem;
                line-height: 1.4rem;

                height: 27.5rem;
            }
            #redes{
                margin: .6rem auto
            }
            #redes li {
                margin: auto .6em;
                text-decoration: none;
            }
            #redes >li > a{text-decoration: none;}
            #redes a img {
                height: 36px;
                width: 36px
            }

            #redes a:hover, #redes a:focus {
                opacity: .8;
                -moz-transition: all .3s ease-in-out;
                -webkit-transition: all .3s ease-in-out;
                transition: all .3s ease-in-out;
            }
            .button{
                border-radius: 4px;
                color: #fff;
                font-weight: 700;
                margin-top: 1rem;
                padding: 0.60em 2em;
                display: inline-block;
                padding: 6px 12px;
                margin-bottom: 0;
                font-size: 14px;
                font-weight: 400;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                -ms-touch-action: manipulation;
                touch-action: manipulation;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                background-image: none;
                border: 1px solid transparent;
                border-radius: 4px;
                background: #54d694;
            }

            @media only screen and ( max-width: 970px ) {
                #texto-conten{
                    text-align: left;
                    padding-left: 30%;
                }
            }
            @media only screen and ( max-width: 700px ) {
                .img-logo{
                    padding-left: 40%;
                }
                #cont{
                    width: 100% !important;
                }
                #texto-conten{
                    text-align: left;
                    padding-left: 7%;
                }

            }
            @media only screen and ( max-width: 370px ) {
                .img-logo{
                    padding-left: 30%;
                }
                #cont{
                    width: 100% !important;
                }
                #texto-conten{
                    text-align: initial;
                   padding: 20px;
                }

            }
            @media only screen and ( max-width: 100px) {
                .img-logo{
                    padding-left: 30%;
                }
                #cont{
                    width: 100% !important;
                }
                #texto-conten{
                    text-align: initial;
                    padding: 20px;
                }

            }

        </style>

    </head>
    <body >
        <div id="cont">
            @yield('header')
            @yield("content")
            @yield("flooter")
        </div>

        @yield("script")
    </body>
</html>
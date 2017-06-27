<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stayme : Formulario </title>
    
  <link rel=icon type="image/png" href="{{ URL::asset('/img/fv/Stayme-Favicon.png')}}">
  <link rel="stylesheet" href="{{ URL::asset('/css/ptl/style-form.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('/css/material.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('/css/dropzone.css')}}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div id="cont">

  <div class="container minCont">

    <div class="container-fluid">

      <div class="col-sm-8 col-sm-offset-2">

        <div class="wizard-container">

          <div id="logo-footer">
            <embed src="{{URL::asset('/img/lg/stayme-cmp.svg')}}" alt="stayme"></embed>
          </div>


          <div class="card wizard-card" data-color="green" id="wizard">
          <!--formulario de registro de oferta-->
            <form action="" method="post" id="registerFormP" enctype=”multipart/form-data” >
             {{ csrf_field() }}
              <div class="wizard-header">
                <h3 class="wizard-title">¡Empecemos!</h3>
                <p class="category">Informanos sobre el alojamiento que deseas ofrecer.</p>
              </div>

              <div class="wizard-navigation">

                <div class="progress-with-circle">
                  <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 15%;"></div>
                </div>

                <ul>

                  <li>
                    <a href="#location" data-toggle="tab">
                      <div class="icon-circle" data-slep='ubicacion'>
                        <i class="material-icons md-36">&#xE567;</i>
                      </div>
                      <p class="text-icon">Ubicación</p>
                    </a>
                  </li>

                  <li>
                    <a href="#place" data-toggle="tab">
                      <div class="icon-circle" data-slep='lugar'>
                        <i class="material-icons md-36">&#xE88A;</i>
                      </div>
                      <p class="text-icon">Lugar</p>
                    </a>
                  </li>

                  <li>
                    <a href="#service" data-toggle="tab">
                      <div class="icon-circle" data-slep='servicio'>
                        <i class="material-icons md-36">&#xE90F;</i>
                      </div>
                      <p class="text-icon">Servicios</p>
                    </a>
                  </li>

                  <li>
                    <a href="#person" data-toggle="tab">
                      <div class="icon-circle" data-slep='inquilino'>
                       <i class="material-icons md-36">&#xE7FD;</i>
                      </div>
                      <p class="text-icon">Inquilino</p>
                    </a>
                  </li>

                </ul>

              </div>
              <!-- /.wizard-navigation -->

              <div class="tab-content">

                <div class="tab-pane" id="location">

                  <div class="row spcPane">

                    <div class="col-sm-12">
                      <h5 class="info-text"> Datos básicos del alojamiento</h5>
                    </div>

                    <div class="col-sm-5 col-sm-offset-1">
                      <div class="form-group">
                        <label> </label><br>
                        <label>Tipo de Alojamiento</label><br>
                        <select name="lease" class="form-control" id="lease">
                          <option disabled="" selected="">- Alojamiento -</option>
                          @foreach($info['lease_type'] as $type)
                            <option value="{{$type->id}}">{{$type->lease_type}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-5">
                      <div class="form-group">
                        <label> </label><br>
                        <label> Departamento </label><br>
                        <select name="departmen" class="form-control" id="departmen">
                          <option disabled="" selected="">- Departamento -</option>
                          @foreach($info['departmes'] as $depart)
                           <option value="{{$depart->id}}">{{$depart->departmen}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-5 col-sm-offset-1" id="departmen">
                      <div class="form-group" id="departmenIn" style="display:none;">
                        <label>Ciudad</label><br>
                        <select name="city" class="form-control selectpicker" id="departmenElem">
                            <!--insertar opcion -->
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-5 ">
                      <div class="form-group" id="cityIn" style="display:none;">
                        <label>Barrios</label><br>
                        <select name="outskirt" class="form-control" id="cityElem">
                            <!--insertar opcion -->
                        </select>
                      </div>
                    </div>
                    <div id="locationData" style="display:none;">
                        <div class="col-sm-5 col-sm-offset-1">
                          <div class="form-group">
                            <label>Dirección</label>
                            <input id="address" type="text" name="address" class="form-control" placeholder="Dirección exacta del alojamiento">
                          </div>
                        </div>

                        <div class="col-sm-5  ">
                          <div class="form-group">
                            <label>Valor mensual</label>
                            <div class="input-group">
                              <input type="number"  id="price" class="form-control" name="price" placeholder="500000">
                              <span class="input-group-addon">$</span>
                            </div>
                          </div>
                        </div>
                    </div>


                  </div>

                </div>
                <!-- /.tabPane -->

                <div class="tab-pane" id="place">

                  <div class="row">

                    <div class="container-fluid">
                      <h5 class="info-text"> ¿Con qué elementos cuenta la habitación?  </h5>
                    </div>

                    <div class="col-sm-10 col-sm-offset-1 spcPane">

                      <div class="col-sm-12 clear spaCd">

                           @foreach($info['choices'] as $choice)
                              @if($choice->type == 'HAB')
                                <div class="col-sm-6 col-md-3">
                                  <div class="choice" data-toggle="wizard-checkbox">
                                    <input type="checkbox" name="hab[]" id="{{$choice->type}}" value="{{$choice->id}}">
                                    <div class="card card-checkboxes card-hover-effect">
                                      <img src="{{URL::asset($choice->icon)}}" alt="">
                                      <p>{{$choice->choise}}</p>
                                    </div>
                                  </div>
                                </div>
                                @endif
                            @endforeach
                        

                      </div>

                    </div>

                    <div class="col-sm-5  col-sm-offset-1">
                      <div class="form-group">
                        <label>Cupos disponibles</label>
                        <input type="number" name='quantity'  id="quantity" class="form-control" placeholder="1">
                      </div>
                    </div>
                    <div class="col-sm-5  ">
                      <div class="form-group">
                        <label>Tiempo Arriendo</label>
                        <select name="lease_tiame" class="form-control" id="lease_type">
                          <option disabled="" selected="">- Tiempo de arriedo -</option>
                          @foreach($info['spans'] as $type)
                           <option value="{{$type->id}}">{{$type->span}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                  </div>

                </div>
                <!-- /.tabPane -->

                <div class="tab-pane" id="service">

                  <div class="row">

                    <div class="container-fluid">
                      <h5 class="info-text"> ¿Qué servicios ofrece? </h5>
                    </div>

                    <div class="col-sm-10 col-sm-offset-1 spcPane">

                      <div class="col-sm-12 clear spaCd">

                        @foreach($info['choices'] as $choice)
                              @if($choice->type == 'SEV')
                                <div class="col-sm-6 col-md-3">
                                  <div class="choice" data-toggle="wizard-checkbox">
                                    <input type="checkbox" name="sev[]" id="{{$choice->type}}" value="{{$choice->id}}">
                                    <div class="card card-checkboxes card-hover-effect">
                                      <img src="{{URL::asset($choice->icon)}}" alt="">
                                      <p>{{$choice->choise}}</p>
                                    </div>
                                  </div>
                                </div>
                                @endif
                            @endforeach

                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.tabPane -->

                <div class="tab-pane" id="person">

                  <div class="row">

                    <div class="col-sm-12">
                      <h5 class="info-text"> Sobre el inquilino</h5>
                    </div>

                    <div class="col-sm-5 col-sm-offset-1">
                      <div class="form-group">
                        <label>¿Género? </label><br>
                        <select name="gender" class="form-control">
                          <option disabled="" selected="">- Género -</option>
                          <option value="1"> Hombres </option>
                          <option value="2"> Mujeres </option>
                          <option value="3"> Cualquier género </option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>¿Ocupación?</label><br>
                        <select name="occupation" class="form-control">
                          <option disabled="" selected="">- Ocupación -</option>
                          @foreach($info['permission'] as $type)
                            @if($type->permission != 'Propietario')
                              <option value="{{$type->id}}">{{$type->permission}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-10 col-sm-offset-1">

                      <label>¿Cuales actividades pueden practicar en su alojamiento? </label>

                      <div class="col-sm-12 clear spaCd">
                         @foreach($info['choices'] as $choice)
                              @if($choice->type == 'ACT')
                                <div class="col-sm-6 col-md-3">
                                  <div class="choice" data-toggle="wizard-checkbox">
                                    <input type="checkbox" name="act[]" id="{{$choice->type}}" value="{{$choice->id}}">
                                    <div class="card card-checkboxes card-hover-effect">
                                      <img src="{{URL::asset($choice->icon)}}" alt="">
                                      <p>{{$choice->choise}}</p>
                                    </div>
                                  </div>
                                </div>
                                @endif
                            @endforeach
                      </div>

                    </div>

                    <div class="col-sm-10 col-sm-offset-1">
                      <div class="form-group">
                        <label>Descripción del alojamiento.</label>
                        <textarea name='descripcion' class="form-control" placeholder="Cuéntale a tu posible inquilino las ventajas de vivir en tu alojamiento. Háblale de la zona, de su ubicación, todo lo que hay a su alrededor. Destaca cada aspecto importante." rows="6"></textarea>
                      </div>
                    </div>

                    <div class="col-sm-10 col-sm-offset-1">
                      <div class="form-group">
                        <label>Reglas / Condiciones.</label>
                        <textarea name='reglas' class="form-control" placeholder="Hazle saber a tu inquilino cuales son las reglas que tienes en el alojamiento y detallas las  condiciones. Por ejemplo, ¿La hora de llegada al lugar es libre? ¿Permites visites visitas de pareja? ¿Puede hacer uso de las demás zonas del lugar? Describe cada una.
" rows="6"></textarea>
                      </div>
                    </div>


                  </div>

                </div>
                <!-- /.tabPane -->

              </div>
              <!-- /.tabContent -->


              <div class="wizard-footer">
                <div class="pull-right">

                  <input type='button' class='btn  btn-fill btn-success btn-wd btn-next '  name='next' value='Continuar' />
                  <input type='submit'  class='btn btn-finish btn-fill btn-success btn-wd' name='save' value='Finalizar' />
                </div>

                <div class="pull-left">
                  <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Regresar' />
                </div>
                <div class="clearfix"></div>
              </div>

            </form>

          </div>


        </div>

      </div>

    </div>
    <!-- /.container -->

  </div>
  <!-- /.img-container-->

  <button type="button" class="btn btn-primary hidden" data-toggle="modal" data-target=".abrir">Large modal</button>

  <div class="modal fade abrir" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-lg" role="document">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title center" id="myModalLabel">¡Fotos del alojamiento!</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('/propietary/upload')}}" class="dropzone needsclick dz-clickable" id="dropzone">
            {{csrf_field()}}
          </form>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-fill btn-success btn-wd subirImg">Guardar</a>
        </div>

      </div>
    </div>
  </div>

</div>
<script>
  var tkn = "{{csrf_token()}}";
</script>

<script src="{{ URL::asset('/js/jquery_1_12_4.js')}}"></script>
<script src="{{ URL::asset('/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('/js/ptl/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/ptl/paper-bootstrap-wizard.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/ptl/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script src="{{ URL::asset('/js/animate.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/validateForm.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/dropzone.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/dropConfig.js')}}" type="text/javascript"></script>
</body>
</html>

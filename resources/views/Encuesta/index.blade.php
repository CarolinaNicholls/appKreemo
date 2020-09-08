@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Encuestas</strong>
            <a href="/encuesta/crear" class="btn btn-link">Crear Encuesta</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear Encuesta </button>
        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_encuesta" style="width: 100%;" class="table table-striped table-bordered table-responsive">
                <thead class="" align="center">
                <tr>
                    <th>N° Servicio</th>
                    <th>Nombre Director</th>
                    <th>Constructora</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Fecha encuesta</th>
                    <th>Puntualidad</th>
                    <th>Solucion problemas</th>
                    <th>Orden Aseo</th>
                    <th>Cumplimiento Requisitos</th>
                    <th>Tuvo Inconvenientes</th>
                    <th>Respuesta Inconvenientes</th>
                    <th>Trato Personal</th>
                    <th>Aspectos Mejorar</th>
                    <th>Contractarian Otra vez</th>
                    <th>Recomendaria a VB</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Encuesta</h5>
                    <button type="button" class="close" data-dismiss="modal"  aria-label="Close" onclick="limpiar()"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    @include('flash::message')
                <form class="form-signin col-md-12" action="/encuesta/guardar" method="POST" name="frmEncuesta" id="frmEncuesta">
                @csrf
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Paso 1<br /><small>Buscar Servicio</small></a></li>
                            <li><a href="#step-2">Paso 2<br /><small>Pregunta 1</small></a></li>
                            <li><a href="#step-3">Paso 3<br /><small>Pregunta 2 y 3</small></a></li>
                            <li><a href="#step-4">Paso 4<br /><small>Pregunta 4 y 5</small></a></li>
                            <li><a href="#step-5">Paso 5<br /><small>Pregunta 6 y 7</small></a></li>
                        </ul>
                        <div>
                            <div id="step-1">
                                <div class="row mt-3">
                                    <div class="form-row" >
                                        <div class="form-group col-md-6">
                                            <label for="">Id del servicio</label>
                                            <select id="idservicio"  name= "idservicio" class="form-control @error('idservicio') is-invalid @enderror">
                                                <option value="0">Seleccione un servicio</option>
                                                @foreach($servicio as $key =>$value)
                                                    <option value="{{ $value->id }}" {{(old('idservicio')==$value->id)? 'selected':''}}>{{ $value->id}}</option>
                                                @endforeach
                                            </select>
                                            @error('idservicio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="idservicio" id="valIdServicio"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Nombre del director de la obra</label>
                                            <input type="text" class="form-control @error('directorobra') is-invalid @enderror" id="directorobra" name="directorobra" value="{{old('directorobra')}}">
                                            @error('directorobra')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="directorobra" id="valDirectorObra"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Constructora</label>
                                            <input type="text" class="form-control @error('constructora') is-invalid @enderror" id="constructora" name="constructora" value="{{old('constructora')}}">
                                            @error('constructora')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="constructora" id="valConstructora"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Correo</label>
                                            <input type="text" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" value="{{old('correo')}}">
                                            @error('correo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="correo" id="valCorreo"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Celular</label>
                                            <input type="tel" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" placeholder="Ejm: 3212345678" value="{{old('celular')}}">
                                            @error('celular')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="celular" id="valCelular"></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Fecha</label>
                                            <input type="date" class="form-control @error('mes') is-invalid @enderror" id="mes" name="mes" value="{{old('mes')}}" >
                                            @error('mes')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="mes" id="valMes"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-2">
                                <p><b>1.</b> Califique de 1 a 5 los siguientes aspectos prestados por Vinicol Bombeos</p>
                                    <div class="form-row" >
                                        <div class="form-group col-md-3">
                                            <label for="">Puntualidad</label>
                                            <input type="text" class="form-control @error('respuesta1_1') is-invalid @enderror" id="respuesta1_1" name="respuesta1_1" value="{{old('respuesta1_1')}}">
                                            @error('respuesta1_1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta1_1" id="valRespuesta1_1"></label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Solución de problemas</label>
                                            <input type="text" class="form-control @error('respuesta1_2') is-invalid @enderror" id="respuesta1_2" name="respuesta1_2" value="{{old('respuesta1_2')}}">
                                            @error('respuesta1_2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta1_2" id="valRespuesta1_2"></label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Orden y aseo</label>
                                            <input type="text" class="form-control @error('respuesta1_3') is-invalid @enderror" id="respuesta1_3" name="respuesta1_3" value="{{old('respuesta1_3')}}">
                                            @error('respuesta1_3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta1_3" id="valRespuesta1_3"></label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Cumplimiento en requisitos</label>
                                            <input type="text" class="form-control @error('respuesta1_4') is-invalid @enderror" id="respuesta1_4" name="respuesta1_4" value="{{old('respuesta1_4')}}">
                                            @error('respuesta1_4')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta1_4" id="valRespuesta1_4"></label>
                                        </div>
                                    </div>
                                </div>
                            <div id="step-3">
                                <p><b>2.</b> ¿tuvo algun inconveniente durante la prestación del servicio?</p>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">SI - NO</label>
                                        <select id="respuesta2"  name= "respuesta2" class="form-control @error('respuesta2') is-invalid @enderror">
                                            <option selected>Seleccione la respuesta</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                            @error('respuesta2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta2" id="valRespuesta2"></label>
                                        </div>
                                        </div>
                                            <p><b>3.</b> Si la <u>respuesta 2</u> fue SI, describa la situación:</p>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                            <textarea class="form-control @error('respuesta3') is-invalid @enderror" id="respuesta3" name="respuesta3" placeholder="Ingresa las observaciones" value="{{old('respuesta3')}}"></textarea>
                                            @error('respuesta3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="validacion" for="respuesta3" id="valRespuesta3"></label>
                                        </div>
                                    </div>
                            </div>
                            <div id="step-4">
                                <p><b>4.</b> El trato que recibe del personal en general de VINICOL BOMBEOS es adecuado, amable y se ajusta a lo que usted espera como cliente.</p>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">SI - NO</label>
                                        <select id="respuesta4"  name= "respuesta4" class="form-control @error('respuesta4') is-invalid @enderror">
                                            <option selected>Seleccione la respuesta</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                        </select>
                                        @error('respuesta4')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" for="respuesta4" id="valRespuesta4"></label>
                                    </div>
                                    </div>
                                        <p><b>5.</b> ¿Qué aspectos considera usted que deban mejorar en la empresa VINICOL BOMBEOS para sentir total satisfacción con el servicio prestado? </p>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                        <textarea class="form-control @error('respuesta5') is-invalid @enderror " id="respuesta5" name="respuesta5" placeholder="Ingresa las observaciones" value="{{old('respuesta5')}}"></textarea>
                                        @error('respuesta5')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" for="respuesta5" id="valRespuesta5"></label>
                                    </div>
                                    </div>
                            </div>
                            <div id="step-5">
                                <p><b>6.</b> ¿Volvería usted a utilizar los servicios de VINICOL BOMBEOS?</p>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">SI - NO</label>
                                        <select id="respuesta6"  name= "respuesta6" class="form-control @error('respuesta6') is-invalid @enderror">
                                            <option selected>Seleccione la respuesta</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                        @error('respuesta6')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" for="respuesta6" id="valRespuesta6"></label>
                                    </div>
                                    </div>
                                        <p><b>7.</b> ¿Recomendaría A VINICOL BOMBEOS para que otras empresas contrataran nuestros servicios?</p>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">SI - NO</label>
                                        <select id="respuesta7"  name= "respuesta7" class="form-control @error('respuesta7') is-invalid @enderror">
                                            <option selected>Seleccione la respuesta</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                        @error('respuesta7')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="validacion" for="respuesta7" id="valRespuesta7"></label>
                                    </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Guardar Encuesta</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('style')
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/modal/css/style.css') }}" rel="stylesheet">
@endsection
@section("scripts")
    <script>
        $('#tbl_encuesta').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/encuesta/listar',
                columns: [
                    {
                    data: 'idservicio',
                    name: 'idservicio'
                    },
                    {
                    data: 'directorobra',
                    name: 'directorobra'
                    },
                    {
                    data: 'constructora',
                    name: 'constructora'
                    },
                    {
                    data: 'correo',
                    name: 'correo'
                    },
                    {
                    data: 'celular',
                    name: 'celular'
                    },
                    {
                    data: 'mes',
                    name: 'mes'
                    },
                    {
                    data: 'respuesta1_1',
                    name: 'respuesta1_1'
                    },
                    {
                    data: 'respuesta1_2',
                    name: 'respuesta1_2'
                    },
                    {
                    data: 'respuesta1_3',
                    name: 'respuesta1_3'
                    },
                    {
                    data: 'respuesta1_4',
                    name: 'respuesta1_4'
                    },
                    {
                    data: 'respuesta2',
                    name: 'respuesta2'
                    },
                    {
                    data: 'respuesta3',
                    name: 'respuesta3'
                    },
                    {
                    data: 'respuesta4',
                    name: 'respuesta4'
                    },
                    {
                    data: 'respuesta5',
                    name: 'respuesta5'
                    },
                    {
                    data: 'respuesta6',
                    name: 'respuesta6'
                    },
                    {
                    data: 'respuesta7',
                    name: 'respuesta7'
                    },
                    {
                        data: 'eliminar',
                        name: 'eliminar',
                        orderable: false,
                        searchable: false
                    }
                ],
                "language":{
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            },
                            "buttons": {
                                "copy": "Copiar",
                                "colvis": "Visibilidad"
                            }
                            }
            });
    </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
<script src="{{ asset('assets/modal/js/modal.js') }}"></script>
<script src="{{ asset('js/validacionEncuesta.js') }}"></script>
@endsection

@extends('layouts.app')

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background-color: #616A6B">
            <strong>Editar servicio</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
            <form class="form-signin col-md-12" action="/servicio/actualizar" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{$servicio->id}}"/>
                <div class="form-row" >
                    <div class="form-group col-md-4">
                        <label for="">N° del servicio</label>
                        <input value="{{$servicio->id}}" type="text" Readonly class="form-control @error('id') is-invalid @enderror" name="id" id="id">
                        @error('id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                 
                    <div class="form-group col-md-4">
                        <label for="">N° Cotización</label>
                            <select id="idcotizacion"  name= "idcotizacion" class="form-control @error('idcotizacion') is-invalid @enderror" >
                            <option selected>Seleccione</option>
                            @foreach($cotizacion as $key =>$value)
                                <option {{$value->id == $servicio->idcotizacion ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->id}}</option>
                            @endforeach
                        </select>
                            @error('idcotizacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Estado del servicio</label>
                        <select id="idestadoservicio"  name= "idestadoservicio" class="form-control @error('idestadoservicio') is-invalid @enderror" >
                            <option selected>Seleccione</option>
                            @foreach($estadoservicio as $key =>$value)
                                <option {{$value->id == $servicio->idestadoservicio ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->estado}}</option>
                            @endforeach
                        </select>
                        @error('idestadoservicio')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row" >
                    <div class="form-group col-md-6">
                        <label for="">Fecha: fnicio del servicio</label>
                        <input value="{{$servicio->fechainicio}}" type="date" class="form-control @error('fechainicio') is-invalid @enderror" id="fechainicio" name="fechainicio">
                        @error('fechainicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Hora inicial</label>
                        <input type="time" class="form-control" id="horainicio" value="{{ $servicio->horainicio }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Fecha: fin del servicio</label>
                        <input value="{{$servicio->fechafin}}" type="date" class="form-control @error('fechafin') is-invalid @enderror" id="fechafin" name="fechafin" >
                        @error('fechafin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Hora Final</label>
                        <input type="time" class="form-control" id="horafin" value="{{ $servicio->horafin }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col 6">
                        <div class="form-group">
                            <label for="">Máquina</label>
                            <label class="validacion" id="validmaquina"></label>
                            <select class="form-control @error('idmaquina') is-invalid @enderror" name= "idmaquina" id="idmaquina">
                            <option value="0">Seleccione</option>
                            @foreach($maquinaria as $key =>$value)
                                <option {{$value->id == $servicio->idmaquina ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->modelo}}</option>
                            @endforeach
                            </select>
                            <label class="validacion" id="validmaquina2"></label>
                            @error('idmaquina')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Operario 1</label>
                                    <label class="validacion" id="validoperario1"></label>
                                    <select class="form-control @error('idoperario1') is-invalid @enderror" name= "idoperario1" id="idoperario1">
                                    <option value="0">Seleccione operario</option>
                                    <option selected>Seleccione</option>
                                        @foreach($operario as $key =>$value)
                                            <option {{$value->id == $servicio->idoperario1 ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <label class="validacion" id="validoperario12"></label>
                                    @error('idoperario1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Operario 2</label>
                                    <label class="validacion" id="validoperario2"></label>
                                    <select class="form-control @error('idoperario2') is-invalid @enderror" name= "idoperario2" id="idoperario2">
                                    <option value="0">Seleccione operario</option>
                                    @foreach($operario as $key =>$value)
                                            <option {{$value->id == $servicio->idoperario2 ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <label class="validacion" id="validoperario22"></label>
                                    @error('idoperario2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Estado del servicio</label>
                                    <label class="validacion" id="validestadoservicio"></label>
                                    <select class="form-control @error('idestadoservicio') is-invalid @enderror" name= "idestadoservicio" id="idestadoservicio">
                                    <option value="0">Seleccione</option>
                                    @foreach($estadoservicio as $key =>$value)
                                        <option {{$value->id == $servicio->idestadoservicio ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->estado}}</option>
                                    @endforeach
                                    </select>
                                    <label class="validacion" id="validestadoservicio2"></label>
                                    @error('idestadoservicio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Descripción</label>
                                    <label class="validacion" id="valdescripcion"></label>
                                    <textarea name="descripcion" id="descripcion" cols="25" rows="3">{{ $servicio->descripcion }}</textarea>
                                    <label class="validacion" id="valdescripcion2"></label>
                                </div>
                            </div>
                        </div>

                <button type="submit" class="btn btn-success float-right" style="margin-left:10px;">Editar Servicio</button>
                <a href="/servicio/listarservicio" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
<br>

</body>
@endsection

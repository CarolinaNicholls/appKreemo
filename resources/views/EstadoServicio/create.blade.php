@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Crear Estado</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
        <form action="/estadoservicio/guardar" method="POST">
        @csrf
            <div class="row">
            <div class="col-6">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Estado</label>
                        <input type="text" class="form-control @error('estado') is-invalid @enderror"  name="estado" id="estado">
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/estadoservicio" class="btn btn-outline-primary" >Volver</a>
            </form>
        </div>
    </div>
@endsection

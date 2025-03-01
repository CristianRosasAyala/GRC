@extends('layouts.app')

@section('title', 'Crear un cliente')

@section('content')
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
<div class="jumbotron w-100 mx-auto border shadow-lg p-4 mb-4 bg-white">
    <div class="jumbotron h-25 d-flex justify-content-center"><h1>Creación de clientes</h1></div>
    {{ Form::open(array('url' => 'clientes')) }}

    <div class="form-group">
        {{ Form::label('codigo', 'Código') }}
        {{ Form::text('codigo', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('razonsocial', 'Razón social') }}
        {{ Form::text('razonsocial', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('cif', 'CIF/NIF') }}
        {{ Form::text('cif', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('direccion', 'Dirección') }}
        {{ Form::text('direccion', null, array('class' => 'form-control')) }}
    </div>
    
    <div class="form-group">
        {{ Form::label('entidad', 'Entidad') }}
        {{ Form::select('entidad', $entidades->pluck('name', 'id'), null, array('class' => 'form-control',  'placeholder' => 'Selecciona una entidad...')) }}
    </div>

    <div class="form-group">
        {{ Form::label('municipio', 'Municipio') }}
        {{ Form::select('municipios', $municipios->pluck('name', 'id'), null, array('class' => 'form-control',  'placeholder' => 'Selecciona un municipio...')) }}
    </div>

    <div class="form-group">
        {{ Form::label('fechainiciocontrato', 'Fecha inicio de contrato') }}
        {{ Form::date('fechainiciocontrato', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('fechafincontrato', 'Fecha fin de contrato') }}
        {{ Form::date('fechafincontrato', null, array('class' => 'form-control')) }}
    </div> 

    <div class="form-group">
        {{ Form::label('numeroreconocimientoscontratados', 'Reconocimientos a contratar') }}
        {{ Form::number('numeroreconocimientoscontratados', null, array('class' => 'form-control')) }}
    </div>


    <div class="d-flex justify-content-center">
        {{ Form::submit('Crear', array('class' => 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}

</div>
</div>
@endsection
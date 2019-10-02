@extends('layouts.app')

@section('title', 'Clientes')
@section('content')
<div class="container">
    <center>
    <h1>CLIENTES</h1>
<!--    {{$clientes}}-->
    </center>
    
    <table border="0" cellspacing="5" cellpadding="5">
        <tbody>
            <tr>
            <td>Razón social:</td>
<!--            <td><input type="text" id="min" name="min"></td>-->
            <td style="width:350px">
                <select name="razonsocial" id="razonsocial" class="form-control col-md-8"  required>
                    <option value="">Elige una cliente</option>
                    @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->razonsocial }}</option>
                    @endforeach
                </select>
            </td >
            <td>Municipio</td>
            <td style="width:350px">
                <select name="municipio" id="municipio" class="form-control col-md-8" required>
                    <option value="">Elige un municipio</option>
                    @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->municipio }}</option>
                    @endforeach
                </select>
            </td>
            <td style="width:100px">
                <button class='btn btn-primary'>Filtrar</button>
            </td>
        </tr>
    </tbody></table>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Razón Social</th>
                <th>CIF</th>
                <th>Dirección</th>
                <th>Municipio</th>
                <th>Provincia</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Número reconocimientos</th>
                <th>Reconocimiento Completados</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->codigo }}</td>
                <td>{{ $cliente->razonsocial }}</td>
                <td>{{ $cliente->cif }}</td>
                <td>{{ $cliente->direccion }}</td>
                <td>{{ $cliente->municipio }}</td>
                <td>{{ $cliente->provincia }}</td>
                <td>{{ $cliente->fechainiciocontrato }}</td>
                <td>{{ $cliente->fechafincontrato }}</td>
                <td>{{ $cliente->numeroreconocimientoscontratados }}</td>
                <td>{{ $cliente->numeroreconocimientosutilizados }}</td>
                <td><button class="btn"><i class="fas fa-edit"></i></button><button class="btn"><i class="fas fa-trash"></i></button></td>
            </tr>
            
            @endforeach
            
            
        </tbody>
       
    </table>
</div>

<script>
//$(document).ready(function() {
//    $('#example').DataTable();
//} );

</script>
@endsection
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;
use App\Cita;

class Cliente extends Model {

    protected $table = 'clientes';
    protected $fillable = [
        'codigo', 'razonsocial', 'nombre', 'cif', 'direccion', 'municipio', 'fechainiciocontrato', 'fechafincontrato',
        'numeroreconocimientoscontratados',
        'entidad'
    ];

    //Todos los clientes
    public static function allClient() {
        $listado = DB::table('clientes')->join('municipios', 'municipios.id', '=', 'clientes.municipio')
                ->join('entidad', 'entidad.id', '=', 'clientes.entidad')
                ->select('clientes.*', 'municipios.name', 'entidad.name')
                ->get();

        return $listado;
    }
    
    //Solo los clientes con contrato activo.
    public static function onlyActives() {
        $listado = DB::table('clientes')->join('municipios', 'municipios.id', '=', 'clientes.municipio')
                ->join('entidad', 'entidad.id', '=', 'clientes.entidad')
                ->where('clientes.activo',true)
                ->select('clientes.*', 'municipios.name', 'entidad.name')
                ->get();

        return $listado;
    }
    
    //Listado de clientes que su contrato expira dentro de un mes o menos.
    public static function expires() {
        $listado = DB::table('clientes')->join('municipios', 'municipios.id', '=', 'clientes.municipio')
                ->join('entidad', 'entidad.id', '=', 'clientes.entidad')
                ->where([
                    ['clientes.activo', '=', true],
                    ['clientes.fechafincontrato', '<', Carbon::now()->addDays(30)],
                    ['clientes.fechafincontrato', '>', Carbon::now()]
                ])
                ->select('clientes.*', 'municipios.name', 'entidad.name')
                ->get();

        return $listado;
    }
    
    //Cruzamos la tabla de clientes con municipios y entidad.
    public static function clientesConContratoActivo() {
        $listado = DB::table('clientes')->join('municipios', 'municipios.id', '=', 'clientes.municipio')
                ->join('entidad', 'entidad.id', '=', 'clientes.entidad')
                ->where('clientes.activo', true)
                ->select('clientes.*', 'municipios.name', 'entidad.name')
                ->get();

        return $listado;
    }

    //Devolvemos las cabeceras para la tabla
    public static function headers() {
        $listado = array('CIF/NIF', 'Razón social', 'Inicio contrato',
            'Fin contrato', 'R.Contratados', 'R.Utilizados', 'Activo');

        return $listado;
    }

    //Cruzamos la tabla de clientes con municipios y entidad y filtramos por el id.
    public static function getCliente($id) {

        $cliente = DB::table('clientes')->join('municipios', 'municipios.id', '=', 'clientes.municipio')
                ->join('entidad', 'entidad.id', '=', 'clientes.entidad')
                ->where('clientes.id', '=', $id)
                ->select('clientes.*', 'municipios.name', 'entidad.name')
                ->get();

        return $cliente;
    }

    //Revisamos los contratos para cambiarle el estado a activo o quitarselo.
    public static function updateContratosActivos() {
        DB::table('clientes')->where('activo', true)
                ->chunkById(100, function ($clientes) {
                    foreach ($clientes as $cliente) {
                        if (($cliente->numeroreconocimientoscontratados < $cliente->numeroreconocimientosutilizados)
                                OR ( new DateTime($cliente->fechafincontrato) < new DateTime('today'))) {
                            DB::table('clientes')
                            ->where('id', $cliente->id)
                            ->update(['activo' => false]);
                        }
                    }
                });
    }
    
    //Actualizamos el número de reconocimientos en el contrato
    public static function updateBudget($cita) {

        $cliente = Cliente::find($cita->cliente_id);
        $cliente-> numeroreconocimientosutilizados = 
                $cliente->numeroreconocimientosutilizados + $cita->numeroempleadosasistentes;
        $cliente->update();
    }
    

}

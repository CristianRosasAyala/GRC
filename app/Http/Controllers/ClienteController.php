<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Entidad;
use App\Municipio;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Barryvdh\DomPDF\Facade as PDF;

class ClienteController extends Controller {

    /**
     * Default page for showing all the list.
     *
     * @return a view with and the list of the clients.
     */
    public function index() {
        
        //Actualizamos los contratos. Si tarda mucho habrá que ponerlo en otro sitio.
        Cliente::updateContratosActivos();
        
        $clientes = Cliente::onlyActives();
        $headers = Cliente::headers();
        
        return view('clientes.index', compact(['clientes', 'headers']));
    }
    
    public function historical() {
        
        //Actualizamos los contratos. Si tarda mucho habrá que ponerlo en otro sitio.
        Cliente::updateContratosActivos();
        
        $clientes = Cliente::allClient();
        $headers = Cliente::headers();
        
        return view('clientes.index', compact(['clientes', 'headers']));
    }
    
    public function expires() {
        
        //Actualizamos los contratos. Si tarda mucho habrá que ponerlo en otro sitio.
        Cliente::updateContratosActivos();
        
        $clientes = Cliente::expires();
        $headers = Cliente::headers();
        
        return view('clientes.index', compact(['clientes', 'headers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return a view
     */
    public function create() {
        auth()->user()->authorizeRoles(['admin','secretario']);
        $entidades = Entidad::all('name', 'id');
        $municipios = Municipio::all('name','id','estado_id');
        return view('clientes.create', compact(['entidades','municipios']));
    }

    /**
     * Save the specified resource.
     *
     * @return Response
     */
    public function store() {

        
        auth()->user()->authorizeRoles(['admin','secretario']);
        $rules = array(
            'codigo' => 'required|alpha_num|unique:clientes|max:190',
            'razonsocial' => 'required|unique:clientes|max:190',
            'cif' => 'required|alpha_num|unique:clientes|max:15',
            'direccion' => 'required|max:100',
            'municipios' => 'max:100',
            'entidades' => 'max:100',
            'fechainiciocontrato' => 'required|date',
            'fechafincontrato' => 'required|date|after:fechainiciocontrato',
            'numeroreconocimientoscontratados' => 'required|numeric'
        );
        $validator = \Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('clientes/create')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            
            $cliente = new Cliente();

            $cliente->codigo = Input::get('codigo');
            $cliente->razonsocial = Input::get('razonsocial');
            $cliente->cif = Input::get('cif');
            $cliente->direccion = Input::get('direccion');
            $cliente->municipio = Input::get('municipios');
            $cliente->entidad = Input::get('entidad');
            $cliente->fechainiciocontrato = Input::get('fechainiciocontrato');
            $cliente->fechafincontrato = Input::get('fechafincontrato');
            $cliente->numeroreconocimientoscontratados = Input::get('numeroreconocimientoscontratados');
            $cliente->activo = true;
            $cliente->save();

            \Session::flash('message', '¡Cliente creado!');
            return \Redirect::to('clientes');
        }
    }

    /**
     * Show the specified resource.
     *
     * @param  int $id
     * @return a view.
     */
    public function show($id) {
        $cliente = Cliente::getCliente($id)[0];

    // Recuperar el nombre de la entidad del cliente
    $entidad = Entidad::find($cliente->entidad);
    if ($entidad) {
        $cliente->entidad = $entidad->name;
    } else {
        $cliente->entidad = 'No especificado'; // O manejar el caso en que no se encuentre la entidad
    }

    // Recuperar el nombre del municipio del cliente
    $municipio = Municipio::find($cliente->municipio);
    if ($municipio) {
        $cliente->municipio = $municipio->name;
    } else {
        $cliente->municipio = 'No especificado'; // O manejar el caso en que no se encuentre el municipio
    }
        
        
        
        return view('clientes.show')->with('cliente', $cliente);
    }

    /**
     * Return the view of the specified resource to edit.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        auth()->user()->authorizeRoles(['admin','secretario']);
        $cliente = Cliente::getCliente($id)[0];
        $entidades = Entidad::all('name', 'id');
        $municipios = Municipio::all('name','id','estado_id');
        return view('clientes.edit', compact(['cliente','entidades','municipios']));
        //return view("clientes.edit")->with('cliente', $cliente[0]);
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        auth()->user()->authorizeRoles(['admin','secretario']);
        $rules = array(
            'codigo' => 'required|alpha_num|max:190|unique:clientes,codigo,' . $id . ',id',
            'razonsocial' => 'max:190|unique:clientes,razonsocial,' . $id . ',id',
            'cif' => 'alpha_num|max:15|unique:clientes,cif,' . $id . ',id',
            'direccion' => 'required|max:100',
            'municipios' => 'max:100',
            'entidades' => 'max:100',
            'fechainiciocontrato' => 'required|date',
            'fechafincontrato' => 'required|date|after:fechainiciocontrato',
            'numeroreconocimientoscontratados' => 'required|numeric'
        );

        $validator = Validator(Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('clientes/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            Cliente::where('id', $id)
                    ->update(
                            [
                                'codigo' => Input::get('codigo'),
                                'razonsocial' => Input::get('razonsocial'),
                                'cif' => Input::get('cif'),
                                'direccion' => Input::get('direccion'),
//                               'municipio' => Input::get('municipios'),
//                               'entidad' => Input::get('entidad'),
                                'fechainiciocontrato' => Input::get('fechainiciocontrato'),
                                'fechafincontrato' => Input::get('fechafincontrato'),
                                'numeroreconocimientoscontratados' => Input::get('numeroreconocimientoscontratados')
            ]);

            dd('todofine');
            \Session::flash('message', 'Cliente actualizado');
            return \Redirect::to('clientes');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        auth()->user()->authorizeRoles(['admin']);
        $cliente = Cliente::find($id);
        $cliente->delete();

        \Session::flash('message', 'El cliente ' . $cliente->codigo . ' ha sido eliminado.');
        return \Redirect::to('clientes');
    }

    /**
     * Return a list with the recurses.
     *
     * @param  int  $id
     * @return list of the clients.
     */
    public function clientslist() {
        $clientes = Cliente::all();
        return $clientes;
    }
    
    /**
     * 
     *
     * @return a view with and the list of the clients.
     */
    public function clientepdf($id)
{        
    // Obtener el cliente desde la base de datos
    $cliente = Cliente::getCliente($id)[0];

    // Recuperar el nombre de la entidad del cliente
    $entidad = Entidad::find($cliente->entidad);
    if ($entidad) {
        $cliente->entidad = $entidad->name;
    } else {
        $cliente->entidad = 'No especificado'; // O manejar el caso en que no se encuentre la entidad
    }

    // Recuperar el nombre del municipio del cliente
    $municipio = Municipio::find($cliente->municipio);
    if ($municipio) {
        $cliente->municipio = $municipio->name;
    } else {
        $cliente->municipio = 'No especificado'; // O manejar el caso en que no se encuentre el municipio
    }

    // Generar el PDF utilizando la vista "clientes.pdf" y los datos del cliente
    $pdf = PDF::loadView("clientes.pdf", compact('cliente'));
    return $pdf->download("cliente".$cliente->codigo."".$cliente->razonsocial.".pdf");
}

}

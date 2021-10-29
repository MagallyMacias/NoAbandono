<?php

namespace App\Http\Controllers\Director\puesto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Puesto;
use App\Docente;
use App\PuestoAsignado;
class PuestoController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->autorizarPuestos('Director'); 
    	$puestos = Puesto::paginate(5);
    	return view('director.docente.puestos.puesto_index')->with(compact('puestos'));
    }

    public function create(Request $request)
    {
        $request->user()->autorizarPuestos('Director'); 
    	return view('director.docente.puestos.puesto_create');
    }

    public function store(Request $request)
    {
    	$rules = [
    		'puesto' => 'required|unique:puestos',
    		'descripcion' => 'required|max:100',
    	];

    	$message = [
    		'puesto.required' => 'Debes agregar un nombre para el puesto',
    		'puesto.unique' => 'Este puesto ya ha sido agregada',
    		'descripcion.required' => 'Debes de agregar una descripción para el puesto',
            'descripcion.max' => 'La descripción tiene un max de 100 caracteres',
    	];

    	$this->validate($request,$rules,$message);
    	//dd($request->all());    	
    	$puesto = new Puesto;
    	$puesto->puesto = $request->input('puesto');
    	$puesto->descripcion = $request->input('descripcion');
    	$puesto->save();
    	$mensaje = 'Se ha creado un nuevo puesto exitosamente';
    	return back()->with(compact('mensaje'));
    }

    public function edit(Request $request,$id)
    {
        $request->user()->autorizarPuestos('Director'); 
    	$puesto = Puesto::find($id);
    	return view('director.docente.puestos.puesto_edit')->with(compact('puesto'));
    }

    public function update(Request $request , $id)
    {
    	$rules = [
    		'puesto' => 'required',
    		'descripcion' => 'required',
    	];

    	$message = [
    		'puesto.required' => 'Debes agregar un nombre para el puesto',
    		'descripcion.required' => 'Debes de agregar una descripción para el puesto'
    	];

    	$this->validate($request,$rules,$message);
    	//dd($request->all());
    	$puesto = Puesto::find($id);
    	$puesto->puesto = $request->input('puesto');
    	$puesto->descripcion = $request->input('descripcion');
    	$puesto->save();
    	$mensaje = 'Se ha actualizado el puesto '.$puesto->puesto.' exitosamente';
    	return redirect('/director/puestos/index')->with(compact('mensaje'));
    }

    public function destroy($id)
    {
    	$puesto = Puesto::find($id);
        if ($puesto->docentes()) {
            PuestoAsignado::where('puesto_id',$puesto->id)->delete();
        }
    	$puesto->delete();
    	$eliminado = 'Se ha eliminado el puesto ' .$puesto->puesto;
    	return back()->with(compact('eliminado'));
    }

    public function show(Request $request,$id)
    {
        $request->user()->autorizarPuestos('Director'); 
        $puesto = Puesto::find($id);
        $docentes = Docente::all();
        return view('director.docente.puestos.puesto_show')->with(compact('puesto','docentes'));
    }

    public function agregarPuesto(Request $request, $id)
    {
        $puesto = Puesto::find($id);
        $puesto_asignado = new PuestoAsignado;
        $puesto_asignado->docente_id = $request->input('docente_id');
        $puesto_asignado->puesto_id = $puesto->id;
        $puesto_asignado->save();
        $mensaje = 'Se ha  asignado el puesto '.$puesto->puesto.' para el docente exitosamente';
        return back()->with(compact('mensaje'));
    }

    public function eliminarPuesto($puesto_id , $docente_id)
    {        
        $puesto = Puesto::find($puesto_id);
        $puesto->docentes()->detach($docente_id);
        $eliminado = 'Se ha quitado el puesto del docente exitosamente';
        return back()->with(compact('eliminado'));
    }
}

<?php

namespace App\Http\Controllers\Director\docente;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Docente;
use App\Puesto;
use App\Materia;
use App\B_Domicilio;
use App\Imparte;
use App\PuestoAsignado;
use Auth;

class DocenteController extends Controller
{
    public function index(Request $request)
    {                   
        $request->user()->autorizarPuestos('Director'); 
        $docentes = Docente::orderBy('name')->paginate(10);
        return view('director.docente.docente_index')->with(compact('docentes'));        
    }

    public function create (Request $request)
    {   
        $request->user()->autorizarPuestos('Director');
    	return view('director.docente.docente_create');
    }

    public function store(Request $request)
    {
    	//Reglas de validacion
    	$rules = [
    		'name' => 'required|min:4', 
            'apellidoP' => 'required', 
            'apellidoM' => 'required', 
            'edad' => 'required|numeric|min:18|max:80' , 
            'email' => 'required|email|unique:docentes|max:255' , 
            'password' => 'required|string|min:6|confirmed' , 
            'telefono_fijo' => 'required', 
            'telefono_cel' => 'required' ,             
    	];

    	$messages = [
    		'name.required' => 'Debes de colocar un nombre',
    		'apellidoP.required' => 'Debes de colocar un apellido paterno',
    		'apellidoM.required' => 'Debes de colocar un apellido materno',
    		'edad.required' => 'Debes de colocar la edad',    		
    		'edad.min' => 'La edad minima es 18 años',
            'edad.max' => 'La edad maxima es 80 años',
    		'email.required' => 'Debes de colocar un correo electronico',
    		'email.email' => 'Solo se aceptan correos electronicos',
    		'email.unique' => 'Este correo electronico ya esta utilizado en otro docente',
    		'password.required' => 'Debes de colocar una contraseña',
    		'password.min' => 'La contraseña debe tener por lo menos 6 digitos',
    		'password.confirmed' => 'La contraseña no coinciden',
    		'telefono_fijo.required' => 'Debes de colocar un teléfono fijo',
    		'telefono_cel.required' => 'Debes de colocar un teléfono celular',
    	];
    	
    	$this->validate($request,$rules,$messages); //Ejecutamos las reglas de validacion
    	//dd($request->all()); Observamos que el formulario este mandando los datos correctamente        
        //Creamos un objeto de la clase docente
        $docente = new Docente;
        //pasamos los datos en los campos seleccionados
        $docente->name = $request->input('name');
        $docente->apellidoP = $request->input('apellidoP');
        $docente->apellidoM = $request->input('apellidoM');
        $docente->edad = $request->input('edad');
        $docente->email = $request->input('email');
        $docente->telefono_fijo = $request->input('telefono_fijo');
        $docente->telefono_cel = $request->input('telefono_cel');                  
        $docente->password = Hash::make($request->input('password'));        
        //$docente->password = bcrypt($request->input('password'));
        $docente->remember_token = str_random(100);
        $docente->save();

        $mensaje = 'Se ha agregado un nuevo docente llamado: ' . $docente->name . ' ¿Quieres registrar otro docente? ';
        return back()->with(compact('mensaje'));
    	//$table->rememberToken();
    }

    public function edit(Request $request, $id)
    {   
        $request->user()->autorizarPuestos('Director');
        $docente = Docente::find($id);         
        return view('director.docente.docente_edit')->with(compact('docente'));
    }

    public function update(Request $request, $id)
    {
        //Reglas de validacion
        $rules = [
            'name' => 'required|min:4', 
            'apellidoP' => 'required', 
            'apellidoM' => 'required', 
            'edad' => 'required|numeric|min:18|max:80' , 
            'email' => 'required|email|max:255' , 
            'password' => 'confirmed' , 
            'telefono_fijo' => 'required', 
            'telefono_cel' => 'required' ,             
        ];

        $messages = [
            'name.required' => 'Debes de colocar un nombre',
            'apellidoP.required' => 'Debes de colocar un apellido paterno',
            'apellidoM.required' => 'Debes de colocar un apellido materno',
            'edad.required' => 'Debes de colocar la edad',          
            'edad.min' => 'La edad minima es 18 años',
            'edad.max' => 'La edad maxima es 80 años',
            'email.required' => 'Debes de colocar un correo electronico',
            'email.email' => 'Solo se aceptan correos electronicos',            
            //'password.required' => 'Debes de colocar una contraseña',
            //'password.min' => 'La contraseña debe tener por lo menos 6 digitos',
            'password.confirmed' => 'La contraseña no coinciden',
            'telefono_fijo.required' => 'Debes de colocar un teléfono fijo',
            'telefono_cel.required' => 'Debes de colocar un teléfono celular',
        ];

        $this->validate($request,$rules,$messages);
        $docente = Docente::find($id); 
        $docente->name = $request->input('name');
        $docente->apellidoP = $request->input('apellidoP');
        $docente->apellidoM = $request->input('apellidoM');
        $docente->edad = $request->input('edad');
        $docente->email = $request->input('email');
        $docente->telefono_fijo = $request->input('telefono_fijo');
        $docente->telefono_cel = $request->input('telefono_cel');                  
        if ($request->password) { //Si existe un dato en el input password
            $docente->password = Hash::make($request->input('password')); //Lo registramos y lo encriptamos
        }        
        //$docente->password = bcrypt($request->input('password'));
        $docente->remember_token = str_random(100); //Genera un token 
        $docente->save(); //Actualiza los datos
        $mensaje = 'Datos actualizados del docente ' . $docente->name;
        return redirect('/director/docentes/index')->with(compact('mensaje'));
    }

    public function destroy ($id)
    {
        $docente = Docente::find($id);        
        if ($docente->domicilios) {
            B_Domicilio::where('docente_id',$docente->id)->delete();
        }
        if ($docente->puestos()) {
            PuestoAsignado::where('docente_id',$docente->id)->delete();
        }
        if ($docente->materias()) {
            Imparte::where('docente_id',$docente->id)->delete();
        }
        $docente->delete(); //Eliminamos al docente
        $eliminado = 'Se ha eliminado el docente '.$docente->name;
        return back()->with(compact('eliminado'));

    }

    public function show(Request $request, $id)
    {
        $request->user()->autorizarPuestos('Director');
        $docente= Docente::find($id); //Encontramos al docente para ver los datos generales       
        return view('director.docente.docente_show')->with(compact('docente')); //pasamos la variable a la vista
    }
    
}

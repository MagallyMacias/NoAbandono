<?php

namespace App\Http\Controllers\Alumno\Entrevista_fresca;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OtrasActividades;
use Auth;

class OtrasActividadesController extends Controller
{
    public function create()
    {
    	return view('alumno.entrevista_fresca.otras_actividades');
    }

    public function store(Request $request)
    {
    	$rules = [

    		'respuesta1' => 'required',
    		'respuesta2' => 'required',
    		'respuesta3' => 'required',
    		'respuesta4' => 'required'
    	];

    	$message = [
    		'respuesta1.required' => 'Este campo es obligatorio',
    		'respuesta2.required' => 'Este campo es obligatorio',
    		'respuesta3.required' => 'Este campo es obligatorio',
    		'respuesta4.required' => 'Este campo es obligatorio',
    	];

    	$this->validate($request,$rules,$message);

    	$actividades = new OtrasActividades;
    	$actividades->entrevista_id = auth()->user()->entrevista_fresca->id;
    	$actividades->respuesta1 = $request->input('respuesta1');        
        $actividades->respuesta2 = $request->input('respuesta2');
        $actividades->respuesta3 = $request->input('respuesta3');
        $actividades->respuesta4 = $request->input('respuesta4');
        $actividades->save();
        if (Auth::user()->entrevista_fresca->datoFamiliar && Auth::user()->entrevista_fresca->datoAcademico && 
            Auth::user()->entrevista_fresca->habitoEstudio &&  Auth::user()->entrevista_fresca->otraActividad &&  
            Auth::user()->entrevista_fresca->datosAdicionales)
        {
            $entrevista_fresca = new EntrevistaAlumnoController();
            $entrevista_fresca->update();
            $mensaje = 'Has finalizado la encuesta "Entrevista fresca". Gracias por compartir esta información eres lo más importante para nosotros.';      
            return redirect('/alumno/encuestas')->with(compact('mensaje'));
        }else{
            $mensaje = 'Has realizado la entrevista';
            return redirect('/alumno/entrevista')->with(compact('mensaje'));
        }        
    }
}

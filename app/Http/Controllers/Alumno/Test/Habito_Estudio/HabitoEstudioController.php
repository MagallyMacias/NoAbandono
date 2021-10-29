<?php

namespace App\Http\Controllers\Alumno\Test\Habito_Estudio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test_Habito_Estudio;
use Carbon\Carbon;
use Auth;

class HabitoEstudioController extends Controller
{
    public function index()
    {        
        //dd(Auth::user()->test->test_habito_estudio);
    	return view('alumno.test.habitos_estudio.habitos_estudio_index');
    }

    public function store()
    {
    	$habito_estudio = new Test_Habito_Estudio;
    	$habito_estudio->fecha_aplicacion = null;
        $habito_estudio->descripcion = 'Inicio habito de estudio';
        $habito_estudio->test_id = auth()->user()->test->id;
        $habito_estudio->save();   
        $mensaje = 'Por favor realiza las siguientes secciones';
        return redirect('alumno/test/habitos_estudio')->with(compact('mensaje'));    
    }

    public function inicio_habito_estudio()
    {
        $habito_estudio = new Test_Habito_Estudio;
        $habito_estudio->fecha_aplicacion = null;
        $habito_estudio->descripcion = 'Inicio habito de estudio';
        $habito_estudio->test_id = auth()->user()->test->id;
        $habito_estudio->save();           
    }

    public function update()
    {        
        $habito_estudio = Test_Habito_Estudio::where('test_id', auth()->user()->test->id)->first();
        $habito_estudio->fecha_aplicacion = Carbon::now();
        $habito_estudio->descripcion = 'Finalizo habito de estudio';        
        $habito_estudio->save();        
    }
}

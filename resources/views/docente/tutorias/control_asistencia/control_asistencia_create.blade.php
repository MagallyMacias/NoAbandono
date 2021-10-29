@extends('layouts.app')

@section('titulo','Registrar asistencia de tutorias')

@section('body-class','profile-page sidebar-collapse')

@section('opciones_director')
@if(Auth::user()->materias()->where('name','like','%tutorias%')->first() && 
Auth::user()->puestos->where('puesto','Tutor Escolar')->first())
	@include('includes.links_tutor')
@endif
<a  class="dropdown-item" href="{{url('docente')}}">Panel de control</a>
@endsection

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/mexico.png')}} '); "></div>
<div class="main main-raised">
	<div class="container">
		<div class="row">
			<div class="col-12">
				@if (session('mensaje'))
		         <div class="alert alert-success text-left mt-4">
		            <div class="container-fluid">
		              <div class="alert-icon">
		                <i class="material-icons">check</i>
		              </div>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true"><i class="material-icons">clear</i></span>
		              </button>
		              {{ session('mensaje') }}
		            </div>
		          </div>
		        @endif
				@if($errors->any())
			      <div class="alert alert-danger mt-4">
			        <div class="container-fluid">                     
			          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			            <span aria-hidden="true"><i class="material-icons">clear</i></span>
			          </button>
			          <ul>    
			            @foreach($errors->all() as $error)                        
			            <li>{{$error}}</li>
			            @endforeach
			          </ul>
			        </div>
			      </div>
			    @endif 
				<h2 class="title text-center" style="color: black;">Registrar  Asistencia</h2>
				<form method="post" action="{{url('docente/tutorias/asistencia')}}">

					{{csrf_field()}}
					<div class="row mb-5">						

					    <div class="col-md-4">
					      <label class="text-dark">Fecha</label>
					      <input  type="date" class="form-control mb-3" name="fecha"
								  value="{{old('fecha')}}">
					    </div>

					    <div class="col-md-4">
					      <label class="text-dark">Nombre del Alumno</label>
					      <select class="form-control  mb-3" name="alumno_id">
					      	@foreach($alumnos as $alumno)
						        <option value="{{ $alumno->nia }}"
						        	@if(old('alumno_id') == "{$alumno->nia }") selected @endif 
						        	>
						        	{{ $alumno->name }} {{ $alumno->apellidoP }} {{ $alumno->apellidoM }}
						        </option>
					        @endforeach
					      </select>
					    </div>								
					    
					    <!--<div class="col-md-4">
					      <label class="text-dark">Grupo</label>
					      <select class="form-control" name="grupo_id">
					      	@foreach($grupos as $grupo)
					        	<option value="{{$grupo->id}}" @if($alumno) {{$grupo->id}} @endif>
					        		{{$grupo->name}} {{$grupo->grado}} {{$grupo->grupo}}
					        	</option>       
					        @endforeach
					      </select>
					    </div>-->

					    <div class="col-md-2">
					      	<label class="text-dark">Atención oportuna</label><br>
					      	<div class="form-check form-check-radio form-check-inline">
							  <label class="form-check-label" style="color: black;">
							    <input class="form-check-input" type="radio" name="atencion_oportuna" value="Si"
							    	@if(old('atencion_oportuna') == "Si") checked @endif 
							    >
							    Si
							    <span class="circle">
							        <span class="check"></span>
							    </span>
							  </label>
							</div>
							<div class="form-check form-check-radio form-check-inline">
							  <label class="form-check-label" style="color: black;">
							    <input class="form-check-input" type="radio" name="atencion_oportuna" value="No"
							    	@if(old('atencion_oportuna') == "No") checked @endif 
							    >
							    No
							    <span class="circle">
							        <span class="check"></span>
							    </span>
							  </label>
							</div>							
					    </div>

					    <div class="col-md-2">
					      	<label class="text-dark">Atención de seguimiento</label><br>
					      	<div class="form-check form-check-radio form-check-inline">
							  <label class="form-check-label" style="color: black;">
							    <input class="form-check-input" type="radio" name="atencion_seguimiento" value="Si"
							    	@if(old('atencion_seguimiento') == "Si") checked @endif
							    >
							    Si
							    <span class="circle">
							        <span class="check"></span>
							    </span>
							  </label>
							</div>
							<div class="form-check form-check-radio form-check-inline">
							  <label class="form-check-label" style="color: black;">
							    <input class="form-check-input" type="radio" name="atencion_seguimiento" value="No"
							    	@if(old('atencion_seguimiento') == "No") checked @endif
							    >
							    No
							    <span class="circle">
							        <span class="check"></span>
							    </span>
							  </label>
							</div>							
					    </div>
					    					 
					    <div class="col-md-4">
					      <label class="text-dark">Caso o situación atendida</label>					      
					      <textarea class="form-control" rows="2" name="caso_situacion_atendida">{{old('caso_situacion_atendida')}}</textarea>
					    </div>

					    <div class="col-md-4">
					      <label class="text-dark">Solución</label>					      
					      <textarea class="form-control" rows="2" name="solucion">{{old('solucion')}}</textarea>
					    </div>					   

				      	<div class="col-md-4">
					      <label class="text-dark">Indicaciones posteriores</label>					      
					      <textarea class="form-control" rows="2" name="indicaciones_posteriores">{{old('indicaciones_posteriores')}}</textarea>
					    </div>
					</div>				
					<div class="text-center">
						<button class="btn btn-success" type="submit">Agregar registro</button>
						<a href="{{url('/docente/tutorias/asistencia')}}" class="btn btn-danger">Cancelar</a>		
					</div>
				</form>						   					
			</div>
		</div>             	
	</div>              	
</div>
@include('includes.footer')
@endsectionreporte_tutorias_create.blade.php
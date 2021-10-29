@extends('layouts.app')

@section('titulo','Planificación')

@section('body-class','profile-page sidebar-collapse')

@section('opciones_alumno')
<a href="{{url('alumno')}}" class="dropdown-item">Panel de control</a>
@endsection

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/mexico.png')}} '); "></div>
<div class="main main-raised">
	<div class="container">             
		<div class="section">		   
			<h2 class="title text-center" style="margin-bottom: 30px;">Planificación</h2>
			<h4 style="margin-bottom: 20px;" class="text-justify"><b>Instrucciones:</b> Lee cuidadosamente las siguientes 
			afirmaciones y marca la respuesta si, con base en tu experiencia, son falsas o verdaderas.</h4>				
			<form method="post" action="{{url('alumno/test/habitos_estudio/planificacion')}}">
				{{ csrf_field() }} 
				<div class="table-responsive" style="width: 90%; margin: auto;">       												
					<table class="table table-bordered">				
						<tbody>							
							<!--R1-->
							<tr>							
								<td>1. No acostumbro planificar el tiempo que voy a dedicar al estudio.</td>
								<td class="text-center">
									<div class="form-check form-check-radio form-check-inline">
									  <label class="form-check-label" style="color: black;">
									    <input class="form-check-input" type="radio" name="respuesta1" value="V"
									    	@if(old('respuesta1') == "V") checked @endif
									    >
									    V
									    <span class="circle">
									        <span class="check"></span>
									    </span>
									  </label>
									</div>
									<div class="form-check form-check-radio form-check-inline">
									  <label class="form-check-label" style="color: black;">
									    <input class="form-check-input" type="radio" name="respuesta1" value="F"
									    	@if(old('respuesta1') == "F") checked @endif
									    >
									    F
									    <span class="circle">
									        <span class="check"></span>
									    </span>
									  </label>
									</div><br>
									@if ($errors->has('respuesta1'))
										<span class="help-block text-danger">
											<strong>{{ $errors->first('respuesta1') }}</strong>
										</span>
									@endif									
								</td>							
							</tr>
							<!--R2-->
							<tr>							
								<td>2. Cuando tengo un plan o propósito de estudio generalmente no lo cumplo.</td>
								<td class="text-center">
									<div class="form-check form-check-radio form-check-inline">
									  <label class="form-check-label" style="color: black;">
									    <input class="form-check-input" type="radio" name="respuesta2" value="V"
									    	@if(old('respuesta2') == "V") checked @endif
									    >
									    V
									    <span class="circle">
									        <span class="check"></span>
									    </span>
									  </label>
									</div>
									<div class="form-check form-check-radio form-check-inline">
									  <label class="form-check-label" style="color: black;">
									    <input class="form-check-input" type="radio" name="respuesta2" value="F"
									    	@if(old('respuesta2') == "F") checked @endif
									    >
									    F
									    <span class="circle">
									        <span class="check"></span>
									    </span>
									  </label>
									</div><br>
									@if ($errors->has('respuesta2'))
										<span class="help-block text-danger">
											<strong>{{ $errors->first('respuesta2') }}</strong>
										</span>
									@endif									
								</td>							
							</tr>
							<!--R3-->
							<tr>							
								<td>3. Normalmente no termino los trabajos a tiempo.</td>
								<td class="text-center">
									<div class="form-check form-check-radio form-check-inline">
									  <label class="form-check-label" style="color: black;">
									    <input class="form-check-input" type="radio" name="respuesta3" value="V"
									    	@if(old('respuesta3') == "V") checked @endif
									    >
									    V
									    <span class="circle">
									        <span class="check"></span>
									    </span>
									  </label>
									</div>
									<div class="form-check form-check-radio form-check-inline">
									  <label class="form-check-label" style="color: black;">
									    <input class="form-check-input" type="radio" name="respuesta3" value="F"
									    	@if(old('respuesta3') == "F") checked @endif
									    >
									    F
									    <span class="circle">
									        <span class="check"></span>
									    </span>
									  </label>
									</div><br>
									@if ($errors->has('respuesta3'))
										<span class="help-block text-danger">
											<strong>{{ $errors->first('respuesta3') }}</strong>
										</span>
									@endif									
								</td>							
							</tr>
							<!--R4-->
							<tr>							
								<td>4. El sueño y el cansancio me impiden estudiar con eficacia.</td>
								<td class="text-center">
									<div class="form-check form-check-radio form-check-inline">
									  <label class="form-check-label" style="color: black;">
									    <input class="form-check-input" type="radio" name="respuesta4" value="V"
									    	@if(old('respuesta4') == "V") checked @endif
									    >
									    V
									    <span class="circle">
									        <span class="check"></span>
									    </span>
									  </label>
									</div>
									<div class="form-check form-check-radio form-check-inline">
									  <label class="form-check-label" style="color: black;">
									    <input class="form-check-input" type="radio" name="respuesta4" value="F"
									    	@if(old('respuesta4') == "F") checked @endif
									    >
									    F
									    <span class="circle">
									        <span class="check"></span>
									    </span>
									  </label>
									</div><br>
									@if ($errors->has('respuesta4'))
										<span class="help-block text-danger">
											<strong>{{ $errors->first('respuesta4') }}</strong>
										</span>
									@endif									
								</td>							
							</tr>
							<!--R5-->
							<tr>							
								<td>5. Cuando estudio tengo que estarme levantando, ya que no tengo todo <br>el material que voy a usar a la mano.</td>
								<td class="text-center">
									<div class="form-check form-check-radio form-check-inline">
									  <label class="form-check-label" style="color: black;">
									    <input class="form-check-input" type="radio" name="respuesta5" value="V"
									    	@if(old('respuesta5') == "V") checked @endif
									    >
									    V
									    <span class="circle">
									        <span class="check"></span>
									    </span>
									  </label>
									</div>
									<div class="form-check form-check-radio form-check-inline">
									  <label class="form-check-label" style="color: black;">
									    <input class="form-check-input" type="radio" name="respuesta5" value="F"
									    	@if(old('respuesta5') == "F") checked @endif
									    >
									    F
									    <span class="circle">
									        <span class="check"></span>
									    </span>
									  </label>
									</div><br>
									@if ($errors->has('respuesta5'))
										<span class="help-block text-danger">
											<strong>{{ $errors->first('respuesta5') }}</strong>
										</span>
									@endif									
								</td>							
							</tr>																	
						</tbody>
					</table>
				</div>
				<div class="text-center">
					<button class="btn btn-success">Finalizar</button>
					<a href="{{url('/alumno/test/habitos_estudio')}}" class="btn btn-danger">Cancelar</a> 
				</div>
			</form>                  
		</div>              
	</div>
</div>
@include('includes.footer')
@endsection

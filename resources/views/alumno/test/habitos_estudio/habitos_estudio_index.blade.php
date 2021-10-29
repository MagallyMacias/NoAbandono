@extends('layouts.app')

@section('titulo','Habitos de estudio')

@section('body-class','profile-page sidebar-collapse')

@section('opciones_alumno')
<a href="{{url('alumno/encuestas')}}" class="dropdown-item">Panel de entrevistas</a>
<a href="{{url('alumno')}}" class="dropdown-item">Panel de control</a>
@endsection

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/mexico.png')}} ');"></div>
<div class="main main-raised">
  <div class="profile-content">
    <div class="container">      
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="profile" style="margin: 20px;">                                                     
          </div>
        </div>        
      </div>
      @if (session('mensaje'))
        <div class="alert alert-success text-left">
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
      <div class="row "> 
        @if(Auth::user()->test->test_habito_estudio->organizacion_tiempo &&  Auth::user()->test->test_habito_estudio->planificacion && Auth::user()->test->test_habito_estudio->estrategias_aprendizaje)
          <div class="col-12 text-center">
            <form method="post" action="{{url('alumno/test/finalizar/habitos_estudio')}}">
              {{csrf_field()}}
              <div class="text-center col-12">
                  <button class="btn btn-success" style="margin-bottom: 1px;">Finalizar Habitos de estudio</button>
                  <a href="{{url('/alumno/test')}}" style="margin-top: 10px;" class="btn btn-danger">Regresar</a>
              </div>
            </form>            
          </div>
        @else     
        <div style="margin-top: 20px;" class="col-12">                                                    
            <ol start="1">
              @if(empty(Auth::user()->test->test_habito_estudio->organizacion_tiempo))                                         
              <li><a href="{{url('alumno/test/habitos_estudio/organizacion_tiempo')}}">Organización de tiempo</a></li>               
              @else
              <li><a disabled="true">Organización de tiempo</a></li>
              @endif
              @if(empty(Auth::user()->test->test_habito_estudio->planificacion))
              <li><a href="{{url('alumno/test/habitos_estudio/planificacion')}}">Planificación</a></li>               
              @else              
              <li><a disabled="true">Planificación</a></li>
              @endif
              @if(empty(Auth::user()->test->test_habito_estudio->estrategias_aprendizaje))
              <li><a href="{{url('alumno/test/habitos_estudio/estrategia_aprendizaje')}}">Estrategias de aprendizaje</a></li>        
              @else
              <li><a disabled="true">Estrategias de aprendizaje</a></li>
              @endif
            </ol>                            
            <div class="col-12 text-center">
              <a href="{{url('/alumno/test')}}" style="margin-top: 10px;" class="btn btn-danger">Regresar</a> 
            </div>         
          </div>
        </div>                            
        @endif
      </div>
    </div>
  </div>
  @include('includes.footer')
  @endsection

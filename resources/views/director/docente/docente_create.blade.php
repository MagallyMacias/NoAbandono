@extends('layouts.app')

@section('titulo','Agregar Docente')

@section('body-class','profile-page sidebar-collapse')

@section('opciones_director')    

  @include('includes.links_director')
  <a href="{{url('docente')}}">Panel de control</a>  

@endsection

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/mexico.png')}} ');"></div>
<div class="main main-raised">
  <div class="container">             
    <div class="section">
      <h2 class="title text-center" style="color:black;">Registrar nuevo Docente</h2><br>
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
      <form method="post" action="/director/docente">
        {{ csrf_field() }}

        <div class="row">            
          <div class="col-sm-4">
            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
              <label class="text-dark">Nombre(s)</label>
              <input type="text" class="form-control"  
                     placeholder="Escribe un nombre/s" 
                     value="{{ old('name') }}" 
                     name="name"
              >
            </div>
            @if ($errors->has('name'))
              <span class="help-block text-danger">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
          </div>

          <div class="col-sm-4">
            <div class="form-group {{ $errors->has('apellidoP') ? ' has-error' : '' }}">
              <label class="text-dark">Apellido Paterno</label>
              <input type="text" class="form-control"  
                     placeholder="Escribe un apellido paterno" 
                     value="{{ old('apellidoP') }}" 
                     name="apellidoP"
              >                     
            </div>
            @if ($errors->has('apellidoP'))
              <span class="help-block text-center text-danger">
                <strong>{{ $errors->first('apellidoP') }}</strong>
              </span>
            @endif
          </div>

          <div class="col-sm-4">
            <div class="form-group {{ $errors->has('apellidoM') ? ' has-error' : '' }}">
              <label class="text-dark">Apellido Materno</label>
              <input type="text" class="form-control" 
                     placeholder="Escribe un apellido materno" 
                     value="{{ old('apellidoM') }}"
                     name="apellidoM"
              >
            </div>
            @if ($errors->has('apellidoM'))
              <span class="help-block text-center text-danger">
                <strong>{{ $errors->first('apellidoM') }}</strong>
              </span>
            @endif
          </div>                      

          <div class="col-sm-4">
            <div class="form-group {{ $errors->has('edad') ? ' has-error' : '' }}">
              <label class="text-dark">Edad</label>
              <input type="number" class="form-control" 
                     placeholder="Escribe una edad" 
                     value="{{ old('edad') }}"
                     name="edad"
              >
            </div>
            @if ($errors->has('edad'))
              <span class="help-block text-center text-danger">
                <strong>{{ $errors->first('edad') }}</strong>
              </span>
            @endif
          </div>

          <div class="col-sm-4 ">
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
              <label class="text-dark">Correo electronico</label>
              <input type="email" class="form-control" 
                     placeholder="Escribe un correo electr??nico" 
                     value="{{ old('email') }}"
                     name="email">
            </div>
            @if ($errors->has('email'))
              <span class="help-block text-center text-danger">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>

          <div class="col-sm-4">
            <div class="form-group {{ $errors->has('telefono_fijo') ? ' has-error' : '' }}">
              <label class="text-dark">Tel??fono fijo</label>
              <input type="tel" class="form-control" 
                     pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                     placeholder="Formato: 123-123-1234" 
                     value="{{ old('telefono_fijo') }}"
                     name="telefono_fijo"
              >
            </div>
            @if ($errors->has('telefono_fijo'))
              <span class="help-block text-center text-danger">
                <strong>{{ $errors->first('telefono_fijo') }}</strong>
              </span>
            @endif
          </div>                  

          <div class="col-sm-4">
            <div class="form-group {{ $errors->has('telefono_cel') ? ' has-error' : '' }}">
              <label class="text-dark">Telefono celular</label>
              <input type="tel" class="form-control" 
                     pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                     placeholder="Formato: 123-123-1234"
                     value="{{ old('telefono_cel') }}"
                     name="telefono_cel">
            </div>
            @if ($errors->has('telefono_cel'))
              <span class="help-block text-center text-danger">
                <strong>{{ $errors->first('telefono_cel') }}</strong>
              </span><br>
            @endif  
              <small>Formato para tel??fono fijo y celular : <b class="text-danger">123-123-1234</b></small> <br>      
              <small>Si solamente tiene un numero telef??nico, col??calo en las dos opciones</small>  
          </div>

          <div class="col-sm-4">
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
              <label class="text-dark">Contrase??a</label>
              <input type="password" class="form-control" 
                     placeholder="Escribe una contrase??a"
                     name="password" 
                     value="secret"
              >
            </div>
            @if ($errors->has('password'))
              <span class="help-block text-center text-danger">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>

          <div class="col-sm-4">
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
              <label class="text-dark">Confirmar contrase??a</label>
              <input type="password" class="form-control"  
                     placeholder="Confirmar contrase??a" 
                     name="password_confirmation"
                     value="secret"
              >
              <small  class="form-text text-muted">La contrase??a por defecto es <b class="text-danger">secret</b></small>              
            </div>                          
          </div>                 
        </div>          
        <div class="col-sm-12 col-md-12 text-center">
            <button class="btn btn-success">Registrar docente</button>
            <a href="{{url('/director/docentes/index')}}" class="btn btn-danger">Cancelar</a>
        </div>
      </form>                  
    </div>              
  </div>
</div>
@include('includes.footer')
@endsection

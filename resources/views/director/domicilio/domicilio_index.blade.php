@extends('layouts.app')

@section('titulo','Listado de domicilios')

@section('body-class','profile-page sidebar-collapse')

@section('opciones_director')    

  @include('includes.links_director')
  <a href="{{url('docente')}}" class="dropdown-item">Panel de control</a>  

@endsection

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/mexico.png')}} ');"></div>
<div class="main main-raised">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3 class="title">Listado de Domicilios</h3>
        <!--Si existe un mensaje, mostrara el contenido del mensaje-->
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
        <!--Si existe un de la variable eliminado, mostrara el contenido del de la variable eliminado-->           
        @if (session('eliminado'))
            <div class="alert alert-danger text-left">
                <div class="container-fluid">
                  <div class="alert-icon">
                    <i class="material-icons">check</i>
                  </div>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                  </button>
                  {{ session('eliminado') }}
                </div>
            </div>
        @endif  
        <a href="{{url('/director/domicilio/create')}}" class="btn btn-primary" style="margin-bottom: 30px;">
          Agregar nuevo Domicilio
        </a>
        <table class="table  table-responsive-sm table-responsive-md table-responsive-lg">
          <thead>
              <tr>
                  <th class="text-center">Codigo Postal</th>
                  <th>Estado</th>
                  <th>Municipio</th>
                  <th>Calle</th>                      
                  <th class="text-center">Colonia</th>
                  <th class="text-center">No Exterior</th>
                  <th class="text-center">No Interior</th>
                  <th class="text-center">Opciones</th>
              </tr>
          </thead>
          @foreach($domicilios as  $domicilio)
          <tbody>
              <tr>
                  <td class="text-center">{{$domicilio->cp}}</td>
                  <td>{{$domicilio->estado}}</td>
                  <td>{{$domicilio->municipio}}</td>
                  <td>{{$domicilio->calle}}</td>                  
                  <td class="text-center">{{$domicilio->colonia}}</td>
                  <td class="text-center">{{$domicilio->no_exterior}}</td>
                  <td class="text-center">{{$domicilio->no_interior}}</td>
                  <td class="td-actions">
                      <form method="post" action="{{url('/director/domicilio/'.$domicilio->id.'/delete')}}">
                        {{csrf_field()}}
                       
                        <a href="{{url('/director/domicilio/'.$domicilio->id.'/edit')}}" 
                        rel="tooltip" title="Editar Domicilio" class="btn btn-success btn-fab btn-fab-mini btn-rect btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="submit" rel="tooltip" title="Eliminar Domicilio" class="btn btn-danger btn-fab btn-fab-mini btn-rect btn-sm">
                            <i class="fa fa-times"></i>
                        </button>
                      </form>
                  </td>
              </tr>                 
          </tbody>
          @endforeach
        </table>    
        <div class="d-flex">
            <div class="mx-auto">
              {{ $domicilios->links("pagination::bootstrap-4") }}
            </div>
        </div> 
      </div>
    </div>                                  
  </div>
</div>
@include('includes.footer')
@endsection

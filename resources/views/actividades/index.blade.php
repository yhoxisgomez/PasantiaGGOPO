@extends('adminlte::page')
@section('title', 'Actividad')


@if(Session::has('Mensaje')){{
  Session::get('Mensaje')
}}
@endif
@section('content')
    <a class="btn btn-app" href="{{url('actividades/create')}}"><i class="fa fa-plus-circle"></i>Añadir</a>
      
  @foreach ($actividades as $act)    
    <div class="card">
      <div class="card-header">     
          <p>{{$act->fecha}}</p><bn>
          <small><strong>Usuario: </strong> {{ auth()->user()->name }}</small>
          <h6><strong>ASUNTO: </strong>{{$act->asunto}}</h6>
      </div>
      <div class="card-body">
            <h6 class="card-title"><strong>Unidad responsable:</strong> {{$act->und_respon}} </h6><bn>
            <p class="card-text"><strong>Actividad: </strong>{{$act->actividad}}</p><bn>
            <div class="row">
              <div class="col-xs-6">                 
                <a class="btn btn-app" href="{{url('/actividades/'.$act->id.'/edit')}}"><i class="fa fa-edit"></i></a>
              </div>
              <div class="col-xs-6">
                <form method="POST" action="{{url('/actividades/'.$act->id)}}">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <button class= "btn btn-app" type="submit" onclick="return confirm('¿Borrar?');"><i class="fa fa-trash-alt"></i></button>
                </form>
              </div>
            </div>
      </div>
    </div>         
 @endforeach 

@endsection

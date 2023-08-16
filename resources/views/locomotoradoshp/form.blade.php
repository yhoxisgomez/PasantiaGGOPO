    <form class="form-horizontal" method="post">
<div class="row">

      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        <label for="fecha" class="control-label"> {{'Fecha'}}</label>
            <input type="date" class="form-control" name="fecha" id="fecha" required value="{{ old('scheduled_date', date('Y-m-d')) }}">
        </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                 <label for="cant_disponible">{{'Cantidad Disponible'}}</label>
                 <input class="form-control" name="cant_disponible" id="cant_disponible" value="{{isset($locomotora2hp->cant_disponible)?$locomotora2hp->cant_disponible:''}}">

              </div>
         </div>



         </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
               <button type="submit" class="btn btn-app" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}"> <i class="fa fa-save"></i>Guardar</button>
              <a class="btn btn-app" href="{{url('locomotoradoshp')}}"><i class="fa fa-arrow-alt-circle-left"></i>{{'Regresar'}}</a><bn><bn>
          </div>
    </form>

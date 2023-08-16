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
                 <label for="cant_disponible_pto">{{'Cantidad Disponible Pto Ordaz'}}</label>
                 <input class="form-control" name="cant_disponible_pto" id="cant_disponible_pto" value="{{isset($locomotora4hp->cant_disponible_pto)?$locomotora4hp->cant_disponible_pto:''}}">

              </div>
         </div>

         <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
               <label for="cant_disponible_mina">{{'Cantidad Disponible Mina'}}</label>
               <input class="form-control" name="cant_disponible_mina" id="cant_disponible_mina" value="{{isset($locomotora4hp->cant_disponible_mina)?$locomotora4hp->cant_disponible_mina:''}}">

            </div>
       </div>



         </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
               <button type="submit" class="btn btn-app" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}"> <i class="fa fa-save"></i>Guardar</button>
              <a class="btn btn-app" href="{{url('locomotoracuatrohp')}}"><i class="fa fa-arrow-alt-circle-left"></i>{{'Regresar'}}</a><bn><bn>
          </div>
    </form>

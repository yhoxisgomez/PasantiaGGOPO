    <form class="form-horizontal" method="post">
<div class="row">

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
           <label for="flotaLocomotora4HP_actual" class="control-label"> {{'Flota Actual de Locomotoras 4000 HP'}}</label>
           <input class="form-control" name="flotaLocomotora4HP_actual" id="flotaLocomotora4HP_actual" value="{{isset($FlotaActual->flotaLocomotora4HP_actual)?$FlotaActual->flotaLocomotora4HP_actual:''}}">
        </div>
     </div>

     <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
           <label for="flotaLocomotora2HP_actual" class="control-label"> {{'Flota Actual de Locomotoras 2000 HP'}}</label>
           <input class="form-control" name="flotaLocomotora2HP_actual" id="flotaLocomotora2HP_actual" value="{{isset($FlotaActual->flotaLocomotora2HP_actual)?$FlotaActual->flotaLocomotora2HP_actual:''}}">
        </div>
     </div>

     <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
           <label for="flotaVagonesTolva_actual" class="control-label"> {{'Flota Actual de Vagones Tolva'}}</label>
           <input class="form-control" name="flotaVagonesTolva_actual" id="flotaVagonesTolva_actual" value="{{isset($FlotaActual->flotaVagonesTolva_actual)?$FlotaActual->flotaVagonesTolva_actual:''}}">
        </div>
     </div>

     <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
           <label for="flotaVagonesGondola_actual" class="control-label"> {{'Flota Actual de Vagones Gondola'}}</label>
           <input class="form-control" name="flotaVagonesGondola_actual" id="flotaVagonesGondola_actual" value="{{isset($FlotaActual->flotaVagonesGondola_actual)?$FlotaActual->flotaVagonesGondola_actual:''}}">
        </div>
     </div>


</div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
               <button type="submit" class="btn btn-app" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}"> <i class="fa fa-save"></i>Guardar</button>
              <a class="btn btn-app" href="{{url('FlotaActual')}}"><i class="fa fa-arrow-alt-circle-left"></i>{{'Regresar'}}</a><bn><bn>
          </div>
    </form>

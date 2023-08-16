    <form class="form-horizontal" method="post">
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <label for="fecha_vaciado">{{'Fecha'}}</label>
              <input type="date" class="form-control" name="fecha_vaciado" id="fecha_vaciado" required value="{{ old('scheduled_date', date('Y-m-d')) }}">
        </div>
   </div>



   <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
       <label for="turno">{{'Turno'}}</label>
       <select class="form-control" name="turno" id="turno" value="{{isset($vagones->turno)?$vagones->turno:''}}">
         <option value="1">{{'1'}}</option>
         <option value="2">{{'2'}}</option>
         <option value="3">{{'3'}}</option>
       </select>
    </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
       <label for="cant_disponible_tolva">{{'Cantidad de Vagones Tolvas Disponibles'}}</label>
       <input class="form-control" name="cant_disponible_tolva" id="cant_disponible_tolva" value="{{isset($vagones->cant_disponible_tolva)?$vagones->cant_disponible_tolva:''}}">

    </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
       <label for="cant_disponible_gondola">{{'Cantidad de Vagones Gondolas Disponibles'}}</label>
       <input class="form-control" name="cant_disponible_gondola" id="cant_disponible_gondola" value="{{isset($vagones->cant_disponible_gondola)?$vagones->cant_disponible_gondola:''}}">

    </div>
</div>

        <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                 <label for="cant_tolva_vaciado">{{'Cantidad de Tolvas Vaciadas'}}</label>
                 <input class="form-control" name="cant_tolva_vaciado" id="cant_tolva_vaciado" value="{{isset($vagones->cant_tolva_vaciado)?$vagones->cant_tolva_vaciado:''}}">

              </div>
         </div>

         <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
               <label for="cant_gondola_volteado">{{'Cantidad de Gondolas Volteadas'}}</label>
               <input class="form-control" name="cant_gondola_volteado" id="cant_gondola_volteado" value="{{isset($vagones->cant_gondola_volteado)?$vagones->cant_gondola_volteado:''}}">

            </div>
       </div>


         </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
               <button type="submit" class="btn btn-app" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}"> <i class="fa fa-save"></i>Guardar</button>
              <a class="btn btn-app" href="{{url('vagones')}}"><i class="fa fa-arrow-alt-circle-left"></i>{{'Regresar'}}</a><bn><bn>
          </div>
    </form>

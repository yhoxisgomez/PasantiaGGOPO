    <form class="form-horizontal" method="post">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
    <label for="nombre" class="control-label"> {{'Nombre Barco'}}</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{isset($barco->nombre)?$barco->nombre:''}}">
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        <label for="fecha_inicio">{{'Fecha Inicio de Carga'}}</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required value="{{ old('scheduled_date', date('Y-m-d')) }}">
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        <label for="fecha_fin">{{'Fecha Final de Carga'}}</label>
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required value="{{ old('scheduled_date', date('Y-m-d')) }}">
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
           <label for="turno_inicio">{{'Turno Inicial'}}</label>
           <select class="form-control" name="turno_inicio" id="turno_inicio" value="{{isset($barco->turno)?$barco->turno:''}}">
             <option value="1">{{'1'}}</option>
             <option value="2">{{'2'}}</option>
             <option value="3">{{'3'}}</option>
           </select>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
           <label for="turno_fin">{{'Turno Final'}}</label>
           <select class="form-control" name="turno_fin" id="turno_fin" value="{{isset($barco->turno)?$barco->turno:''}}">
             <option value="1">{{'1'}}</option>
             <option value="2">{{'2'}}</option>
             <option value="3">{{'3'}}</option>
           </select>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
           <label for="lugar_carga">{{'Muelle'}}</label>
           <select class="form-control" name="lugar_carga" id="lugar_carga" value="{{isset($barco->lugar_carga)?$barco->lugar_carga:''}}">
             <option value="Palua">{{'Palua'}}</option>
             <option value="Puerto Ordaz">{{'Puerto Ordaz'}}</option>
             <option value="BGDII">{{'BGDII'}}</option>
           </select>
        </div>
   </div>
   <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
       <label for="tipo_barco">{{'Tipo de Barco'}}</label>
       <select class="form-control" name="tipo_barco" id="tipo_barco" value="{{isset($barco->tipo_barco)?$barco->tipo_barco:''}}">
         <option value="Exportacion">{{'Exportación'}}</option>
         <option value="Acarreo">{{'Acarreo'}}</option>

       </select>
    </div>
</div>

         <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
               <label for="toneladas_fmo">{{'Toneladas FMO'}}</label>
               <input class="form-control" name="toneladas_fmo" id="toneladas_fmo" value="{{isset($barco->toneladas_fmo)?$barco->toneladas_fmo:''}}">

            </div>
       </div>

       <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
           <label for="toneladas_cliente">{{'Toneladas Cliente'}}</label>
           <input class="form-control" name="toneladas_cliente" id="toneladas_cliente" value="{{isset($barco->toneladas_cliente)?$barco->toneladas_cliente:''}}">

        </div>
   </div>



</div>

          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
               <button type="submit" class="btn btn-app" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}"> <i class="fa fa-save"></i>Guardar</button>
              <a class="btn btn-app" href="{{url('barco')}}"><i class="fa fa-arrow-alt-circle-left"></i>{{'Regresar'}}</a><bn><bn>
          </div>
    </form>

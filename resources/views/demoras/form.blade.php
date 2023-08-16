<div class="row">

  <div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group">
  <label for="fecha" class="control-label"> {{'Fecha'}}</label>
      <input type="date" class="form-control" name="fecha" id="fecha" required value="{{ old('scheduled_date', date('Y-m-d')) }}">
  </div>
  </div>



<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <label for="turno" class="control-label"> {{'Turno'}}</label>
    <select type="number" class="form-control" name="turno" id="s" placeholder="cantidad" value="{{isset($demoras->turno)?$demoras->turno:''}}">
	<option value="1">{{'1'}}</option>
	<option value="2">{{'2'}}</option>
	<option value="3">{{'3'}}</option>
    </select>
    </div>
</div>

  <div class="col-xs-6 col-sm-6 col-md-6">
 <div class="form-group">
<label for="departamento" class="control-label"> {{'Departamento'}}</label>
    <input type="text" class="form-control" name="departamento" id="departamento" placeholder="FFCC, PMH" value="{{isset($demoras->departamento)?$demoras->departamento:''}}">
    </div>
</div>



<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
<label for="descripcion" class="control-label"> {{'Descripcion'}}</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción" value="{{isset($demoras->descripcion)?$demoras->descripcion:''}}">
    </div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-app" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}"> <i class="fa fa-save"></i>Guardar</button>
             <a class="btn btn-app" href="{{url('demoras')}}"><i class="fa fa-arrow-alt-circle-left"></i>{{'Regresar'}}</a><bn><bn>
</div>


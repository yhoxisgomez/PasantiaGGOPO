<div class="card-body">
<form class="form-horizontal " method="POST">

<div class="row">

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="fecha" class="control-label"> {{'Fecha'}}</label>
            <input type="date" class="form-control" name="fecha" id="fecha" required value="{{ old('scheduled_date', date('Y-m-d')) }}">
        </div>
    </div>


    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="asunto" class="control-label"> {{'Asunto'}}</label>
            <select class="form-control" name="asunto" id="asunto">
              <option value="Normal">{{'Normal'}}</option>
              <option value="Importante">{{'Importante'}}</option>
              <option value="Urgente">{{'Urgente'}}</option>
            </select>
        </div>
    </div>


    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="und_respon" class="control-label"> {{'Unidad responsable'}}</label>
            <select class="form-control" name="und_respon" id="und_respon">
              <option value="FFCC">{{'Ferrocarril'}}</option>
              <option value="PMH">{{'Procesamiento de Mineral de Hierro'}}</option>
            </select>
        </div>
    </div>


    <div class="col-xs-6 col-sm-6 col-md-6">
         <div class="form-group">
            <label for="actividad" class="control-label"> {{'Actividad'}}</label>
            <textarea type="text" class="form-control" name="actividad" id="actividad" value="{{isset($actividades->actividad)?$actividades->actividad:''}}"></textarea>
        </div>
    </div>
</form>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-app" id="btn" value="{{$Modo=='crear' ? 'Agregar':'Actualizar'}}"><i class="fa fa-save"></i>Guardar</button>
    <a class="btn btn-app" href="{{url('actividades')}}"><i class="fa fa-arrow-alt-circle-left"></i>{{'Regresar'}}</a>
</div>

</div>
</section></form></div>

    <form class="form-horizontal" method="post">
<div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                 <label for="nombre">{{'Nombre de Cliente'}}</label>
                 <input class="form-control" name="nombre" id="nombre" value="{{isset($clientes->nombre)?$clientes->nombre:''}}">
              </div>
         </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                 <label for="tipo_cliente">{{'Tipo de Cliente'}}</label>
                 <select class="form-control" name="tipo_cliente" id="tipo_cliente" value="{{isset($clientes->tipo_cliente)?$clientes->tipo_cliente:''}}">
                   <option value="Nacional">{{'Nacional'}}</option>
                   <option value="Internacional">{{'Internacional'}}</option>
                 </select>
              </div>
         </div>


         </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
               <button type="submit" class="btn btn-app" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}"> <i class="fa fa-save"></i>Guardar</button>
              <a class="btn btn-app" href="{{url('clientes')}}"><i class="fa fa-arrow-alt-circle-left"></i>{{'Regresar'}}</a><bn><bn>
          </div>
    </form>

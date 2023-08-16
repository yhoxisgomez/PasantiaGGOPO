    <form class="form-horizontal" method="post">
<div class="row">

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
            <label for="cliente_id">{{'Nombre de Cliente'}}</label>

            <select class="form-control" name="cliente_id" id="cliente_id">

                @foreach($clientes as $it)
                {{$selected = $it['id'] == $value_form['cliente_id']?'selected':'' }}
                <option value="{{$it['id']}}" {{$selected}} >{{$it['nombre']}}</option>

                @endforeach

                </select>

            </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        <label for="mineral_id">{{'Mineral'}}</label>

        <select class="form-control" name="mineral_id" id="mineral_id">

            @foreach($mineral as $it)
            {{$selected = $it['id'] == $value_form['mineral_id']?'selected':'' }}
            <option value="{{$it['id']}}" {{$selected}} >{{$it['nombre']}}</option>

            @endforeach

            </select>

            </div>
    </div>


    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        <label for="fecha">{{'Fecha'}}</label>
            <input type="date" class="form-control" name="fecha" id="fecha" required value="{{ old('scheduled_date', date('Y-m-d')) }}">
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
           <label for="turno">{{'Turno'}}</label>
           <select class="form-control" name="turno" id="turno" value="{{isset($despachos->turno)?$despachos->turno:''}}">
             <option value="1">{{'1'}}</option>
             <option value="2">{{'2'}}</option>
             <option value="3">{{'3'}}</option>
           </select>
        </div>
   </div>


     <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                 <label for="lugar">{{'Lugar'}}</label>
                 <select class="form-control" name="lugar" id="lugar" value="{{isset($despachos->lugar)?$despachos->lugar:''}}">
                   <option value="Mina">{{'Mina'}}</option>
                   <option value="PMH">{{'PMH'}}</option>
                 </select>
              </div>
     </div>

     <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
               <label for="vagones">{{'Vagones'}}</label>
               <input class="form-control" name="vagones" id="vagones" value="{{isset($despachos->vagones)?$despachos->vagones:''}}">
            </div>
     </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="toneladas">{{'Toneladas'}}</label>
            <input class="form-control" name="toneladas" id="toneladas" value="{{isset($despachos->toneladas)?$despachos->toneladas:''}}">
        </div>
   </div>



</div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
               <button type="submit" class="btn btn-app" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}"> <i class="fa fa-save"></i>Guardar</button>
              <a class="btn btn-app" href="{{url('despachos')}}"><i class="fa fa-arrow-alt-circle-left"></i>{{'Regresar'}}</a><bn><bn>
          </div>

</form>

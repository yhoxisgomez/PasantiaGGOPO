<form class="form-horizontal" method="post">
    @csrf
<div class="row">

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <label for="fecha_llegada">{{'Fecha LLegada'}}</label>
              <input type="date" class="form-control" name="fecha_llegada" id="fecha_llegada" required value="{{ old('scheduled_date', date('Y-m-d')) }}">
        </div>
   </div>

<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
       <label for="turno">{{'Turno'}}</label>
       <select class="form-control" name="turno" id="turno" value="{{isset($tren->turno)?$tren->turno:''}}">
         <option value="1">{{1}}</option>
         <option value="2">{{2}}</option>
         <option value="3">{{3}}</option>
       </select>
    </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
       <label for="numero">{{'Numero de Tren'}}</label>
       <select class="form-control" name="numero" id="numero" value="{{isset($tren->numero)?$tren->numero:''}}">
        <option value="1">{{1}}</option>
        <option value="2">{{2}}</option>
        <option value="3">{{3}}</option>
        <option value="4">{{4}}</option>
        <option value="5">{{5}}</option>
        <option value="6">{{6}}</option>
      </select>

    </div>

</div>


<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" id="registro" class="btn btn-app"> <i class="fa fa-book"></i>Registrar contenido</button>

</div>

<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <label for="contenido">{{'Contenido'}}</label>
        <select class="form-control" name="contenido" id="contenido" value="{{isset($tren->contenido)?$tren->contenido:''}}">



        </select>

    </div>
</div>


       </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
               <button type="submit" class="btn btn-app" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}"> <i class="fa fa-save"></i>Guardar</button>
              <a class="btn btn-app" href="{{url('tren')}}"><i class="fa fa-arrow-alt-circle-left"></i>{{'Regresar'}}</a><bn><bn>
          </div>
    </form>

@section('extra-scripts')

    <script>
         console.log("Clicked! CONTENIDO");

         $('#registro').click(function (evt) {
            evt.preventDefault();
            console.log("DENTRO");

        let numero = $('#numero').val();
        let array = [];

        console.log("numero de tren " + numero);

        console.log(numero % 2);
        $('#contenido').empty();

        if((numero % 2) == 0){

            console.log("par");

            $('#contenido').append(`

                <option value="Extra Cargado">{{'Extra Cargado'}}</option>
                <option value="Cargado">{{'Cargado'}}</option>


            `)

        }
        else{

            console.log("impar");

            $('#contenido').append(`

                <option value="Extra Vacío">{{'Extra Vacío'}}</option>
                <option value="Vacío">{{'Vacío'}}</option>


            `)


        }





});



    </script>

@endsection




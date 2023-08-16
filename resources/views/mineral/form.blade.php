    <form class="form-horizontal" method="post">
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
           <label for="tipo_mineral">{{'Tipo de Mineral'}}</label>
           <select class="form-control" name="tipo_mineral" id="tipo_mineral" value="{{isset($mineral->tipo_mineral)?$mineral->tipo_mineral:''}}">
             <option value="Fino">{{'Fino'}}</option>
             <option value="Grueso">{{'Grueso'}}</option>
             <option value="Pella">{{'Pella'}}</option>
           </select>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">

    <div class="form-group">
       <label for="nombre">{{'Nombre del Mineral'}}</label>
       <select class="form-control" name="nombre" id="nombre" value="{{isset($mineral->nombre)?$mineral->nombre:''}}">
         <option value="FPF">{{'FPF'}}</option>
         <option value="FPF">{{'FSF'}}</option>
         <option value="FSI">{{'FSI'}}</option>
         <option value="UltraFino">{{'Ultra Fino'}}</option>
         <option value="FinoPalua">{{'Fino Palua'}}</option>
         <option value="FinoNoConforme">{{'Fino No Conforme'}}</option>
         <option value="GSIC1">{{'GSIC1'}}</option>
         <option value="GA">{{'GA'}}</option>
         <option value="GF">{{'GF'}}</option>
         <option value="GFP">{{'GFP'}}</option>
         <option value="PM7">{{'PM7'}}</option>
         <option value="PSIO">{{'PSIO'}}</option>
         <option value="HBI">{{'HBI'}}</option>

       </select>
    </div>


         </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
               <button type="submit" class="btn btn-app" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}"> <i class="fa fa-save"></i>Guardar</button>
              <a class="btn btn-app" href="{{url('mineral')}}"><i class="fa fa-arrow-alt-circle-left"></i>{{'Regresar'}}</a><bn><bn>
          </div>
    </form>

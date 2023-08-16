
<form class="form-horizontal" method="post">
    <center><h2>Asignar un Rol</h2></center><br>
    <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                     <label for="name">{{'Nombre de Usuario'}}</label>
                     <input class="form-control" name="nombre" id="nombre" value="{{isset($usuarios->name)?$usuarios->name:''}}">
                  </div>
             </div>
             <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                   <label for="email">{{'Email'}}</label>
                   <input class="form-control" name="email" id="email" value="{{isset($usuarios->email)?$usuarios->email:''}}">
                </div>
           </div>

           <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
               <label for="password">{{'Contraseña'}}</label>
               <input class="form-control" name="password" id="password" value="{{isset($usuarios->password)?$usuarios->password:''}}">

            </div>
           </div>

           <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
               <label for="rol_id">{{'Rol'}}</label>
               <select class="form-control" name="rol_id" id="rol_id">
                    @foreach($rol as $it)

                    {{$selected = $it['id'] == $value_form['rol_id']?'selected':'' }}

                    <option value="{{$it['id']}}" {{$selected}} >{{$it['id']}}</option>

                    @endforeach
               </select>
            </div>
           </div>

             </div>
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                   <button type="submit" class="btn btn-app" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}"> <i class="fa fa-save"></i>Guardar</button>
                  <a class="btn btn-app" href="{{url('usuarios')}}"><i class="fa fa-arrow-alt-circle-left"></i>{{'Regresar'}}</a><bn><bn>
              </div>
        </form>




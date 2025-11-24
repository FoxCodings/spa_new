@extends('app')

@section('content')
<style media="screen">
.card-title.collapsed {
  font-size: 10pt !important;
  padding: 10px 15px !important;
}
div#collapseusuarios .col-lg-6 {
  margin: 3px 0px;
}
.checkbox-list .checkbox {
  margin-bottom: 5px !important;
}
.card-body .form-group {
  margin: 0;
}
.todosNinguno{
  margin-bottom: 10px !important;
}
.todos, .ninguno{
  margin-left: 15px;
}
</style>
<div class="card card-custom">
  <div class="card-header">
    <div class="card-title">
      <span class="card-icon"><i class="flaticon-users-1 text-primary"></i></span>
        <h3 class="card-label">{{ isset($rol) ? "Editar Rol " . $rol->nombre : "Nuevo rol" }}</h3>
    </div>
  </div>
  <form class=" needs-validation" novalidate>
  <div class="card-body">

      <div class="card-body" style="padding-top: 0; padding-bottom: 20px;">
        <div class="form-group row" >
          <div class="col-lg-6">
            <label>Nombre:</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escribe el nombre" value="@isset($rol) {{$rol->name}} @endisset" required/>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre
              </div>
          </div>

        </div>
        <div role="separator" class="dropdown-divider"></div>

        <div class="form-group row" style="margin-top: 10px;">
          @foreach(obtenerModulosActivos() as $values)
          <div class="col-lg-4">
            <label><strong>{{$values->get('titulo')}}</strong></label>
            <div class="form-group">
              @foreach($permisos as $permiso)
                @if($values->get('alias') == $permiso->modulo)
                <div class="checkbox-list">
                    <label class="checkbox">
                        <input type="checkbox" value="{{ $permiso->id }}" @isset($permises)  @foreach($permises as $permise) @if($permise->permission_id == $permiso->id) checked @endif @endforeach  @endisset  name="page">
                        <span></span>
                        {{ $permiso->name }}
                    </label>
                </div>
                @endif
              @endforeach
            </div>
          </div>
          @endforeach
        </div>

      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-lg-6">
            <a href="/usuarios/roles" class="btn btn-secondary">
              <i class="flaticon2-back"></i> Cancelar
            </a>
          </div>
          <div class="col-lg-6 text-right">
            <a class="btn btn-primary mr-2" onclick="agregarPermisos()">
              <i class="flaticon2-user"></i>
              {{ isset($rol) ? "Guardar" : "Crear" }}
            </a>
          </div>
        </div>
      </div>
    <!-- </form> -->
  </div>
  </form>
</div>
<script>





function agregarPermisos(){

var nombre = $('#nombre').val();

var selected = [];
var objFiguras = {};
    $(":checkbox[name=page]").each(function(){
        if (this.checked) {

          //console.log($(this).val());
          objFiguras = {
              permisos: $(this).val(),
            }

            /////////////////////////////////////////////////////
            selected.push(objFiguras);
          //  console.log(objFiguras,selected);
        }
    });

@isset($rol)
var id = {{$rol->id}};
@else
var id = 0;
@endisset

if (nombre == '' || selected == '') {

  var form = document.querySelectorAll('.needs-validation')
  Array.prototype.slice.call(form)
    .forEach(function (form) {
      form.addEventListener('click', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    });
}else{
  ///////////////////////////////////////////////////////7
  $.ajax({

         type:"{{ ( isset($rol) ? 'PUT' : 'POST' ) }}", //si existe esta variable usuarios se va mandar put sino se manda post

         url:"{{ ( isset($rol) ) ? '/usuarios/roles/' . $rol->id : '/usuarios/roles/create' }}", //si existe usuarios manda la ruta de usuarios el id del usario sino va mandar usuarios crear
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
         },
         data:{
           id: id,
           nombre: nombre,
           permisos: selected,


         },
          success:function(data){
            if (data.success == 'Se Agrego Satisfactoriamente') {
              Swal.fire({
                        title: "",
                        text: data.success,
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false,
                    }).then(function(result) {
                        if (result.value == true) {
                             $('#nombre').val('');

                        }else{
                          location.href ="/usuarios/roles"; //esta es la ruta del modulo
                        }
                    })

            }else if(data.success == 'Ha sido editado con éxito'){
              Swal.fire({
                        title: "",
                        text: data.success,
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false,
                    }).then(function(result) {
                        if (result.value == true) {
                             $('#nombre').val('');

                        }else{
                          location.href ="/usuarios/roles"; //esta es la ruta del modulo
                        }
                    })
            }else{

            }



          }
    });

  /////////////////////////////////////////////////////////
}





}
</script>
@endsection

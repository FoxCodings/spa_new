@extends('app')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">

  Usuarios @isset($usuarios)editar @else nuevo @endisset
</h3>
<div class="card-toolbar">
<div class="example-tools justify-content-center">

</div>
</div>
</div>
<form class=" needs-validation" novalidate>
<div class="card-body">


        <div class="row">
          <div class="col-md-3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Nombre: </label>
              <input type="text" class="form-control" id="nombre" value="@isset($usuarios) {{ $usuarios->nombre }} @endisset" placeholder="Nombre de la Persona" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre
              </div>
          </div>
          <div class="col-md-3">
              <label for="inputPassword4" style="font-size:12px;" class="form-label">Apellido Paterno: </label>
              <input type="text" class="form-control" id="apellido_paterno" value="@isset($usuarios) {{ $usuarios->apellido_paterno }} @endisset" placeholder="Apellido Paterno" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Apellido Paterno
              </div>
          </div>
          <div class="col-md-3">
              <label for="inputPassword4" style="font-size:12px;" class="form-label">Apellido Materno: </label>
              <input type="text" class="form-control" id="apellido_materno" value="@isset($usuarios) {{ $usuarios->apellido_materno }} @endisset" placeholder="Apellido Materno" >
          </div>

          <div class="col-md-3">
              <label for="inputPassword4" style="font-size:12px;" class="form-label">Tipo usuario: </label>
              <select class="form-control" id="tipo_usuario" required>
                @isset($usuarios)
                  <option value="{{$usuarios->tipo_usuario}}">{{$usuarios->obtenerUser->name}}</option>
                @else
                  <option value="">Seleccionar opción</option>
                @endisset


                @foreach($roles as $rol)
                  <option value="{{$rol->id}}">{{$rol->name}}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">
                Por Favor Seleccione Rol
              </div>

          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Nombre usuario: </label>
              <input type="text" class="form-control" id="name" value="@isset($usuarios) {{ $usuarios->name }} @endisset" placeholder="Nombre usuario" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre Usuario
              </div>
          </div>
          <div class="col-md-3">
              <label for="inputPassword4" style="font-size:12px;" class="form-label">Correo Eléctronico: </label>
              <input type="email" class="form-control" id="email" value="@isset($usuarios) {{ $usuarios->email }} @endisset" placeholder="Correo Eléctronico" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Correo Eléctronico
              </div>
          </div>
          <div class="col-md-3">
              <label for="inputPassword4" style="font-size:12px;" class="form-label">Password: </label>
              <input type="text" class="form-control" id="password" value="@isset($usuarios){{$usuarios->password_name}}@endisset" placeholder="Password" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Password
              </div>
          </div>
        </div>

</div>
<div class="card-footer">

  <a href="/usuarios" class="btn btn-default">Regresar</a>

  <a class="btn btn-primary " onclick="guardar()">Guardar</a>
</div>
</form>
</div>
<script type="text/javascript">

function guardar(){

  //console.log('entro')

    var nombre = $('#nombre').val();
    var apellido_paterno = $('#apellido_paterno').val();
    var apellido_materno = $('#apellido_materno').val();
    var tipo_usuario = $('#tipo_usuario').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();

    if (tipo_usuario == '' || email == '' || password == '' || nombre == '' || apellido_paterno == '') {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var form = document.querySelectorAll('.needs-validation')
      //console.log(form)
      // Loop over them and prevent submission
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

             type:"{{ ( isset($usuarios) ? 'PUT' : 'POST' ) }}", //si existe esta variable usuarios se va mandar put sino se manda post

             url:"{{ ( isset($usuarios) ) ? '/usuarios/' . $usuarios->id : '/usuarios/create' }}", //si existe usuarios manda la ruta de usuarios el id del usario sino va mandar usuarios crear
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
             },
             data:{
               nombre: nombre,
               apellido_paterno: apellido_paterno,
               apellido_materno: apellido_materno,
               tipo_usuario: tipo_usuario,
               name: name,
               email: email,
               password: password,
             },
              success:function(data){
                if (data.success == 'Se Agrego Satisfactoriamente') {
                  // Swal.fire({
                  //       title: "Excelente",
                  //       text: data.success,
                  //       icon: "success",
                  //       buttonsStyling: false,
                  //       showCancelButton: true,
                  //       confirmButtonText: "Continuar Registrando",
                  //       cancelButtonText: "No,Gracias",
                  //       customClass: {
                  //         confirmButton: "btn btn-success btn-sm",
                  //         cancelButton: "btn btn-danger btn-sm"
                  //       }
                  //   }).then(function(result) {
                  //
                  //       if (result.value == true) {
                  //            $('#nombre').val('');
                  //            $('#descripcion').val('');
                  //            $('#precio').val('');
                  //            $('#id_categoria').val('');
                  //            $('#stock').val('');
                  //       }else{
                  //         location.href ="/usuarios"; //esta es la ruta del modulo
                  //       }
                  //   })

                    Toastify({
                        text: data.success,
                        duration: 3000, // 3 segundos
                        position: "center",
                        style: {
                            background: "rgb(var(--primary),1)",
                        },
                        callback: function () {
                            // Esto se ejecuta después de que el toast desaparezca
                            window.location.href = "/usuarios";
                        }
                    }).showToast();

                }else if(data.success == 'Ha sido editado con éxito'){
                  Toastify({
                      text: data.success,
                      duration: 3000, // 3 segundos
                      position: "center",
                      style: {
                          background: "rgb(var(--primary),1)",
                      },
                      callback: function () {
                          // Esto se ejecuta después de que el toast desaparezca
                          window.location.href = "/usuarios";
                      }
                  }).showToast();
                  // Swal.fire({
                  //       title: "Excelente",
                  //       text: data.success,
                  //       icon: "success",
                  //       buttonsStyling: false,
                  //       showCancelButton: true,
                  //       confirmButtonText: "Continuar Editando",
                  //       cancelButtonText: "No,Gracias",
                  //       customClass: {
                  //         confirmButton: "btn btn-success btn-sm",
                  //         cancelButton: "btn btn-danger btn-sm"
                  //       }
                  //   }).then(function(result) {
                  //
                  //       if (result.value == true) {
                  //          $('#nombre').val('');
                  //          $('#apellido_paterno').val('');
                  //          $('#apellido_materno').val('');
                  //          $('#tipo_usuario').val('');
                  //          $('#name').val('');
                  //          $('#email').val('');
                  //          $('#password').val('');
                  //       }else{
                  //         location.href ="/usuarios";
                  //       }
                  //   })
                }else{

                }



              }
        });

      /////////////////////////////////////////////////////////
    }



}

</script>
@endsection

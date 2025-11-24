@extends('layouts.inicio')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">
  Notificaciones
</h3>
</div>
<form class=" needs-validation" novalidate>
<div class="card-body">
  <div class="row">
    <div class="col-md-6">
        <label for="inputPassword4"  style="font-size:12px;"class="form-label">Nombre: </label>
        <!-- <input type="text" class="form-control" id="name" placeholder="Nombre" required> -->
        <select class="form-control" id="name" required>
          @foreach($usuarios as $user)
          <option value="{{ $user->id }}">{{ $user->nombre }} {{ $user->apellido_paterno }} {{ $user->apellido_materno }}</option>
          @endforeach
        </select>
        <div class="invalid-feedback">
          Por Favor Ingrese Nombre Usuario
        </div>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" style="font-size:12px;" class="form-label">Mensaje: </label>
        <textarea id="mensaje" class="form-control" rows="8" cols="80"></textarea>
        <div class="invalid-feedback">
          Por Favor Ingrese Correo Eléctronico
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

    var name = $('#name').val();
    var mensaje = $('#mensaje').val();

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
          }else{
            ///////////////////////////////////////////////////////7
            $.ajax({

                   type:"POST", //si existe esta variable usuarios se va mandar put sino se manda post

                   url:"/usuarios/enviarnotificacion", //si existe usuarios manda la ruta de usuarios el id del usario sino va mandar usuarios crear
                   headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
                   },
                   data:{
                     name: name,
                     mensaje: mensaje,
                   },
                    success:function(data){
                      if (data.success == 'Se Envio Satisfactoriamente') {
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
                                location.href ="/usuarios/notificaciones"; //esta es la ruta del modulo
                              }
                          })

                      }



                    }
              });

            /////////////////////////////////////////////////////////
          }

          form.classList.add('was-validated')
        }, false)
      });


}
</script>
@endsection

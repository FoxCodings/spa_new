@extends('app')

@section('content')
<div class="container-fluid">

    <!-- Chat start -->
    <div class="row position-relative chat-container-box">

        <div class="col-lg-6 col-xxl-6 box-col-5">
            <div class="card chat-container-content-box" id="nuevo_cliente">
                <div class="card-header">
                  <h4>Nuevo Cliente</h4>
                </div>
                <form class="row g-3 needs-validation" novalidate>
                <div class="card-body chat-body">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="nombre" required>
                        <div class="invalid-feedback">
                        Por Favor Ingrese Nombre
                        </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Apellido Paterno</label>
                      <input type="text" class="form-control" id="apellido_p" required>
                      <div class="invalid-feedback">
                      Por Favor Ingrese Apellido Paterno
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Apellido Materno</label>
                      <input type="text" class="form-control" id="apellido_m" required>
                      <div class="invalid-feedback">
                      Por Favor Ingrese Apellido Materno
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Telefono</label>
                      <input type="text" class="form-control" id="telefono" required>
                      <div class="invalid-feedback">
                      Por Favor Ingrese Telefono
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email">
                    </div>


                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-primary" onclick="guardar()">Guardar</button>
                </div>
                </form>
            </div>
            <div class="card chat-container-content-box" id="editar_cliente">
                <div class="card-header">
                  <h4>Editar Cliente</h4>
                </div>
                <form class="row g-3 needs-validation2" novalidate>
                <div class="card-body chat-body">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="nombre_edit" required>
                      <div class="invalid-feedback">
                      Por Favor Ingrese Nombre
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Apellido Paterno</label>
                      <input type="text" class="form-control" id="apellido_p_edit" required>
                      <div class="invalid-feedback">
                      Por Favor Ingrese Apellido Paterno
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Apellido Materno</label>
                      <input type="text" class="form-control" id="apellido_m_edit" required>
                      <div class="invalid-feedback">
                      Por Favor Ingrese Apellido Materno
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Telefono</label>
                      <input type="text" class="form-control" id="telefono_edit" required>
                      <div class="invalid-feedback">
                      Por Favor Ingrese Telefono
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email_edit">
                    </div>


                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-primary" onclick="editar()">Guardar</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6 col-xxl-6  box-col-7">
            <div class="chat-div">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 ps-2">
                                <h4>Clientes</h4>
                            </div>
                            <div>
                                <div class="btn-group dropdown-icon-none">
                                    <a role="button"  data-bs-placement="top"  data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                        <i class="ti ti-settings fs-5"></i>
                                    </a>
                                    <ul class="dropdown-menu" data-popper-placement="bottom-start">
                                        <li><a class="dropdown-item" onclick="nuevoCliente()"><i class="ti ti-user-plus"></i> <span
                                                    class="f-s-13">Nuevo Cliente</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="close-togglebtn">
                                <a class="ms-2 close-toggle" role="button"><i class="ti ti-align-justified fs-5"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                      <div class="chat-contact tabcontent chat-contact-list" id="listacliente">

                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Chat end -->
</div>
@endsection
@section('script')
<script type="text/javascript">
  $('#editar_cliente').hide()

  datos()

  function nuevoCliente(){
    $('#editar_cliente').hide()
    $('#nuevo_cliente').show()
    $('#nombre_edit').val('')
    $('#apellido_p_edit').val('')
    $('#apellido_m_edit').val('')
    $('#telefono_edit').val('')
    $('#email_edit').val('')
  }

  function borrarcontact(id){

    Swal.fire({
          title: "¿Esta seguro dar eliminar registro?",
          text: "No se podrá recuperar la información",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Aceptar",
          cancelButtonText: "Cancelar"
      }).then(function(result) {
          if (result.value) {

            $.ajax({
                   type:"POST",
                   url:"/clientes/borrarcontacto",
                   headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   data:{
                       id:id,
                     },
                     success:function(data){

                       Toastify({
                           text: data.success,
                           duration: 3000, // 3 segundos
                           position: "center",
                           style: {
                               background: "rgb(var(--primary),1)",
                           },
                           callback: function () {
                             $('#fila_'+id).remove()
                           }
                       }).showToast();

                    }
              });


          }
      })



  }

  function datos(){
    $.ajax({
           type:"GET",
           url:"/clientes/traerDatos",
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
             success:function(data){
                   $('#listacliente').empty();
                  for (var i = 0; i < data.length; i++) {


                    var nombre = data[i].nombre+' '+data[i].apellido_paterno+' '+data[i].apellido_materno;

                    var lt = '<div class=" d-flex align-items-center py-3" id="fila_'+data[i].id+'">'+
                        '<div>'+
                            '<span class="h-40 w-40 d-flex-center b-r-50 position-relative bg-info">'+
                              '<img src="{{asset("../assets/images/avtar/13.png")}}" alt="" class="img-fluid b-r-50">'+
                            '</span>'+
                        '</div>'+
                        '<div class="flex-grow-1 ps-2">'+
                            '<p class="contact-name text-dark mb-0 ">'+nombre+'</p>'+
                            '<p class="mb-0 text-secondary f-s-13">+52'+data[i].telefono+'</p>'+
                        '</div>'+
                        '<div>'+
                            '<span class="h-35 w-35 text-outline-success d-flex-center b-r-50" onclick="editcontact('+data[i].id+')">'+
                              '<i class="ti ti-edit"></i>'+
                            '</span>'+
                        '</div>'+
                        '<div>'+
                            '<span class="h-35 w-35 text-outline-danger d-flex-center b-r-50 ms-1" onclick="borrarcontact('+data[i].id+')">'+
                              '<i class="ti ti-trash"></i>'+
                            '</span>'+
                        '</div>'+
                    '</div>';

                    $('#listacliente').append(lt)
                  }




            }
      });

  }






  function editcontact(id){
    Swal.fire({
          title: "¿Esta seguro dar editar el registro?",
          text: "",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Aceptar",
          cancelButtonText: "Cancelar"
      }).then(function(result) {
          if (result.value) {

            $.ajax({
                   type:"POST",
                   url:"/clientes/editarcontacto",
                   headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   data:{
                       id:id,
                     },
                     success:function(data){
                       $('#editar_cliente').show()
                       $('#nuevo_cliente').hide()

                       $('#nombre_edit').val(data.nombre)
                       $('#apellido_p_edit').val(data.apellido_paterno)
                       $('#apellido_m_edit').val(data.apellido_materno)
                       $('#telefono_edit').val(data.telefono)
                       $('#email_edit').val(data.correo_electronico)

                       $('#nombre').val('')
                       $('#apellido_p').val('')
                       $('#apellido_m').val('')
                       $('#telefono').val('')
                       $('#email').val('')


                    }
              });


          }
      })
  }

  function guardar(){
    var nombre = $('#nombre').val();
    var apellido_p = $('#apellido_p').val();
    var apellido_m = $('#apellido_m').val();
    var telefono = $('#telefono').val();
    var email = $('#email').val();

    if (nombre == '' ||
        apellido_p == '' ||
        apellido_m == '' ||
        telefono == '') {

          'use strict'
          var forms = document.querySelectorAll('.needs-validation')
          console.log(forms)
          Array.prototype.slice.call(forms)
            .forEach(function (form) {
              form.addEventListener('click', function (event) {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }

                form.classList.add('was-validated')
              }, false)
            })
    }else{
      $.ajax({
             type:"POST",
             url:"/clientes/guardarcontacto",
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             data:{
               nombre:nombre,
               apellido_p:apellido_p,
               apellido_m:apellido_m,
               telefono:telefono,
               email:email,
               },
               success:function(data){
                 if (data.success == 'Se Agrego Satisfactoriamente') {

                         Toastify({
                             text: data.success,
                             duration: 3000, // 3 segundos
                             position: "center",
                             style: {
                                 background: "rgb(var(--primary),1)",
                             },
                             callback: function () {
                               datos()
                               $('#nombre').val('')
                               $('#apellido_p').val('')
                               $('#apellido_m').val('')
                               $('#telefono').val('')
                               $('#email').val('')
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

                         datos()
                         $('#nombre').val('')
                         $('#apellido_p').val('')
                         $('#apellido_m').val('')
                         $('#telefono').val('')
                         $('#email').val('')
                       }
                   }).showToast();
                 }


              }
        });
    }
  }

  function editar(){

  }
</script>
@endsection

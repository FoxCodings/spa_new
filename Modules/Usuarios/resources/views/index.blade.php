@extends('app')

@section('content')
<div class="card card-custom example example-compact">
  <div class="card-header">
  <h3 class="card-title">
    Usuarios
  </h3>
  <div class="card-toolbar">
        <!--begin::Dropdown-->
  <!--begin::Button-->
  @can('crear usuario')
  <a href="/usuarios/create" class="btn btn-primary font-weight-bolder">
    <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"></rect>
          <circle fill="#000000" cx="9" cy="15" r="6"></circle>
          <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
      </g>
  </svg><!--end::Svg Icon--></span> Nuevo
  </a>
  <!-- <a onclick="api()" class="btn btn-primary font-weight-bolder">
    <span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"></rect>
          <circle fill="#000000" cx="9" cy="15" r="6"></circle>
          <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
      </g>
  </svg></span> Agregar Usuarios Externos
  </a> -->
  @else

  @endcan
  <!--end::Button-->
      </div>
  </div>

  <div class="card-body">
    <div class="card-body px-0">
        <div class="table-responsive app-scroll app-datatable-default product-list-table">
            <table id="kt_datatable" class="table-sm display align-middle">

              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Rol</th>
                  <th>Usuario</th>
                  <th>Correo</th>
                  <th>Acciones</th>
                </tr>
                </thead>
               <tbody></tbody>
            </table>
        </div>
      </div>
  </div>
</div>
<script type="text/javascript">
    var tabla;
    $(function() {
    tabla = $('#kt_datatable').DataTable({
      processing: true,
      serverSide: true,
      order: [[0, 'desc']],
      ajax: {
        url: "/usuarios/tablausuarios",
      },
      columns: [
        { data: 'nombre', name : 'nombre'},
        { data: 'apellido_paterno', name : 'apellido_paterno'},
        { data: 'apellido_materno', name : 'apellido_materno'},
        { data: 'tipo_usuario', name : 'tipo_usuario'},

        { data: 'name', name: 'name' },

        { data: 'email', name: 'email' },
        { data: 'acciones', name: 'acciones', searchable: false, orderable:false, width: '60px', class: 'acciones' }
      ],
      createdRow: function ( row, data, index ) {
        $(row).find('.ui.dropdown.acciones').dropdown();
      },
      language: { url: "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" }
    });
    });


    function as(id) {

      Swal.fire({
            title: "¿Estas seguro?",
            text: "Cambiaras de Usuario!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, Cambiar!"
        }).then(function(result) {
            if (result.value) {

              $.ajax({

                 type:"POST",

                 url:"/usuarios/as",
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
                            // Esto se ejecuta después de que el toast desaparezca
                            location.href ="/dashboard";
                        }
                    }).showToast();
                    //  Swal.fire("Excelente!", data.success, "success").then(function(){ location.href ="/dashboard"; });

                  }


              });


            }
        })


    }

    function api(){
      Swal.fire({
            title: "¿Estas seguro?",
            text: "No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, Agregarlos!"
        }).then(function(result) {
            if (result.value) {

              $.ajax({

                 type:"POST",

                 url:"/usuarios/api",
                 headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 data:{
                   id:1,
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
                            // Esto se ejecuta después de que el toast desaparezca
                            tabla.ajax.reload();
                        }
                    }).showToast();

                    //Swal.fire("Excelente!", data.success, "success").then(function(){ tabla.ajax.reload(); });

                  }


              });


            }
        })
    }

    function eliminar(id){
//console.log(id);
    var id_user = id;
    Swal.fire({
          title: "¿Estas seguro?",
          text: "No podrás revertir esto!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, bórralo!"
      }).then(function(result) {
          if (result.value) {

            $.ajax({

               type:"Delete",

               url:"/usuarios/borrar",
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               data:{
              id_user:id_user,
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
                          // Esto se ejecuta después de que el toast desaparezca
                          tabla.ajax.reload();
                      }
                  }).showToast();
                  //Swal.fire("Excelente!", data.success, "success").then(function(){ tabla.ajax.reload(); });

                }


            });


          }
      })
    }


</script>
@endsection

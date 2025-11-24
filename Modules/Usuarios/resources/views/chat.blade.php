@extends('layouts.inicio')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">
  Mensajes
</h3>
<!-- <div class="card-toolbar">


@can('crear usuario')
<a href="/usuarios/create" class="btn btn-primary font-weight-bolder">
  <span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <circle fill="#000000" cx="9" cy="15" r="6"></circle>
        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
    </g>
</svg></span> Nuevo
</a>
@else

@endcan
    </div> -->
</div>
<div class="card-body">
<table class="table table-bordered table-checkable" id="kt_datatable">
  <thead>
    <tr>
      <th>Usuario</th>
      <th>Mensaje</th>
      <th>Acciones</th>
    </tr>
    </thead>
   <tbody></tbody>
</table>
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
        url: "/usuarios/tablamensaje",
      },
      columns: [
        { data: 'id_usuario', name : 'id_usuario'},
        { data: 'mensaje', name : 'mensaje'},
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

                    Swal.fire("Excelente!", data.success, "success").then(function(){ location.href ="/dashboard"; });

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
                  Swal.fire("Excelente!", data.success, "success").then(function(){ tabla.ajax.reload(); });

                }


            });


          }
      })
    }


</script>
@endsection

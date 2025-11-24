@extends('layouts.inicio')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">
  Archivos del Sistema
</h3>
<div class="card-toolbar">

</div>
</div>
<div class="card-body">
  <div class="dataTables_scroll">

   <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
      <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important" >
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Acciones</th>
          </tr>
          </thead>
         <tbody>

         </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">

    $.ajax({

       type:"POST",

       url:"/usuarios/archivos",
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       data:{
         id:1,
       },

        success:function(data){
          for (var i = 0; i < data.length; i++) {
            let tr = '<tr id="id-figura-'+i+'">';
            if (i == 0 || i == 1) {

            }else{
            tr +='<td><input type="hidden" id="figura_nueva" value="'+data[i]+'"/>'+data[i] +'</td>';
            tr +='<td style=" text-align: center; "><div class="btn btn-danger" onclick="eliminar('+i+')"><i  class="fas fa-trash"></i></div></td>';
            }

            tr +='</tr>';
            $("#kt_datatable").append(tr);

          }

        }


    });

    function eliminar(id){
      //console.log(id);
      $.ajax({

         type:"POST",

         url:"/usuarios/Eliminararchivos",
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data:{
           id:id,
         },

          success:function(data){
            //console.log(data)

            if (data == 1) {
              Swal.fire("Felicidades!", "Elimino Archivo del Sistema!", "success").then(function() { location.href ="/usuarios/archivos"; });
            }
          }


      });

    }



</script>
@endsection

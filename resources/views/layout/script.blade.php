
<div  class="modal fade" id="loandig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div style="height:250px"> </div>
      <!-- <div id="loanding" style="width:500px;height:500px;" class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div> -->
      <div id="loanding" style="width:500px;height:500px;" class="spinner-grow text-primary" role="status">
        <span class="sr-only"></span>
      </div>
        <div class="modal-content" style="opacity: 0;">

        </div>
    </div>
</div>
<!-- latest jquery-->
<script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets/vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>

<!-- Simple bar js-->
<script src="{{asset('assets/vendor/simplebar/simplebar.js')}}"></script>

<!-- phosphor js -->
<script src="{{asset('assets/vendor/phosphor/phosphor.js')}}"></script>

<!-- Customizer js-->
<!-- <script src="{{asset('assets/js/customizer.js')}}"></script> -->

<!-- prism js-->
<script src="{{asset('assets/vendor/prism/prism.min.js')}}"></script>

<!-- App js-->
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

$('#loanding').hide();
$('#loandig').modal('hide');

function boton_quitar(){
$('#mensaje1').remove();
$( "#lista_mensajes" ).load(window.location.href + " #lista_mensajes" );

}
function actualizar(){
$.ajax({

type:"POST",
url:"/actualizar",
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data:{
curp : 1,
},
// data: formData,
// processData: false,
// contentType: false,
success:function(data){
//console.log(data);

if (data == 1) {
  $('#loanding').show();
  $('#loandig').modal('show');

  setTimeout(function(){
    location.reload();
  }, 5000);


}

}
});
}

function as2(id) {

  $.ajax({

   type:"POST",
     url:"/usuarios/loginAs",
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
   data:{
    id : id,
   },

    success:function(data){

      if (data == 1) {
        location.href ="/dashboard";
      }

    }
  });

}
</script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = false;

  var pusher = new Pusher('c54c735decac4b18be8c', {
    cluster: 'us2'
  });

  var channel = pusher.subscribe('canaleta-channel');
  channel.bind('canaleta-event', function(data) {
    //console.log(data.usuario)
    //alert(JSON.stringify(data));

    if ({{ Auth::user()->id }} == data.usuario) {
      toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };

      toastr.success(data.mensaje);

      $('#mensaje1').html('<span class="label label-sm label-rounded label-primary">1</span>');
    }



  });

            function verMensaje(id){
    //console.log(id)
    $.ajax({

     type:"POST",
       url:"/usuarios/verMensajes",
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     data:{
      id : id,
     },

      success:function(data){
        // $('#mensajitobb').modal('show')
        // $('#mensajever').html('<textarea rows="8" cols="80" class="form-control" disabled>'+data.mensaje+'</textarea>');
        Swal.fire("Mensaje",data.mensaje, "success").then(function() {

          var id = $('#id_mensaje').val();
          $.ajax({

           type:"POST",
             url:"/usuarios/EliminarMensajes",
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{
            id : id,
           },

            success:function(data){
              if(data == 'Se Elimino Satisfactoriamente'){
                $( "#lista_mensajes" ).load(window.location.href + " #lista_mensajes" );
              }

            }
          });

         });
        $('#idmensajever').html('<input type="hidden" id="id_mensaje" value="'+id+'">');
      //console.log(data)

      }
    });
  }

  // function eliminarMensaje(){
  //   var id = $('#id_mensaje').val();
  //   $.ajax({
  //
  //    type:"POST",
  //      url:"/usuarios/EliminarMensajes",
  //    headers: {
  //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //    },
  //    data:{
  //     id : id,
  //    },
  //
  //     success:function(data){
  //       if(data == 'Se Elimino Satisfactoriamente'){
  //         $( "#lista_mensajes" ).load(window.location.href + " #lista_mensajes" );
  //       }
  //
  //     }
  //   });
  // }


</script>

@yield('script')

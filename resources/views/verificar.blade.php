@section('title', 'Two Step Verifications')
@include('layout.head')

@include('layout.css')

<body class="sign-in-bg">
<div class="app-wrapper d-block">
    <!-- <div class="app-content"> -->
    <div class="main-container">
        <!-- Body main section starts -->

        <div class="container">
            <!-- Verify OTP start -->
            <div class="sign-in-content-bg">
                <div class="row sign-in-content-bg">
                    <div class="col-lg-6 image-contentbox d-none d-lg-block">
                        <div class="form-container">
                            <div class="signup-content mt-4">
                  <span>
                    <img src="{{asset('../assets/images/logo/1.png')}}" alt="" class="img-fluid ">
                  </span>
                            </div>
                            <div class="signup-bg-img">
                                <img src="{{asset('../assets/images/login/01.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 form-contentbox">
                        <div class="form-container">
                            <form class="app-form needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-5 text-center text-lg-start">
                                            <h2 class="text-primary">Verificar Cuenta de Usuario</h2>
                                            <p>Ingrese el código de 5 dígitos enviado al Email registrado</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="verification-box justify-content-lg-start mb-3">
                                            <div>
                                                <input type="text" class="form-control h-60 w-60 text-center" oninput='digitValidate(this)'
                                                       onkeyup='tabChange(1)' id="one" maxlength="1" >
                                            </div>
                                            <div>
                                                <input type="text" class="form-control h-60 w-60 text-center" oninput='digitValidate(this)'
                                                       onkeyup='tabChange(2)' id="two" maxlength="1" >
                                            </div>
                                            <div>
                                                <input type="text" class="form-control h-60 w-60 text-center" oninput='digitValidate(this)'
                                                       onkeyup='tabChange(3)' id="three" maxlength="1" >
                                            </div>
                                            <div>
                                                <input type="text" class="form-control h-60 w-60 text-center" oninput='digitValidate(this)'
                                                       onkeyup='tabChange(4)' id="four" maxlength="1" >
                                            </div>
                                            <div>
                                                <input type="text" class="form-control h-60 w-60 text-center" oninput='digitValidate(this)'
                                                       onkeyup='tabChange(5)' id="five" maxlength="1" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p>
                                            No ha recibido el Codigo <a onclick="reenviar()" class="link-primary text-decoration-underline"> Reenviar!</a>
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <button type="reset" onclick="verificar()" class="btn btn-primary w-100">Verificar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Verify OTP end -->
        </div>

        <!-- Body main section ends -->
    </div>
</div>

</body>



    <!-- latest jquery-->
    <script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>

    <!-- Bootstrap js-->
    <script src="{{asset('assets/vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- js -->
    <script src="{{asset('assets/js/two_step.js')}}"></script>

    <script>
      function verificar(){
        var one = $('#one').val();
        var two = $('#two').val();
        var three = $('#three').val();
        var four = $('#four').val();
        var five = $('#five').val();

        var codigo = one+two+three+four+five;





        if (one == '' ||
            two == '' ||
            three == '' ||
            four == '' ||
            five == '' ) {

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
          $.ajax({

                 type:"POST", //si existe esta variable usuarios se va mandar put sino se manda post

                 url:"/verificar", //si existe usuarios manda la ruta de usuarios el id del usario sino va mandar usuarios crear
                 headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
                 },
                 data:{
                   usuario:{{$usuario}},
                   codigo:codigo
                 },
                  success:function(data){
                    if (data.success == 'Código válido') {
                        Swal.fire("Excelente!", data.success, "success").then(function(){ location.href ="/"; });


                    }else if(data.success == 'Código no válido'){
                      Swal.fire("Lo Sentimos!", data.success, "warning").then(function(){  });

                    }



                  }
            });
        }


      }

      function reenviar(){
        $.ajax({

               type:"POST", //si existe esta variable usuarios se va mandar put sino se manda post

               url:"/reenviar", //si existe usuarios manda la ruta de usuarios el id del usario sino va mandar usuarios crear
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
               },
               data:{
                 usuario:{{$usuario}},
               },
                success:function(data){
                  if (data.success == 'reenviado') {
                      Swal.fire("Excelente!","Código reenviado", "success").then(function(){ });


                  }



                }
          });
      }
    </script>

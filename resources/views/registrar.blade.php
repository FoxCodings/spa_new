@section('title', 'Sign Up Bg')

@include('layout.head')

@include('layout.css')

<body>
<div class="app-wrapper d-block">
    <div class="">
        <!-- Body main section starts -->
        <main class="w-100 p-0">
            <!-- Create Account start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="login-form-container">
                            <div class="mb-4">
                                <a class="logo d-inline-block" href="/registarr">
                                    <img src="{{asset('../assets/images/logo/1.png')}}" width="250" alt="#">
                                </a>
                            </div>
                            <div class="form_container">
                                <form class="app-form p-3 needs-validation" novalidate>
                                    <div class="mb-3 text-center">
                                        <h3>Crear una cuenta</h3>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" id="name" placeholder="Ingresa tu Username" required>
                                        <div class="invalid-feedback">
                                          Por Favor Ingrese Username
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nombre(s)</label>
                                        <input type="text" class="form-control" id="nombre" placeholder="Ingresa Nombre(s)" required>
                                        <div class="invalid-feedback">
                                          Por Favor Ingrese Nombre(s)
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Paterno</label>
                                        <input type="text" class="form-control" id="apellido_paterno" placeholder="Ingresa Paterno" required>
                                        <div class="invalid-feedback">
                                          Por Favor Ingrese Paterno
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Materno</label>
                                        <input type="text" class="form-control" id="apellido_materno" placeholder="Ingresa Materno" required>
                                        <div class="invalid-feedback">
                                          Por Favor Ingrese Materno
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Ingresa tu Email" required>
                                        <div class="invalid-feedback">
                                          Por Favor Ingrese Email
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Ingresa tu Password" required>
                                        <div class="invalid-feedback">
                                          Por Favor Ingrese Password
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tipo de Usuario</label>
                                        <select  class="form-control" id="tipo_usuario" required>
                                          <option value="">Seleccione</option>
                                          @foreach($roles as $rol)
                                            <option value="{{$rol->id}}">{{$rol->name}}</option>
                                          @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                          Por Favor Seleccione Tipo Usuario
                                        </div>
                                    </div>
                                    <div>
                                        <button  type="button" class="btn btn-primary w-100" onclick="guardar()">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Create Account end -->
        </main>
        <!-- Body main section ends -->
    </div>
</div>


</body>

<!-- latest jquery-->
<script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets/vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script>
  function guardar(){
    var name = $('#name').val();
    var nombre = $('#nombre').val();
    var apellido_paterno = $('#apellido_paterno').val();
    var apellido_materno = $('#apellido_materno').val();
    var email = $('#email').val();
    var password  = $('#password').val();
    var tipo_usuario  = $('#tipo_usuario').val();


    if (name == '' ||
        nombre  == '' ||
        apellido_paterno == '' ||
        apellido_materno == '' ||
        email == '' ||
        password == '' ||
        tipo_usuario == '') {

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

             url:"/registrar", //si existe usuarios manda la ruta de usuarios el id del usario sino va mandar usuarios crear
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
                if (data.success == 'Registrado Satisfactoriamente') {
                  location.href ="/";

                }



              }
        });
    }






  }
</script>

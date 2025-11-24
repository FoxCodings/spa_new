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
                                <a class="logo d-inline-block" href="/">
                                    <img src="{{asset('../assets/images/logo/1.png')}}" width="250" alt="#">
                                </a>
                            </div>
                            <div class="form_container">
                              <form class="app-form p-3"  method="POST" action="{{ route('login') }}">
                                    @csrf
                                <div class="mb-3">
                                  <input class="form-control h-auto border-0 px-0 placeholder-dark-75"type="email"  id="email" placeholder="Email" name="email" :value="old('email')" required autofocus  autocomplete="off" />
                                </div>
                                <div class="mb-3">
                                  <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="Password" id="password" placeholder="Password"  name="password" required autocomplete="current-password" autocomplete="off" />
                                </div>
                                <div class="mb-3 text-center">
                                    ¿Todavía no tienes tu cuenta? <a href="/registrar" class="link-primary text-decoration-underline"> Crear Cuenta</a>
                                </div>

                                <div class="text-center mt-15">
                                  <button id="kt_login_signin_submit" class="btn btn-primary w-100">Iniciar Sesión</button>
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

@section('script')
    <!-- latest jquery-->
    <script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>

    <!-- Bootstrap js-->
    <script src="{{asset('assets/vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
@endsection

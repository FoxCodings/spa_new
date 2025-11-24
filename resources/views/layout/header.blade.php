<!-- Header Section starts -->
<header class="header-main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-sm-4 d-flex align-items-center header-left p-0">
                <span class="header-toggle me-3">
                  <i class="ph ph-circles-four"></i>
                </span>
            </div>

            <div class="col-6 col-sm-8 d-flex align-items-center justify-content-end header-right p-0">

                <ul class="d-flex align-items-center">






                    <!-- <li class="header-dark">
                        <div class="sun-logo head-icon">
                            <i class="ph ph-moon-stars"></i>
                        </div>
                        <div class="moon-logo head-icon">
                            <i class="ph ph-sun-dim"></i>
                        </div>
                    </li> -->

                    <li class="header-notification">
                        @if(mensajes() == '[]')
                        <a href="#" class="d-block head-icon position-relative" role="button" data-bs-toggle="offcanvas"
                           data-bs-target="#notificationcanvasRight" aria-controls="notificationcanvasRight">
                            <i class="ph ph-bell"></i>

                        </a>
                        @else
                        <a href="#" class="d-block head-icon position-relative" role="button" data-bs-toggle="offcanvas"
                           data-bs-target="#notificationcanvasRight" aria-controls="notificationcanvasRight">
                            <i class="ph ph-bell"></i>
                            <span
                                class="position-absolute translate-middle p-1 bg-success border border-light rounded-circle animate__animated animate__fadeIn animate__infinite animate__slower"></span>
                        </a>
                        @endif

                        <div class="offcanvas offcanvas-end header-notification-canvas" tabindex="-1"
                             id="notificationcanvasRight" aria-labelledby="notificationcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="notificationcanvasRightLabel">Notificaciones</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body app-scroll p-0">
                                <div class="head-container">

                                  @if(mensajes() == '[]')
                                  <div class="notification-message head-box">
                                      <img src="{{asset('../assets/images/icons/bell.png')}}" class="w-50 h-50 mb-3 mt-2" alt="">
                                      <div>
                                          <h6 class="mb-0">Sin Notificaciones</h6>
                                          <p class="text-secondary">Por el momento no cuenta con alguna.
                                          </p>
                                      </div>
                                  </div>
                                  @else
                                     @foreach (mensajes() as $key => $mensaje)

                                     <div class="notification-message head-box">
                                         <div class="message-images">
                                             <span class="bg-secondary h-35 w-35 d-flex-center b-r-10 position-relative">
                                               <img src="{{asset('../assets/images/ai_avtar/6.jpg')}}" alt="" class="img-fluid b-r-10">
                                               <span
                                                   class="position-absolute bottom-30 end-0 p-1 bg-secondary border border-light rounded-circle notification-avtar"></span>
                                             </span>
                                                       </div>
                                                       <div class="message-content-box flex-grow-1 ps-2">

                                                           <a onclick="verMensaje({{ $mensaje->id }})" class="f-s-15 text-secondary mb-0">
                                                             <!-- <span class="f-w-500 text-secondary">Gene Hart</span> -->
                                                                   <span class="f-w-500 text-secondary">{{ substr($mensaje->mensaje,-12); }}</span></a>
                                                           <!-- <div>
                                                               <a class="d-inline-block f-w-500 text-success me-1" href="#">Approve</a>
                                                               <a class="d-inline-block f-w-500 text-danger" href="#">Deny</a>
                                                           </div> -->
                                                           <!-- <span class="badge text-light-secondary mt-2"> sep 23 </span> -->

                                                       </div>
                                                       <div class="align-self-start text-end">
                                                           <i class="ph ph-trash f-s-18 text-danger close-btn"></i>
                                                       </div>
                                     </div>

                                     @endforeach
                                  @endif










                                </div>
                            </div>
                        </div>

                    </li>

                    <li class="header-profile">
                        <a href="#" class="d-block head-icon" role="button" data-bs-toggle="offcanvas"
                           data-bs-target="#profilecanvasRight" aria-controls="profilecanvasRight">
                            <img src="{{asset('../assets/images/ai_avtar/7.png')}}" alt="avtar" class="b-r-10 h-35 w-35">
                        </a>

                        <div class="offcanvas offcanvas-end header-profile-canvas" tabindex="-1" id="profilecanvasRight"
                             aria-labelledby="profilecanvasRight">
                            <div class="offcanvas-body app-scroll">
                                <ul class="">
                                    <li>
                                        <div class="d-flex-center">
                              <span class="h-45 w-45 d-flex-center b-r-10 position-relative">
                                <img src="{{asset('../assets/images/ai_avtar/7.png')}}" alt="" class="img-fluid b-r-10">
                              </span>
                                        </div>
                                        <div class="text-center mt-2">
                                            <h6 class="mb-0"> {{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}</h6>
                                            <p class="f-s-12 mb-0 text-secondary">{{ Auth::user()->email }}</p>
                                        </div>
                                    </li>


                                    <li class="app-divider-v dotted py-1"></li>
                                    <li>
                                        <a class="f-w-500"  onclick="actualizar()">
                                            <i class="ph-duotone ph ph-repeat pe-1 f-s-20"></i> Actualizar
                                        </a>
                                    </li>

                                      @if ( session('idOriginal') )
                                      <li>
                                        <a class="f-w-500"   onclick="as2({{ session('idOriginal') }})">
                                            <i class="ph-duotone ph-user-switch pe-1 f-s-20"></i> Regresar a mi usuario

                                        </a>
                                      </li>
                                    @endif




                                    <li class="app-divider-v dotted py-1"></li>



                                    <li>
                                      <a href="{{ route('logout') }}" class="mb-0 text-danger" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5"><i class="ph-duotone  ph-sign-out pe-1 f-s-20"></i> Cerrar Sesión</a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                         @csrf
                                      </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Header Section ends -->

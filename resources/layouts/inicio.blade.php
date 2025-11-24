@php
  $moduloActual = obtenerModuloActual();
  $moduloActual = $moduloActual === false ? $moduloActual : $moduloActual;
@endphp
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
    <!--begin::Head-->
    <head><base href="">
      <meta charset="utf-8"/>
      <title>SISTEMA BASE</title>
      <meta name="description" content="Updates and statistics"/>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

      <!--begin::Fonts-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->

      <!--begin::Page Vendors Styles(used by this page)-->
      <link href="/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <!--end::Page Vendors Styles-->


      <!--begin::Global Theme Styles(used by all pages)-->
      <link href="/admin/assets/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <link href="/admin/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <link href="/admin/assets/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <!--end::Global Theme Styles-->

      <!--begin::Layout Themes(used by all pages)-->

      <link href="/admin/assets/css/themes/layout/header/base/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <link href="/admin/assets/css/themes/layout/header/menu/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <!-- <link href="/admin/assets/css/themes/layout/brand/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <link href="/admin/assets/css/themes/layout/aside/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>    -->
      <!--end::Layout Themes-->
      <link href="/admin/assets/css/themes/layout/brand/light.css?v=7.0.6" rel="stylesheet" type="text/css">
      <link href="/admin/assets/css/themes/layout/aside/light.css?v=7.0.6" rel="stylesheet" type="text/css">

      <link rel="https://api.w.org/" href="/admin/assets/media/bg/hhva_sombra.png" /><link rel="icon" href="/admin/assets/media/bg/hhva_sombra.png" sizes="32x32" />
      <link rel="icon" href="/admin/assets/media/bg/hhva_sombra.png" sizes="192x192" />
      <link rel="apple-touch-icon" href="/admin/assets/media/bg/hhva_sombra.png" />
      <link href="/admin/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="/admin/assets/plugins/global/plugins.bundle.js?v=7.0.6"></script> -->
     <script src="/admin/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
     <script src="/admin/assets/js/scripts.bundle.js?v=7.0.6"></script>

    </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >

    	<!--begin::Main-->
	<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed " >
	<!--begin::Logo-->
	<a href="/dashboard">
		<img alt="Logo" src="/admin/assets/media/bg/hhva_sombra.png" width="170" height="40"/>
	</a>
	<!--end::Logo-->

	<!--begin::Toolbar-->
	<div class="d-flex align-items-center">
      <!--begin::Aside Mobile Toggle-->
      <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
      <span></span>
      </button>
      <!--end::Aside Mobile Toggle-->

      <!--begin::Header Menu Mobile Toggle-->
      <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
      <span></span>
      </button>
      <!--end::Header Menu Mobile Toggle-->

      <!--begin::Topbar Mobile Toggle-->
      <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
      <span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <polygon points="0 0 24 0 24 24 0 24"/>
      <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
      <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
      </g>
      </svg><!--end::Svg Icon--></span>		</button>
      <!--end::Topbar Mobile Toggle-->
	</div>
	<!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">

<!--begin::Aside-->
<div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto"  id="kt_aside" >

  <div class="brand flex-column-auto " id="kt_brand" style="background:#fff;">

    <a href="/dashboard" class="brand-logo">
      <img alt="Logo" src="/admin/assets/media/bg/hhva_sombra.png" width="170" height="40"/>
    </a>

      <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle" >
        <span class="svg-icon svg-icon svg-icon-xl">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24"/>
                  <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
                  <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
              </g>
          </svg>
        </span>     </button>

      </div>

      <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper" >

        <div
          id="kt_aside_menu"
          class="aside-menu my-4 "
          data-menu-vertical="1"
           data-menu-scroll="1" data-menu-dropdown-timeout="500"      >

           <ul class="menu-nav ">
             <li class="menu-item  menu-item-active" aria-haspopup="true" ><a  href="/dashboard" class="menu-link ">
               <span class="svg-icon menu-icon">
                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                   <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                       <polygon points="0 0 24 0 24 24 0 24"/>
                       <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
                       <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
                   </g>
                 </svg>
               </span>
             <span class="menu-text">Dashboard</span></a>
             </li>
             <li class="menu-section ">
               <h4 class="menu-text">Menú</h4>
               <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
             </li>
             @foreach (obtenerModulosActivos() as $key => $value)
               @php
               $alias = $value->get('alias');
               @endphp
               @foreach(obtenerModulo() as $values)
                  @php
                  $aliast = $values->modulo;
                  @endphp
                 <!--//////////////////// reportes //////////////////////////////////////// -->
                 @if($alias == $aliast)
                 <li @if($value->get("contenido")) class="menu-item  menu-item-submenu" aria-haspopup="true"  data-menu-toggle="hover" @else class="menu-item " aria-haspopup="true"  @endif>
                   <a   @if($value->get("contenido"))  class="menu-link menu-toggle" @else class="menu-link "  @endif  href="@if($value->get('contenido')) javascript:; @else /{{ $alias }} @endif"  >
                       <i class="{{ $value->get('icono') }}"></i>
                       <span class="menu-text">{{ $value->get('titulo') ? $value->get('titulo') : $value->get('name') }}</span>
                         @if ( $value->get('contenido') )
                         <!-- <span class="ml-auto sidebar-menu-toggle-icon"></span> -->
                         <i class="menu-arrow"></i>
                         @endif
                   </a>
                   @if ( $value->get('contenido') )
                     @php $array_usuarios = $value->get('contenido'); @endphp
                     <div class="menu-submenu ">
                       <i class="menu-arrow"></i>
                       <ul class="menu-subnav">
                         @foreach ($array_usuarios as $key => $value)

                           <li class="menu-item " aria-haspopup="true" >
                             <a  href="{{ $value['enlace'] }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">{{ $key }}</span></a>
                           </li>
                         @endforeach
                       </ul>
                     </div>
                   </li>
                   @endif
                 @endif
                 <!--///////////////// FIN reportes ////////////////////////////-->
               @endforeach
             @endforeach
           </ul>
          <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
      </div>
      <!--end::Aside Menu-->
    </div>

<!--end::Aside-->

			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper" >
    				<!--begin::Header-->
            <div id="kt_header" class="header  header-fixed " style="background:#0064A7;">
            	<!--begin::Container-->
            	<div class=" container-fluid  d-flex align-items-stretch justify-content-between" >
            					<!--begin::Header Menu Wrapper-->
          			<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">



          			</div>



            		<div class="topbar" >

                  <div class="dropdown">
            	            <!--begin::Toggle-->

            	            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px" onclick="boton_quitar()">
                            <div class="btn btn-icon btn-clean btn-lg mr-1" style="color: #fff;
                                background-color: #0064A7;
                                border-color: #0064A7;">
                                <i class="far fa-bell icon-md text-white mr-5"></i>
                                <span style="top:-1px;left:-3px" id="mensaje1"></span>
                            </div>
            	            </div>
            	            <!--end::Toggle-->

            	            <!--begin::Dropdown-->
            	    	    <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
            	    	        <!--begin::Nav-->
                            <div class="scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 200px">



                            <ul class="navi navi-hover py-4" id="lista_mensajes">
                                 @if(mensajes() == '[]')
                                   <li class="navi-item" >
                                       <a   class="navi-link">
                                           <i class="far fa-bell text-danger mr-5"></i>
                                           <span class="navi-text">Sin Mensajes</span>
                                       </a>

                                   </li>
                                 @else
                                    @foreach (mensajes() as $key => $mensaje)




                                     <li class="navi-item" >
                                         <a  onclick="verMensaje({{ $mensaje->id }})" class="navi-link">
                                             <i class="far fa-bell text-info mr-5"></i>
                                             <span class="navi-text">{{ substr($mensaje->mensaje,-12); }}</span>
                                         </a>

                                     </li>
                                    @endforeach
                                 @endif

                                <!--end::Item-->


                            </ul>
                        </div>
                            <!--end::Nav-->
              	     </div>
                      <!--end::Dropdown-->
                  </div>

                <div class="dropdown">
                  <div class="topbar-item" data-toggle="dropdown" data-offset="50px,0px" aria-expanded="false">
                      <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"  style="color: #fff;
                          background-color: #0064A7;
                          border-color: #0064A7;">
            		         <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1"><span style="color:white;">Hola,</span>  </span>
                          <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"><span style="color:white;">{{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}</span></span>
                          <!-- <span class="symbol symbol-lg-35 symbol-25 symbol-light-primary">
                              <span class="symbol-label font-size-h5 font-weight-bold">S</span>
                          </span> -->
                      </div>
                  </div>
                  <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right" style="">
                      <!--begin::Nav-->
                      <ul class="navi navi-hover py-4">
                          <!--begin::Item-->
                          <li class="navi-item">
                            @if ( session('idOriginal') )
                            <a class="navi-link" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5" onclick="as2({{ session('idOriginal') }})">
                              <span class="navi-text" style="font-size:7.5pt;"><i class="fas fa-user-check"></i> Regresar a mi usuario</span>
                            </a>
                          @endif
                          <a onclick="actualizar()" class="navi-link"  class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5"><span class="navi-text" style="font-size:7.5pt;"><i class="fas fa-sync"></i> Actualizar Permisos</span></a>
                          <a href="{{ route('logout') }}" class="navi-link" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5"><span class="navi-text"><i class="fas fa-power-off"></i> Cerrar Sesión</span></a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                          </form>


                              <!-- <a href="#" class="navi-link">
                                  <span class="symbol symbol-20 mr-3">
                                      <img src="/admin//admin/assets/media/svg/flags/226-united-states.svg" alt="">
                                  </span>
                                  <span class="navi-text">English</span>
                              </a> -->
                          </li>
                          <!--end::Item-->

                      </ul>
    <!--end::Nav-->
                  </div>
                </div>
            		</div>
            		<!--end::Topbar-->
            	</div>
            	<!--end::Container-->
            </div>
            <!--end::Header-->

    				<!--begin::Content-->
    				<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
            											<!--begin::Subheader-->

            <!--end::Subheader-->

            					<!--begin::Entry-->
          	<div class="d-flex flex-column-fluid">
          		<!--begin::Container-->
          		<div class=" container ">

                @yield('content')

          		</div>
          		<!--end::Container-->
          	</div>
    <!--end::Entry-->
    				</div>
    				<!--end::Content-->

    									<!--begin::Footer-->
          <div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
          	<!--begin::Container-->
          	<div class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">
          		<!--begin::Copyright-->
          		<div class="text-dark order-2 order-md-1">
          			<span class="text-muted font-weight-bold mr-2"><?php echo date('Y'); ?>&copy;</span>
          			<a  target="_blank" class="text-dark-75 text-hover-primary">HHVA89</a>
          		</div>
          		<!--end::Copyright-->

          		<!--begin::Nav-->
          		<div class="nav nav-dark">
          			<!-- <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">About</a>
          			<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Team</a>
          			<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-0">Contact</a> -->
          		</div>
          		<!--end::Nav-->
          	</div>
          	<!--end::Container-->
          </div>
          <!--end::Footer-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
<!--end::Main-->





                    		<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
	<!--begin::Header-->
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-bold m-0">
			Perfil del usuario
			<!-- <small class="text-muted font-size-sm ml-2">12 messages</small> -->
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>
	<!--end::Header-->

	<!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
		<!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label" style="background-image:url('/admin/assets/media/users/300_21.jpg')"></div>
				<i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">

				</a>
                <div class="text-muted mt-1">
                    Application Developer
                </div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
                								<span class="svg-icon svg-icon-lg svg-icon-primary"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/Communication/Mail-notification.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
                                            <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                              </span>
                            <span class="navi-text text-muted text-hover-primary">{{ Auth::user()->email }}</span>
                        </span>
                    </a>

					               <a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Cerrar Sesión</a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                </div>
            </div>
        </div>
		<!--end::Header-->

		<!--begin::Separator-->
		<div class="separator separator-dashed mt-8 mb-5"></div>
		<!--end::Separator-->

		<!--begin::Nav-->

        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <rect x="0" y="0" width="24" height="24"/>
            <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"/>
            <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"/>
        </g>
    </svg><!--end::Svg Icon-->
    </span>
</div>
</div>


<div  class="modal fade" id="loandig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div style="height:250px"> </div>
      <!-- <div id="loanding" style="width:500px;height:500px;" class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div> -->
      <div id="loanding" style="width:500px;height:500px;" class="spinner-grow text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
        <div class="modal-content" style="opacity: 0;">

        </div>
    </div>
</div>


<div class="modal fade" id="mensajitobb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver Mensaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div id="mensajever"></div>
                  <div id="idmensajever"></div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" onclick="eliminarMensaje()">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary font-weight-bold">Save changes</button> -->
            </div>
        </div>
    </div>
</div>




<!--end::Chat Panel-->

                            <!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
	<span class="svg-icon"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></div>
<!--end::Scrolltop-->



        <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1400
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#3699FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#E4E6EF",
                "dark": "#181C32"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1F0FF",
                "secondary": "#EBEDF3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#3F4254",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#EBEDF3",
            "gray-300": "#E4E6EF",
            "gray-400": "#D1D3E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#7E8299",
            "gray-700": "#5E6278",
            "gray-800": "#3F4254",
            "gray-900": "#181C32"
        }
    },
    "font-family": "Poppins"
};
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



                    <!--begin::Page Vendors(used by this page)-->
                            <script src="/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.6"></script>
                        <!--end::Page Vendors-->

                    <!--begin::Page Scripts(used by this page)-->
                            <script src="/admin/assets/js/pages/widgets.js?v=7.0.6"></script>
                        <!--end::Page Scripts-->
                        <!--begin::Page Vendors(used by this page)-->
                                <script src="/admin/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.6"></script>
                            <!--end::Page Vendors-->
                            <!-- <script src="/admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script> -->
                        <!--begin::Page Scripts(used by this page)-->
                                <!-- <script src="/admin/assets/js/pages/crud/datatables/basic/basic.js?v=7.0.6"></script> -->
                            <!--end::Page Scripts-->
            </body>
    <!--end::Body-->
</html>

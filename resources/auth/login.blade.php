
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
    <head><base href="../../../../">
        <meta charset="utf-8"/>
        <title>SISTEMA BASE</title>
        <meta name="description" content="Login page example"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->


                    <!--begin::Page Custom Styles(used by this page)-->
                             <link href="/admin/assets/css/pages/login/classic/login-4.css?v=7.0.6" rel="stylesheet" type="text/css"/>
                        <!--end::Page Custom Styles-->

        <!--begin::Global Theme Styles(used by all pages)-->
                    <link href="/admin/assets/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
                    <link href="/admin/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
                    <link href="/admin/assets/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
                <!--end::Global Theme Styles-->

        <!--begin::Layout Themes(used by all pages)-->

<link href="/admin/assets/css/themes/layout/header/base/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
<link href="/admin/assets/css/themes/layout/header/menu/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
<link href="/admin/assets/css/themes/layout/brand/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
<link href="/admin/assets/css/themes/layout/aside/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>        <!--end::Layout Themes-->

<link rel="https://api.w.org/" href="https://www.tamaulipas.gob.mx/educacion/wp-json/" /><link rel="icon" href="https://www.tamaulipas.gob.mx/educacion/wp-content/uploads/sites/3/2016/10/cropped-cropped-logotam-1-32x32.png" sizes="32x32" />
<link rel="icon" href="https://www.tamaulipas.gob.mx/educacion/wp-content/uploads/sites/3/2016/10/cropped-cropped-logotam-1-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon" href="https://www.tamaulipas.gob.mx/educacion/wp-content/uploads/sites/3/2016/10/cropped-cropped-logotam-1-180x180.png" />

            </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >

      <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
      <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
      <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('/admin/assets/media/bg/bg-3.jpg');">
        <div class="login-form text-center p-7 position-relative overflow-hidden">
          <!--begin::Login Header-->
          <div class="d-flex flex-center mb-15">
            <a href="#">
              <img src="/admin/assets/media/bg/hhva_sombra.png"  width="400" alt=""/>
            </a>
          </div>
          <!--end::Login Header-->

          <!--begin::Login Sign in form-->
          <div class="login-signin">
            <div class="mb-20">
              <h3>Iniciar sesión para administrar</h3>
              <div class="text-muted font-weight-bold">Ingrese sus datos para iniciar sesión en su cuenta:</div>
            </div>
            <form class="form text-left"  method="POST" action="{{ route('login') }}">
                  @csrf
              <div class="form-group py-2 m-0">
                <input class="form-control h-auto border-0 px-0 placeholder-dark-75"type="email"  id="email" placeholder="Email" name="email" :value="old('email')" required autofocus  autocomplete="off" />
              </div>
              <div class="form-group py-2 border-top m-0">
                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="Password" id="password" placeholder="Password"  name="password" required autocomplete="current-password" autocomplete="off" />
              </div>

              <div class="text-center mt-15">
                <button id="kt_login_signin_submit" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Iniciar Sesión</button>
              </div>
            </form>
            <div class="mt-10">
              <!-- <span class="opacity-70 mr-4">
                Don't have an account yet?
              </span>
              <a href="javascript:;" id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">Sign Up!</a> -->
            </div>
          </div>
          <!--end::Login Sign in form-->

          <!--begin::Login Sign up form-->

          <!--end::Login Sign up form-->

          <!--begin::Login forgot password form-->

          <!--end::Login forgot password form-->
        </div>
      </div>
      </div>
      <!--end::Login-->
      </div>



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
        </script>
        <!--end::Global Config-->

      <!--begin::Global Theme Bundle(used by all pages)-->
               <script src="assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
             <script src="assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
             <script src="assets/js/scripts.bundle.js?v=7.0.6"></script>
        <!--end::Global Theme Bundle-->


                    <!--begin::Page Scripts(used by this page)-->
                            <script src="assets/js/pages/custom/login/login-general.js?v=7.0.6"></script>
                        <!--end::Page Scripts-->
            </body>
    <!--end::Body-->
  </html>

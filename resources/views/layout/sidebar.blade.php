
<nav>
    <div class="app-logo">
        <a class="logo d-inline-block" href="/dashboard">
            <img src="{{asset('../assets/images/logo/logospas.png')}}" alt="#">
        </a>

        <span class="bg-light-primary toggle-semi-nav">
          <i class="ti ti-chevrons-right f-s-20"></i>
        </span>
    </div>
    <div class="app-nav" id="app-simple-bar">
        <ul class="main-nav p-0 mt-2">
            <li class="menu-title" >
                <span>Dashboard</span>
            </li>
            @foreach (obtenerModulosActivos() as $key => $value)
              @php
              $alias = $value->get('alias');
              @endphp
              @foreach(obtenerModulo() as $values)
                 @php
                 $aliast = $values->modulo;
                 @endphp
                @if($alias == $aliast)
                <li @if($value->get("contenido"))  @else class="no-sub" aria-haspopup="true"  @endif>
                  <a   @if($value->get("contenido"))  class="" data-bs-toggle="collapse" href="#dashboard" aria-expanded="false" @else class=" "  @endif  href="@if($value->get('contenido')) javascript:; @else /{{ $alias }} @endif"  >
                      <i class="{{ $value->get('icono') }}"></i>
                      <span class="menu-text">{{ $value->get('titulo') ? $value->get('titulo') : $value->get('name') }}</span>
                        @if ( $value->get('contenido') )

                        <i class="menu-arrow"></i>
                        @endif
                  </a>
                  @if ( $value->get('contenido') )
                    @php $array_usuarios = $value->get('contenido'); @endphp

                      <ul class="collapse" id="dashboard">
                        @foreach ($array_usuarios as $key => $value)

                          <li >
                            <a  href="{{ $value['enlace'] }}"><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">{{ $key }}</span></a>
                          </li>
                        @endforeach
                      </ul>

                  </li>
                  @endif
                @endif

              @endforeach
            @endforeach






        </ul>
    </div>

    <div class="menu-navs">
        <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
        <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
    </div>

</nav>

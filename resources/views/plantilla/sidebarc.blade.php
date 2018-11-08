<div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="nav-icon icon-speedometer"></i>MyCant&Cat
                <span class="badge badge-primary">TODAY</span>
              </a>
            </li>
            <li class="nav-title">Cliente</li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::action('CalificacionController@reporteCali')}}">
                <i class="nav-icon icon-like"></i> Calificacion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::action('CalificacionController@reporteCali')}}">
                <i class="nav-icon icon-like"></i> Calificanos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::action('HistorialMedicoController@reporteHis')}}">
                <i class="nav-icon icon-chart"></i>Historial Medico</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::action('ClienteController@reporteCli')}}">
                <i class="nav-icon icon-user-follow"></i> Cliente</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::action('ClienteController@reporteCli')}}">
                <i class="nav-icon icon-user-follow"></i>Cliente</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::action('MascotaController@altaMasc')}}">
                <i class="nav-icon icon-badge"></i> Mascota</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::action('CitaController@reporteCita')}}">
                <i class="nav-icon icon-calendar"></i> Citas</a>
            </li>
            <li class="nav-title">TU CLINICA</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-question"></i> Quienes Somos</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="nav-icon icon-book-open"></i>Misión</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="nav-icon icon-eye"></i>Visión</a>
                </li>
              </ul>
            </li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-heart"></i> Nuestros Servicios</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="nav-icon icon-heart"></i> Medicos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="nav-icon icon-emotsmile"></i> Estetica</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="nav-icon icon-star"></i> Otros Servicios</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="nav-icon icon-envelope-letter"></i> Contacto</a>
            </li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-location-pin"></i> Ubicanos</a>
              <ul class="nav-dropdown-items">

                <li class="nav-item">
                  <a class="nav-link" href="icons/coreui-icons.html">
                    <i class="nav-icon icon-globe"></i> Nuestra Clinica
                    <span class="badge badge-success">NEW</span>
                  </a>
                </li>
                </ul>
            </li>            
            </li>
            <li class="nav-item">
              <a class="nav-link" href="widgets.html">
                <i class="nav-icon icon-user-following"></i>Hitorias
                <span class="badge badge-primary">NEW</span>
              </a>
            </li>
            <li class="nav-item mt-auto">
              <a class="nav-link nav-link-success" href="{{URL::action('CitaController@altaCita')}}" target="_top">
                <i class="nav-icon icon-calendar"></i> Agenda Tu Cita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-danger" href="#" target="_top">
                <i class="nav-icon icon-layers"></i> MyCant&Cat
                <strong>PRO</strong>
              </a>
            </li>
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
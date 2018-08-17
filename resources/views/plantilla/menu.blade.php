<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar menu_ocultar">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">



        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-tags "></i><span class="hide-menu">Ordenes</span></a>
          <ul aria-expanded="true" class="collapse">
            <li><a href="{{ route('vista_generar') }}">Generar Orden</a></li> 
              {{-- <li><a href="route('ver_facturas')">Ver Ordenes</a></li> --}}
              {{-- <li><a href="{{ route('caja_menor') }}">Caja Menor</a>
              <li><a href="{{ route('ver_entradas') }}">Entradas Caja Menor</a></li>
              <li><a href="{{ route('ver_salidas') }}">Salidas Caja Menor</a></li> --}} 
            </li>
          </ul>
        </li>

        <li>
          <a href="{{ route('areas') }}" class="collapse" href="javascript:void(0)" aria-expanded="true">
             <i class="mdi mdi-cube"></i>
             <span class="hide-menu">Areas</span>
          </a>
        </li>


        <!-- Menú de administracion de usuarios roles y permisos -->
        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-badge "></i><span class="hide-menu">Roles y permisos</span></a>
          <ul aria-expanded="true" class="collapse">
            <li><a href="{{ url('listado_usuarios')}}">Listado Usuarios</a></li>
          </ul>
        </li>
        <!-- Fin menu -->
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
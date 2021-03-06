<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar menu_ocultar">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">

        <li>
          <a href="{{ route('ordenes.index') }}" class="collapse" href="javascript:void(0)" aria-expanded="true">
             <i class="mdi mdi-content-paste"></i>
             <span class="hide-menu">Requerimiento</span>
          </a>
        </li>

        <li>
          <a href="{{ route('aceptar_requerimiento') }}" class="collapse" href="javascript:void(0)" aria-expanded="true">
             <i class="mdi mdi-verified"></i>
             <span class="hide-menu">Aceptar Requerimiento</span>
          </a>
        </li>
               
          <li>
          <a href="{{ route('designados') }}" class="collapse" href="javascript:void(0)" aria-expanded="true">
             <i class="mdi mdi-account-multiple-plus"></i>
             <span class="hide-menu">Asignar Colaborador A Requerimiento</span>
          </a>
        </li>
      

        <li>
          <a href="{{ route('ver_items') }}" class="collapse" href="javascript:void(0)" aria-expanded="true">
             <i class="mdi mdi-animation"></i>
             <span class="hide-menu">Mis Items</span>
          </a>
        </li>

        <li>
          <a href="{{ route('colaboradores') }}" class="collapse" href="javascript:void(0)" aria-expanded="true">
             <i class="fa fa-group"></i>
             <span class="hide-menu">Colaboradores</span>
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
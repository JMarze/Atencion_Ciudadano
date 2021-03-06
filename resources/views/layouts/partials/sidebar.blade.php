<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">ADMINISTRACIÓN</li>
            <!-- Optionally, you can add icons to the links -->
            <li id="home"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>

            <li id="usuarios">
                <a href="{{ route('usuario.index') }}">
                    <i class='fa fa-user'></i> <span>Usuarios</span>
                </a>
            </li>

            <li id="unidades">
                <a href="{{ route('unidad.index') }}">
                    <i class='fa fa-cubes'></i> <span>Unidades Organizacionales</span>
                </a>
            </li>

            <li id="puntos">
                <a href="{{ route('punto_atencion.index') }}">
                    <i class='fa fa-cube'></i> <span>Puntos de Atención</span>
                </a>
            </li>

            <li id="fichas">
                <a href="{{ route('ficha_diagnostico.index') }}">
                    <i class='fa fa-id-card'></i> <span>Fichas Diagnóstico</span>
                </a>
            </li>

            <li id="servidores">
                <a href="{{ route('servidor_municipal.index') }}">
                    <i class='fa fa-user-plus'></i> <span>Servidores Municipales</span>
                </a>
            </li>

            <li id="reportes">
                <a href="{{ route('reporte.index') }}">
                    <i class='fa fa-file-o'></i> <span>Reportes</span>
                </a>
            </li>

            <!--<li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li>-->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

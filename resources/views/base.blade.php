<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alumni - IFSP</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- Google Font: Nunito -->
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/padrao.css')}}">
    <!-- jQuery -->
    <script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    @yield('headLk')
  
  </head>
  <body class="hold-transition sidebar-mini layout-navbar-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light" >
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link btn btn-light" data-toggle="dropdown" href="#">
              @if (Session::has('aluno'))
                {{session('aluno')->nome}}
              @elseif(Session::has('extensao'))
                {{session('extensao')->nome}} {{session('extensao')->sobrenome}}
              @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="{{route('logout')}}" class="dropdown-item"> <i class="fas fa-sign-out-alt mr-2"></i> Encerrar Sessão</a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link elevation-4">
          <img src="{{asset('dashboard/dist/img/logoAlumniB.png')}}"
               alt="AdminLTE Logo"
               class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">Alumni - IFSP</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <nav class="mt-2">
          <!-- Sidebar Menu -->
            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="../widgets.html" class="nav-link">
                  <i class="fas fa-home mr-3"></i>
                  <p>Página Inicial <i class="right fas fa-angle-right"></i></p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="{{route('perfil.aluno')}}" class="nav-link">
                  <i class="fas fa-user-circle mr-3"></i>
                  <p>Perfil <i class="right fas fa-angle-right"></i></p>
                </a>
              </li> 
              @if(Session::has('extensao'))
              <li class="nav-item">
                <a href="{{route('noticia.index')}}" class="nav-link">
                  <i class="fas fa-university mr-3"></i>
                  <p>Campus <i class="right fas fa-angle-right"></i></p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{route('egresso.index')}}" class="nav-link">
                  <i class="fas fa-user-graduate mr-3"></i>
                  <p>Egressos <i class="right fas fa-angle-right"></i></p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{route('evento.index')}}" class="nav-link">
                  <i class="fas fa-calendar-alt mr-3"></i>
                  <p>Eventos <i class="right fas fa-angle-right"></i></p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{route('noticia.index')}}" class="nav-link">
                  <i class="fas fa-newspaper mr-3"></i>
                  <p>Notícias <i class="right fas fa-angle-right"></i></p>
                </a>
              </li> 
              @elseif(Session::has('aluno'))
              <li class="nav-item">
                  <a class="nav-link">
                      <i class="fas fa-user-circle mr-3"></i>
                      <p>Cadastros alu <i class="right fas fa-angle-right"></i></p>
                  </a>
              </li>
              @endif
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- /.content -->
        @yield('content')
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer text-center">
        Copyright &copy; IFSP 2019.
      </footer>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <!-- Bootstrap 4 -->
    <script src="{{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dashboard/dist/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('dashboard/dist/js/demo.js')}}"></script>
    <script src="{{asset('dashboard/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('dashboard/plugins/daterangepicker/moment.min.js')}}"></script>
    <script type="text/javascript">
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
    @yield('script')
  </body>
</html>

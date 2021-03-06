<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lomba GMIST</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('theme/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('theme/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('theme/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{url('theme/assets/images/favicon.ico')}}" />
  
    <style>
      .AutoScroll {
        color: #fff;
        position: relative;
        top: 10px;
        max-height: 200px;
        overflow-y: scroll;
        padding: 20px;
      }
      </style>
      
      @livewireStyles
      <script src="{{ mix('js/app.js') }}" defer></script>
  </head>
  <body>
    <div class="container-scroller">
     
      <!-- partial:partials/_navbar.html -->
      
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">                
                  <img src="{{url('img/gmist.png')}}" style="width:150px;height:150px;">
                  
              </a>
              <div class="nav-profile-text d-flex flex-column">
                <span class="mb-2">FESTIVAL SENI BUDAYA DAERAH GEREJAWI</span>
                <span class="font-weight-bold mb-2">PELKA LAKI-LAKI SINODE GMIST TAHUN 2022</span>
                <span class="text-secondary text-small">DILAKSANAKAN OLEH :</span>
                <span class="font-weight-bold mb-2">JEMAAT GMIST EKKLESIA TAHUNA</span>
              </div>
            </li>
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <img src="{{url('img/himasi.png')}}" style="width:80px;height:80px;">
                <div class="nav-profile-text d-flex flex-column">
                  
                  <span class="text-secondary text-small">Crafted by:</span>
                  <span class="font-weight-bold mb-2">HIMAPROS-SI</span>
                  <span class="text-secondary text-small">Sistem Informasi</span>
                  <span class="text-secondary text-small">Polnustar</span>
                </div>
              </a>
            </li>
            
          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
        <!-- partial -->

          {{ $slot }}
          

        <!-- main-panel ends -->
          </div>
        </div>
        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright ?? Himapros Sistem Informasi Polnustar</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{url('theme/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{url('fitur/jquery1.min.js')}}"></script>
    <script src="{{url('fitur/autoscroll.min.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{url('theme/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('theme/assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{url('theme/assets/js/off-canvas.js')}}"></script>
    <script src="{{url('theme/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{url('theme/assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{url('theme/assets/js/dashboard.js')}}"></script>
    <script src="{{url('theme/assets/js/todolist.js')}}"></script>
    <script type="text/javascript">
      $("tbl").scroller();
    </script>
    <!-- End custom js for this page -->
    @livewireScripts
  </body>
</html>
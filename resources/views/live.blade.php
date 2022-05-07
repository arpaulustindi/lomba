
<!DOCTYPE html>
<html lang="en">
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
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="row"  style="height: 250px;">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body" style="height: 200px;">
                    <img src="{{url('theme/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Sedang Tampil <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h3 class="mb-5">GMIST Jemaat Kendaghe Ruata Tahuna</h3>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{url('theme/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Nilai <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">BELUM DINILAI</h2>
                  </div>
                </div>
              </div>              
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{url('theme/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Medali <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h3 class="mb-5">Belum</h3>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Live Ranking Lomba</h4>
                    <div class="table-responsive"> 
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width:10%"> Juara </th>
                            <th style="width:30%"> Medali </th>
                            <th style="width:45%"> Peserta </th>
                            <th style="width:25%"> Nilai </th>
                          </tr>
                        </thead> 
                      </table>
                    </div>
                    <div id="tbl" class="AutoScroll scroller" data-config='{"delay" : 2000 , "amount" : 50}'>
                      <div class="table-responsive">                    
                        <table class="table">                                                
                          <tbody>                          
                            <tr>
                              <td> 1 </td>
                              <td>
                                <img src="{{url('img/gold.png')}}" class="me-2" alt="image">
                                <label class="badge badge-gradient-warning">GOLD</label>
                              </td>
                              <td> GMIST Jemaat Eklesia Tahuna </td>
                              <td> 93,01 </td>
                            </tr>
                            <tr>
                              <td> 2 </td>
                              <td>
                                <img src="{{url('img/gold.png')}}" class="me-2" alt="image">
                                <label class="badge badge-gradient-warning">GOLD</label>
                              </td>
                              <td> GMIST Jemaat Maranatha Tahuna</td>
                              <td> 90,81 </td>
                            </tr>
                            <tr>
                              <td> 3 </td>
                              <td>
                                <img src="{{url('img/silver.png')}}" class="me-2" alt="image">
                                <label class="badge badge-gradient-secondary">SILVER</label>
                              </td>
                              <td> GMIST Jemaat Imanuel Tahuna </td>
                              <td> 88,60 </td>
                            </tr>
                            <tr>
                              <td> 4 </td>
                              <td>
                                <img src="{{url('img/bronze.png')}}" class="me-2" alt="image">
                                <label class="badge badge-gradient-danger">BRONZE</label>
                              </td>
                              <td> GMIST Jemaat Galilea Tahuna</td>
                              <td> 78,40 </td>
                            </tr>
                            <tr>
                              <td> 5 </td>
                              <td>
                                <img src="{{url('img/gold.png')}}" class="me-2" alt="image">
                                <label class="badge badge-gradient-warning">GOLD</label>
                              </td>
                              <td> GMIST Jemaat Eklesia Tahuna </td>
                              <td> 93,01 </td>
                            </tr>
                            <tr>
                              <td> 6 </td>
                              <td>
                                <img src="{{url('img/gold.png')}}" class="me-2" alt="image">
                                <label class="badge badge-gradient-warning">GOLD</label>
                              </td>
                              <td> GMIST Jemaat Maranatha Tahuna</td>
                              <td> 90,81 </td>
                            </tr>
                            <tr>
                              <td> 7 </td>
                              <td>
                                <img src="{{url('img/silver.png')}}" class="me-2" alt="image">
                                <label class="badge badge-gradient-secondary">SILVER</label>
                              </td>
                              <td> GMIST Jemaat Imanuel Tahuna </td>
                              <td> 88,60 </td>
                            </tr>
                            <tr>
                              <td> 8 </td>
                              <td>
                                <img src="{{url('img/bronze.png')}}" class="me-2" alt="image">
                                <label class="badge badge-gradient-danger">BRONZE</label>
                              </td>
                              <td> GMIST Jemaat Galilea Tahuna</td>
                              <td> 78,40 </td>
                            </tr>
                          </tbody>                      
                        </table>                    
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Himapros Sistem Informasi Polnustar</span>
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
  </body>
</html>
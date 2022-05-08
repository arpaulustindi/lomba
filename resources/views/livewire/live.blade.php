<div class="max-w-7xl">
     <!-- partial -->
        
          
            
            <div class="row"  style="height: 250px;">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body" style="height: 200px;">
                    <img src="{{url('theme/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Sedang Tampil <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h3 class="mb-5">
                      <div wire:poll>
                      @if($peserta == null)
                        Tidak Ada Peserta Aktif
                      @elseif($peserta->tahap == 4)
                        Tidak Ada Peserta Aktif
                      @else
                        {{$peserta->nama}}
                      @endif
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{url('theme/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Nilai <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h1>
                      <div wire:poll>
                      @if($peserta == null)
                        Tidak Ada Peserta Aktif
                      @elseif($peserta->nilai == -1)
                        BELUM DINILAI
                      @else
                        <div wire:poll>{{round($peserta->nilai,2)}}</div>
                      @endif
                      </div>
                    </h1>
                  </div>
                </div>
              </div>              
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{url('theme/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Medali <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h3 class="mb-5">
                      <div wire:poll>
                        @if($peserta == null)
                          Tidak Ada Peserta Aktif
                        @elseif($peserta->nilai == -1) 
                            {{ "BELUM" }} 
                        @elseif($peserta->nilai >= 80) 
                            <img src="{{('img/gold.png')}}" style="width:40px;height:40px;display:inline"/> {{ "GOLD" }}
                        @elseif($peserta->nilai >= 70)
                            <img src="{{('img/silver.png')}}"  style="width:40px;height:40px;display:inline"/> {{ "SILVER" }}
                        @else
                            <img src="{{('img/bronze.png')}}"  style="width:40px;height:40px;display:inline"/> {{ "BRONZE" }}
                        @endif
                        <div wire:poll>
                    </h3>
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
                    <div wire:poll>
                    <div id="tbl" class="AutoScroll scroller" data-config='{"delay" : 2000 , "amount" : 50}'>
                      <div class="table-responsive"> 
                        @if($peserta != null)
                                          
                        <table class="table">                                                
                          <tbody>  
                            <?php $no = 0;?>
                            @foreach($pesertas as $peserta_)   
                            <?php $no++;?>                     
                            <tr>
                              <td style="width:10%"> {{$no}} </td>
                              <td style="width:30%" class="text-left">
                                @if($peserta_->nilai == -1) 
                                    {{ "BELUM" }} 
                                @elseif($peserta_->nilai >= 80) 
                                  <img src="{{url('img/gold.png')}}" class="me-2 inline-block" alt="image">
                                  <label class="badge badge-gradient-warning">GOLD</label>
                                @elseif($peserta_->nilai >= 70)
                                  <img src="{{url('img/silver.png')}}" class="me-2 inline-block" alt="image">
                                  <label class="badge badge-gradient-secondary">SILVER</label>
                                @else
                                  <img src="{{url('img/bronze.png')}}" class="me-2 inline-block" alt="image">
                                  <label class="badge badge-gradient-danger">BRONZE</label>
                                @endif
                              
                              </td>
                              <td style="width:45%"> {{$peserta_->nama}} </td>
                              <td style="width:25%" class="font-weight-bold text-right"> @if($peserta_->nilai == -1) {{ "BELUM" }} @else {{ round($peserta_->nilai, 2) }} @endif </td>
                            </tr>
                            @endforeach
                          </tbody>                      
                        </table> 
                        
                        @endif                  
                      </div>
                    </div>
                    </div>
                </div>
              </div>
            </div>
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          

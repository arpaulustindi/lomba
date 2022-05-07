<x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">     
    @if(auth()->user()->level == 'JURI')
    HALAMAN PENJURIAN
    @else
    ANDA TIDAK DIPERBOLEHKAN MENGAKSES HALAMAN INI
    @endif
</h2>

</x-slot>

<div class="py-12">
  @if(auth()->user()->level == 'JURI')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        @if($pesertas == null)
          Tidak Ada Peserta Aktif
        @elseif($pesertas->tahap == 4)
          Tidak Ada Peserta Aktif
        @else
          Penilaian Untuk Peserta : <div wire:poll>{{$pesertas->nama}}</div>
        @endif
    </h2>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            @if($pesertas != null && $pesertas->tahap != 4)
              <div wire:poll>
              @if($pesertas->tahap == 1)
                  {{ 'SEDANG TAMPIL' }}
              @elseif($pesertas->tahap == 2)
                  {{ 'BERIKAN PENIALAIAN ANDA' }}
                  <form>
                      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="">
                              
                              <div class="mb-4">
                                <input type="hidden" value="{{$pesertas->pesertas_id}}" wire:model="peserta_id"/>
                                  <label for="exampleFormControlInput1" class="text-xl block text-gray-700 text-sm font-bold mb-2">Nilai Juri {{auth()->user()->juri}}:</label>
                                  <input type="number" class="text-xl shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"  
                                    @if(auth()->user()->juri == 1) 
                                      wire:model="nilai1" 
                                      @if($pesertas->nilai1 == -1) 
                                        placeholder="Input Nilai Di Sini.."
                                      @else
                                      placeholder="{{$pesertas->nilai1}}"
                                        disabled 
                                      @endif 
                                    @elseif(auth()->user()->juri == 2) 
                                      wire:model="nilai2" 
                                      @if($pesertas->nilai2 == -1) 
                                        placeholder="Input Nilai Di Sini.." 
                                      @else
                                        placeholder="{{$pesertas->nilai2}}"
                                        disabled 
                                      @endif 
                                    @elseif(auth()->user()->juri == 3) 
                                      wire:model="nilai3" 
                                      @if($pesertas->nilai3 == -1) 
                                        placeholder="Input Nilai Di Sini.." 
                                      @else
                                      placeholder="{{$pesertas->nilai3}}"
                                        disabled 
                                      @endif 
                                    @endif
                                    />
                                    @if(auth()->user()->juri == 1)
                                      @error('nilai1') <span class="text-red-500">{{ $message }}</span> @enderror
                                    @elseif(auth()->user()->juri == 2)
                                      @error('nilai2') <span class="text-red-500">{{ $message }}</span> @enderror
                                    @elseif(auth()->user()->juri == 3)
                                      @error('nilai3') <span class="text-red-500">{{ $message }}</span> @enderror
                                    @endif
                              </div>
                              
                        </div>
                      </div>
                  
                      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                          @if(auth()->user()->juri == 1 && $pesertas->nilai1 == -1) 
                            <button id="tombol" wire:click.prevent="prapenilaian()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 text-xl">
                              BERI PENILAIAN
                            </button>
                            @elseif(auth()->user()->juri == 2 && $pesertas->nilai2 == -1)
                            <button id="tombol" wire:click.prevent="prapenilaian()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 text-xl">
                              BERI PENILAIAN
                            </button>
                            @elseif(auth()->user()->juri == 3 && $pesertas->nilai3 == -1)
                            <button id="tombol" wire:click.prevent="prapenilaian()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 text-xl">
                              BERI PENILAIAN
                            </button>
                            @else
                            <button disabled id="tombol" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-gray-500 text-base leading-6 font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 text-xl">
                              TELAH DINIILAI
                            </button>
                            @endif
                          </span>
                        </form>
              @elseif($pesertas->tahap == 3)
                  {{ 'SELESAI MENILAI, SILAHKAN MENUNGGU' }}
              @endif
              </div>

              @if($isOpen)
                @include('livewire.penilaian_confirm')
              @endif
            @endif
            <div style="height:20px;"></div>
            <p class="font-bold">supported by: <img src="{{ url('img/himasi.png')}}" style="width:40px;height:40px;display:inline"/> Himpunan Mahasiswa Sistem Informasi Polnustar</p>
        </div>
    </div>
    @endif
</div>



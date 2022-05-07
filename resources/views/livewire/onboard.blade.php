<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">     

        @if(auth()->user()->level == 'ADMIN' || auth()->user()->level == 'OPERATOR')
            @if($lombas == null)
            TIDAK ADA LOMBA AKTIF
            @else
            ON BOARD : Lomba {{ $lombas->nama }}
            @endif
        @else
        ANDA TIDAK DIPERBOLEHKAN MENGAKSES HALAMAN INI
        @endif
    </h2>
</x-slot>
@if(auth()->user()->level == 'ADMIN' || auth()->user()->level == 'OPERATOR')
<div class="py-12">
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
            
            @if($lombas != null)
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">Urutan</th>
                        <th class="px-4 py-2">Nama Peserta</th>
                        <th class="px-4 py-2">Tahapan</th>
                        <th class="px-4 py-2">Nilai</th>
                        <th class="px-4 py-2">Kategori</th>
                    </tr>
                </thead>
                
                <tbody>
                    
                    @foreach($pesertas as $peserta)
                    <tr>
                        <td class="border px-4 py-2">{{ $peserta->urutan }}</td>
                        <td class="border px-4 py-2">{{ $peserta->nama }}</td>
                        <td class="border px-4 py-2 text-center">
                            @if($peserta->aktif == false && $peserta->tahap != 4)
                                <button wire:click="aktivasi('{{$peserta->id}}')" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full">#</button>
                            @else
                            @switch($peserta->tahap)
                                @case(1)
                                    <button wire:click="tahapan({{$peserta->id}},1)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">></button>
                                    <button wire:click="tahapan({{$peserta->id}},2)" class="bg-gray-500 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-full">=</button>
                                    <button wire:click="tahapan({{$peserta->id}},3)" class="bg-gray-500 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-full">|</button>
                                @break
                                @case(2)
                                    <button wire:click="tahapan({{$peserta->id}},1)" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">></button>
                                    <button wire:click="tahapan({{$peserta->id}},2)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">=</button>
                                    <button wire:click="tahapan({{$peserta->id}},3)" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">|</button>
                                @break
                                @case(3)
                                <button wire:click="tahapan({{$peserta->id}},4)" class="bg-gray-500 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-full">\</button>
                                @break
                                @case(4)
                                <button disabled class="bg-gray-500 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-full">FINISH</button>
                                @break
                            @endswitch
                            @endif
                            
                        </td>
                        <td class="border px-4 py-2 font-bold text-center">@if($peserta->nilai == -1) {{ "BELUM" }} @else {{ round($peserta->nilai, 2) }} @endif</td>
                        <td class="border px-4 py-2">
                            @if($peserta->nilai == -1) 
                                {{ "-" }} 
                            @elseif($peserta->nilai >= 80) 
                                <img src="{{('img/gold.png')}}" style="width:40px;height:40px;display:inline"/> {{ "GOLD" }}
                            @elseif($peserta->nilai >= 70)
                                <img src="{{('img/silver.png')}}"  style="width:40px;height:40px;display:inline"/> {{ "SILVER" }}
                            @else
                                <img src="{{('img/bronze.png')}}"  style="width:40px;height:40px;display:inline"/> {{ "BRONZE" }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
            @endif
            <div style="height:20px;"></div>
            <p class="font-bold">supported by: <img src="{{ url('img/himasi.png')}}" style="width:40px;height:40px;display:inline"/> Himpunan Mahasiswa Sistem Informasi Polnustar</p>          
        </div>
    </div>
</div>
@endif
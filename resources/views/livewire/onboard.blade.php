<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        ON BOARD : Lomba {{ $lombas->nama }}
    </h2>
</x-slot>
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
                            @if($peserta->aktif == false)
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
                                    <button wire:click="tahapan({{$peserta->id}},1)" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">></button>
                                    <button wire:click="tahapan({{$peserta->id}},2)" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">=</button>
                                    <button wire:click="tahapan({{$peserta->id}},3)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">|</button>
                                @break
                            @endswitch
                            @endif
                            
                        </td>
                        <td class="border px-4 py-2">@if($peserta->nilai == -1) {{ "BELUM" }} @else {{ $peserta->nilai }} @endif</td>
                        <td class="border px-4 py-2">
                            @if($peserta->nilai == -1) 
                                {{ "-" }} 
                            @elseif($peserta->nilai >= 80) 
                                {{ "GOLD" }}
                            @elseif($peserta->nilai >= 70)
                                {{ "SILVER" }}
                            @else
                                {{ "BRONZE" }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
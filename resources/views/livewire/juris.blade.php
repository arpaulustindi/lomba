<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        <div>   
    </h2>
</x-slot>
@if(auth()->user()->level == 'ADMIN')
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
            @if($isOpen)
                @include('livewire.juris_edit')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">NO.</th>
                        <th class="px-4 py-2">Nama Juri</th>
                        <th class="px-4 py-2 w-60">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($juris as $juri)
                    <tr>
                        <td class="border px-4 py-2">{{ $juri->juri }}</td>
                        <td class="border px-4 py-2">{{ $juri->name }}</td>
                        <td class="border px-4 py-2 text-center">
                            <button wire:click="edit({{ $juri->id }})" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">Edit</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="height:20px;"></div>
            <p class="font-bold">supported by: <img src="{{ url('img/himasi.png')}}" style="width:40px;height:40px;display:inline"/> Himpunan Mahasiswa Sistem Informasi Polnustar</p>
        </div>
    </div>
</div>
@endif
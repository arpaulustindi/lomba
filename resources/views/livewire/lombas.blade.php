<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        @if(auth()->user()->level == 'ADMIN')
        Kelola Data LOMBA
        @else
        ANDA TIDAK DIPERBOLEHKAN MENGAKSES HALAMAN INI
        @endif
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
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1">Tambahkan Lomba Baru</button>
            @if($isOpen)
                @include('livewire.lombas_create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">ID.</th>
                        <th class="px-4 py-2">Jenis</th>
                        <th class="px-4 py-2">Nama Perlombaan</th>
                        <th class="px-4 py-2">Aktif</th>
                        <th class="px-4 py-2">Peserta</th>
                        <th class="px-4 py-2 w-60">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lombas as $lomba)
                    <tr>
                        <td class="border px-4 py-2">{{ $lomba->id }}</td>
                        <td class="border px-4 py-2">{{ $lomba->jenis }}</td>
                        <td class="border px-4 py-2">{{ $lomba->nama }}</td>
                        <td class="border px-4 py-2 text-center">
                            @if($lomba->aktif == false)
                                <button wire:click="aktivasi({{ "'".$lomba->id."'" }})" class="bg-gray-500 hover:bg-gray-700 text-white py-1 px-3 rounded">Aktifkan</button>
                            @else
                                <button wire:click="deaktivasi({{ "'".$lomba->id."'" }})" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded">Nonaktifkan</button>
                            @endif
                            
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <button wire:click="peserta({{ "'".$lomba->id."'" }})" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">Registrasi</button>
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <button wire:click="edit({{ "'".$lomba->id."'" }})" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">Edit</button>
                            <button wire:click="delete({{ "'".$lomba->id."'" }})" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded">Hapus</button>
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
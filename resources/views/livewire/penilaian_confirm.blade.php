<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
    
      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
    
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="">
                <p class="text-center text-lg text-bold">Apakah Anda Yakin Akan Memberikan</p>
                @if(auth()->user()->juri == 1)
                    <p class="text-center text-lg text-bold">Nilai : {{$nilai1}}</p>
                @elseif(auth()->user()->juri == 2)
                    <p class="text-center text-lg text-bold">Nilai : {{$nilai2}}</p>
                @elseif(auth()->user()->juri == 3)
                    <p class="text-center text-lg text-bold">Nilai : {{$nilai3}}</p>  
                @endif             
                <div class="text-center text-lg" wire:poll>Kepada {{$pesertas->nama}} ..?</div>
                <hr/>
                <p><small>Jika Anda Setuju, Maka Nilai Tidak Akan Bisa Diubah Lagi</small></p>
                <p><small>Jika Ingin Merubah Nilai, Tekan Batal</small></p>
          </div>
        </div>
    
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click.prevent="penilaian('{{auth()->user()->juri}}')" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Setuju
            </button>
          </span>
          <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
              
            <button wire:click="closeModal()" type="button" class="content-start inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Batal
            </button>
          </span>
          </form>
        </div>
          
      </div>
    </div>
  </div>
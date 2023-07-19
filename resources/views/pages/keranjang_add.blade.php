<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __('Data Pelanggan') }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-8 flex-wrap">
            <div class="flex justify-start w-full flex-wrap gap-8">
                <a href="{{ route('keranjang') }}" class='h-8 w-8 rounded-full p-2 bg-amber-600 text-white flex justif-center items-center  active:bg-amber-400 cursor-pointer'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                      </svg>
                </a>
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Keranjang</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Tambah</span>
                        </div>
                    </li>
                    </ol>
                </nav>
                {{-- <x-primary-button>{{ __('Upload') }}</x-primary-button>
                <x-primary-button>{{ __('Tambah') }}</x-primary-button>       --}}
            </div>
            <div class="w-full relative overflow-x-auto shadow-sm sm:rounded-lg bg-white p-8">
                <h1 class="mb-8 text-xl text-center">Form Pembelian Tabung Gas</h1>
                <form action="/keranjang/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="pembeli" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pembeli</label>
                        <input type="text" disabled value="{{$user->name}}" id="pembeli" name="pembeli" class="bg-gray-50 border opacity-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600" required>
                    </div>
                    <div class="mb-6">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select disabled id="status-pembeli" name="status" class="bg-gray-50 border opacity-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600" required>
                            <option selected>-- Pilih Status -- </option>
                            <option {{$user->status === 'Rumah Tangga' ? 'selected' : ''}} value="Rumah Tangga">Rumah Tangga</option>
                            <option {{$user->status === 'Warung' ? 'selected' : ''}} value="Warung">Warung</option>
                            <option {{$user->status === 'Pedagang' ? 'selected' : ''}} value="Pedagang">Pedagang</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <input type="text" id="alamat" name="alamat" disabled value="{{$user->address}}" class="bg-gray-50 border opacity-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600" required>
                    </div>
                    <div class="mb-6">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Gas</label>
                        <select onchange="selectGas()" id="select-gas" name="jenis_gas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600" required>
                            <option selected>-- Pilih Jenis Gas --</option>
                            @foreach ($jenis_gas as $item)
                            <option value="{{$item->jenis_gas}}">{{$item->jenis_gas}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                        <input id="jumlah-gas" type="number" min="1" id="jumlah_pembelian" name="jumlah_pembelian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600" required>
                    </div>
                    <div class="mb-6">
                        <label for="Tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                        <input type="date" id="Tanggal" name="tanggal_pembelian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600" required>
                    </div>
                    <div class="flex justify-end">
                        <button href="{{ route('pelanggan') }}" class='h-9 rounded-md px-5 bg-slate-700 text-white flex justif-center items-center  active:bg-slate-600 cursor-pointer'>                              
                            <span>Order</span>
                        </button>
                    </div>
                  </form>
            </div>
        </div>
    </div>

    <script>
        const handleJumlahGasInput = () => {
            const statusPembeli = document.getElementById('status-pembeli');
            const jumlahGasInput = document.querySelector('#jumlah-gas');
            jumlahGasInput.value = ''
            if (statusPembeli.value === 'Rumah Tangga') {
                jumlahGasInput.setAttribute('max', "1");
            } else if (statusPembeli.value === 'Pedagang') {
                jumlahGasInput.setAttribute('max', "2");
            } else if (statusPembeli.value === 'Warung') {
                jumlahGasInput.setAttribute('max', "10");
            } else {
                jumlahGasInput.removeAttribute('max');
            }
        };

        const selectGas = () => {
            const statusPembeli = document.getElementById('status-pembeli');
            const selectedGas = document.getElementById('select-gas');
            const jumlahGasInput = document.querySelector('#jumlah-gas');

            if (selectedGas.value.split('').find(gas => gas === '3') !== undefined) {
                handleJumlahGasInput();
            } else {
                jumlahGasInput.removeAttribute('max');
            }
        };
    </script>
</x-app-layout>

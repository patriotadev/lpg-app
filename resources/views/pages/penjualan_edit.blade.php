<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __('Data Pelanggan') }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-8 flex-wrap">
            <div class="flex justify-start w-full flex-wrap gap-8">
                <a href="{{ route('penjualan') }}" class='h-8 w-8 rounded-full p-2 bg-indigo-500 text-white flex justif-center items-center  active:bg-indigo-400 cursor-pointer'>
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
                        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Penjualan</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Edit</span>
                        </div>
                    </li>
                    </ol>
                </nav>
                {{-- <x-primary-button>{{ __('Upload') }}</x-primary-button>
                <x-primary-button>{{ __('Tambah') }}</x-primary-button>       --}}
            </div>
            <div class="w-full relative overflow-x-auto shadow-sm sm:rounded-lg bg-white p-8">
                <h1 class="mb-8 text-xl text-center">Form Edit Penjualan</h1>
                <form action="/penjualan/edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input name="id" value="{{$penjualan->id}}" type="hidden"/>
                    <div class="mb-6">
                        <label for="pembeli" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pembeli</label>
                        <input type="text" disabled value="{{$penjualan->pembeli}}" id="pembeli" name="pembeli" class="bg-gray-50 border opacity-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600">
                    </div>
                    <div class="mb-6">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select disabled onchange="handleJumlahGasInput()" id="status-pembeli" name="status" class="bg-gray-50 border opacity-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600">
                            <option selected>-- Pilih Status -- </option>
                            <option {{$penjualan->status === 'Rumah Tangga' ? 'selected' : ''}} value="Rumah Tangga">Rumah Tangga</option>
                            <option {{$penjualan->status === 'Warung' ? 'selected' : ''}} value="Warung">Warung</option>
                            <option {{$penjualan->status === 'Pedagang' ? 'selected' : ''}} value="Pedagang">Pedagang</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <input disabled type="text" id="alamat" name="alamat" value="{{$penjualan->alamat}}" class="bg-gray-50 border opacity-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600">
                    </div>
                    <div class="mb-6">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Gas</label>
                        <select id="status" name="jenis_gas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600" required>
                            <option selected>-- Pilih Jenis Gas --</option>
                            @foreach ($jenis_gas as $item)
                            <option {{$penjualan->jenis_gas === $item->jenis_gas ? 'selected' : ''}} value="{{$item->jenis_gas}}">{{$item->jenis_gas}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                        <input id="jumlah-gas" type="number" min="1" id="jumlah" value="{{$penjualan->jumlah_pembelian}}" name="jumlah_pembelian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600" required>
                    </div>
                    <div class="mb-6">
                        <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                        <input id="tanggal" type="date" value="{{$penjualan->tanggal_pembelian}}" name="tanggal_pembelian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600" required>
                    </div>
                    <div class="mb-6">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="status-pembelian" name="status_pembelian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600">
                            <option>-- Pilih Status -- </option>
                            <option {{$penjualan->status_pembelian === 'Sedang Diproses' ? 'selected' : ''}} value="Sedang Diproses">Sedang Diproses</option>
                            <option {{$penjualan->status_pembelian === 'Dalam Perjalanan' ? 'selected' : ''}} value="Dalam Perjalanan">Dalam Perjalanan</option>
                            <option {{$penjualan->status_pembelian === 'Sudah Diterima' ? 'selected' : ''}} value="Sudah Diterima">Sudah Diterima</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button href="{{ route('pelanggan') }}" class='h-9 rounded-md px-5 bg-slate-700 text-white flex justif-center items-center  active:bg-slate-600 cursor-pointer'>                              
                            <span>Simpan</span>
                        </button>
                    </div>
                  </form>
            </div>
        </div>
    </div>

    <script>

        const statusPembeli = document.getElementById('status-pembeli');
        const jumlahGasInput = document.querySelector('#jumlah-gas');

        window.onload = () => {
            console.log('loaddd');
            if (statusPembeli.value === 'Rumah Tangga') {
                jumlahGasInput.setAttribute('max', "1");
            } else if (statusPembeli.value === 'Pedagang') {
                jumlahGasInput.setAttribute('max', "2");
            } else if (statusPembeli.value === 'Warung') {
                jumlahGasInput.setAttribute('max', "10");
            } else {
                jumlahGasInput.removeAttribute('max');
            }
        }

        const handleJumlahGasInput = () => {
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
        }
    </script>
</x-app-layout>

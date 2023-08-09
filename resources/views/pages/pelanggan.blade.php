<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __('Data Pelanggan') }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex gap-8 flex-wrap sm:rounded-lg">
            <div class="flex justify-between items-center flex-wrap w-full gap-4">    
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Pelanggan</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Tabel</span>
                        </div>
                    </li>
                    </ol>
                </nav>
  
                {{-- @if (Auth::user()->roles === 'admin') 
                    <div class="flex gap-4">
                        <a href="/pelanggan/import" class='h-9 rounded-md px-5 bg-emerald-500 text-white flex justif-center items-center active:bg-emerald-400'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            <span>Import</span>
                        </a>
                        <a href="{{ route('pelanggan_add') }}" class='h-9 rounded-md px-5 bg-indigo-500 text-white flex justif-center items-center active:bg-indigo-400 cursor-pointer'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            
                            <span>Tambah</span>
                        </a>
                    </div>
                @endif --}}
                {{-- <x-primary-button>{{ __('Upload') }}</x-primary-button>
                <x-primary-button>{{ __('Tambah') }}</x-primary-button>       --}}
                
            </div>
            <div class="w-full flex flex-colum gap-2">
                <input onchange="getMonth()" value="{{$selected_month}}" type="month" id="get-month" name="get_month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-600 dark:focus:border-amber-600" required>
            </div>
            <div class="w-full relative overflow-x-auto shadow-sm rounded-lg sm:rounded-lg bg-white p-8">
                <table class="table w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs h-14 text-slate-800 uppercase dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanda Tangan
                            </th>
                            @if (Auth::user()->roles === 'admin') 
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                            @endif
                            <th scope="col" class="px-6 py-3">
                                Tahun - Bulan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item['nama'] }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item['alamat'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item['status'] }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($item['tanda_tangan'])    
                                    <img src="{{ asset('images/users/' . $item['tanda_tangan']) }}" width="30" alt="Tanda Tangan"/>
                                    @else
                                    -
                                    @endif
                                </td>
                                @if (Auth::user()->roles === 'admin')                
                                <td class="px-6 py-4">
                                    <a href="/pelanggan/edit/{{$item['id']}}" class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Tanda Tangan</a href="#">
                                        {{-- <a href="/pelanggan/destroy/{{$item->id}}" data-confirm-delete="true" class="bg-rose-200 text-rose-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-rose-200 dark:text-rose-800">Hapus</a href="#"> --}}
                                </td>
                                @endif
                                <td class="px-6 py-4">
                                    {{ $item['bulan_tahun'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item['jumlah_penjualan'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        const getMonth = () => {
            const getMonth = document.getElementById('get-month')
            const selectedValue = document.getElementById('get-month').value;
            window.location.href = '/pelanggan/' + selectedValue;
        }
    </script>
</x-app-layout>


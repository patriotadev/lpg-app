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
                        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Penjualan</a>
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
                        <a href="{{ route('penjualan_add') }}" class='h-9 rounded-md px-5 bg-indigo-500 text-white flex justif-center items-center active:bg-indigo-400 cursor-pointer'>
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
            <div class="w-full relative overflow-x-auto shadow-sm rounded-lg sm:rounded-lg bg-white p-8">
                <table class="table w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs h-14 text-slate-800 uppercase dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Pembeli
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis Gas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Status
                            </th> --}}
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            {{-- @if (Auth::user()->roles === 'admin') 
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            @endif --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->pembeli }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->jenis_gas }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->jumlah_pembelian }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->tanggal_pembelian }}
                                </td>
                                {{-- <td>
                                    {{ $item->status_pembelian }}
                                </td> --}}
                                <td class="px-6 py-4">
                                    <div class="flex gap-4">
                                        @if ($item->status_pembelian !== 'Sudah Diterima')
                                            <form method="POST" action="{{ route('penjualan.update.status') }}">
                                                @csrf
                                                <input hidden value="{{$item->id}}" name="id">
                                                <input hidden value="{{$item->status_pembelian}}" name="status_pembelian" >
                                                @if (Auth::user()->roles === 'admin')
                                                <button type="submit" class='h-8 rounded-md px-5 {{$item->status_pembelian === 'Sedang Diproses' ? 'hover:bg-indigo-400 bg-indigo-500' : 'hover:bg-amber-500 bg-amber-600'}} text-white flex justif-center items-center active:bg-indigo-400 cursor-pointer'>   
                                                    @if ($item->status_pembelian === 'Sedang Diproses')
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                    </svg>
                                                    @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                                    </svg>                                                  
                                                    @endif
                                                    <span>{{ $item->status_pembelian === 'Sedang Diproses' ? 'Sedang Diproses' : 'Dalam Perjalanan' }}</span>
                                                </button>
                                                @else
                                                    <span>{{$item->status_pembelian}}</span>
                                                @endif
                                            </form>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-emerald-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        @endif
                                    </div>
                                </td>
                                {{-- @if (Auth::user()->roles === 'admin')    
                                    <td class="px-6 py-4">
                                        <a href="/penjualan/edit/{{$item->id}}" class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Edit</a href="#">
                                        <a href="/penjualan/destroy/{{$item->id}}" data-confirm-delete="true" class="bg-rose-200 text-rose-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-rose-200 dark:text-rose-800">Hapus</a href="#">
                                    </td>
                                @endif --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

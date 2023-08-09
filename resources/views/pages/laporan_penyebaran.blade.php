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
                        <a href="{{route('laporan')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Laporan</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Bulanan</span>
                        </div>
                    </li>
                    </ol>
                </nav>
  
                {{-- <div class="flex gap-4">
                    <a href="{{ route('jenis_gas_add') }}" class='h-9 rounded-md px-5 bg-indigo-500 text-white flex justif-center items-center active:bg-indigo-400 cursor-pointer'>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                          
                        <span>Tambah</span>
                    </a>
                </div> --}}
                {{-- <x-primary-button>{{ __('Upload') }}</x-primary-button>
                <x-primary-button>{{ __('Tambah') }}</x-primary-button>       --}}
            </div>

            <h1 class="font-semibold text-slate-800">Laporan Penyebaran Tabung Gas</h1>

           
            <div class="flex justify-around items-center flex-col w-full">
                <div class="mb-6 w-full flex justify-end">
                    <div class="mb-6 w-48">
                        <label for="bulan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bulan</label>
                            <input id="selected-month" placeholder="yyyy-mm" value="{{$selected_month}}" onchange="selectMonth()" type="month" id="bulan" name="bulan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-blue-500" required>
                    </div>
                </div>
                <div class="w-[500px] h-[500px]">
                    <canvas width="500px" height="300px" id="pie-chart"></canvas>
                </div>
            </div>

        </div>
    </div>
    
    <script src="{{ asset('/js/app.js') }}"></script>
    <script>
        const penjualanList = {!! json_encode($penjualan) !!};
        const penjualanRumahTangga = {!! json_encode($penjualan_rumah_tangga) !!};
        const penjualanPedagang = {!! json_encode($penjualan_pedagang) !!};
        const penjualanWarung = {!! json_encode($penjualan_warung) !!};
        const selectedMonth = {!! json_encode($selected_month) !!};

        // let ctx = document.getElementById('pie-chart').getContext('2d');
        const selectMonth = () => {
            const selectedValue = document.getElementById('selected-month').value;
            window.location.href = '/laporan/penyebaran/' + selectedValue;
           
        }

        console.log(penjualanList);
        console.log(penjualanRumahTangga);
        console.log(penjualanPedagang);
        console.log(penjualanWarung);

        const data = {
            labels: [
                'Rumah Tangga',
                'Pedagang',
                'Warung'
            ],
            datasets: [{
                label: 'Jumlah',
                data: [ 
                    penjualanRumahTangga.length,
                    penjualanPedagang.length,
                    penjualanWarung.length
                ],
                backgroundColor: [
                'rgb(99,102,241)',
                '#f43f5e',
                '#d946ef',
                '#3b82f6',
                '#8b5cf6',
                '#ec4899',
                ],
                hoverOffset: 4
            }]
            };
            const config = {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    animation: {
                    animateScale: true,
                    animateRotate: true
                    }
                }
            }
    </script>
</x-app-layout>

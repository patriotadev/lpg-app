<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-center items-center flex-wrap gap-10 p-8">
                @if (Auth::user()->roles !== 'public')
                    <img src="{{ asset('images/banner/vector1.png') }}" width="400" alt="Image 3">
                    <div class="bg-white hover:shadow-xl hover:-translate-y-2 duration-150 cursor-pointer shadow-xl dark:bg-gray-800 overflow-hidden sm:rounded-lg w-48 h-48 p-4 flex flex-col items-center justify-around">
                        <h1 class="text-6xl">{{ $totalGas }}</h1>
                        <div class="flex justify-center items-end gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                            <div class="">Total Jenis Gas</div>
                        </div>
                    </div>
                    <div class="bg-white hover:shadow-xl hover:-translate-y-2 duration-150 cursor-pointer shadow-xl dark:bg-gray-800 overflow-hidden sm:rounded-lg w-48 h-48 p-4 flex flex-col items-center justify-around">
                        <h1 class="text-6xl">{{$totalPelanggan}}</h1>
                        <div class="flex justify-center items-end gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>                              
                            <div class="">Total Pelanggan</div>
                        </div>
                    </div>
                    <div class="bg-white hover:shadow-xl hover:-translate-y-2 duration-150 cursor-pointer shadow-xl dark:bg-gray-800 overflow-hidden sm:rounded-lg w-48 h-48 p-4 flex flex-col items-center justify-around">
                        <h1 class="text-6xl">{{$totalPenjualan}}</h1>
                        <div class="flex justify-center items-end gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                            </svg>
                            
                            <div class="">Total Penjualan</div>
                        </div>
                    </div>
                @endif
               
                @if (Auth::user()->roles === 'public')
                    <div class="p-6 text-gray-800 dark:text-gray-100 text-3xl text-center w-full flex flex-wrap justify-center items-center gap-10">
                        <img src="{{ asset('images/banner/vector3.png') }}" width="400" alt="Image 3">
                        {{ __("Selamat datang " . Auth::user()->name) . "! 👋" }}
                    </div>   
                @endif
            </div>
            <div id="carousel" class="bg-gradient-to-r from-amber-500 to-amber-800 rounded-lg mt-10 ">
                <div class="carousel-container mt-10">
                    <div class="carousel-slide flex items-center flex-wrap lg:flex-nowrap">
                        <img src="{{ asset('images/slider/slider-1.png') }}" alt="Image 3">
                        <span class="text-white m-5">Elpiji 3 kg adalah elpiji bersubsidi yang dikemas dalam tabung 3 kg. 
                            tabung gas ini mendapatkan subsidi dari pemerintah sehingga  harganya pun mudah dijangkau oleh berbagai lapisan masyarakat kurang mampu.
                            Maka dari itu, pada tabung LPG subsidi terdapat tulisan “Hanya untuk Masyarakat Miskin”. kekurangan dari LPG subsidi adalah mudah bocor.</span>
                    </div>
                    <div class="carousel-slide flex items-center flex-wrap lg:flex-nowrap">
                        <img src="{{ asset('images/slider/slider-2.png') }}" alt="Image 2">
                        <span class="text-white m-5">Elpiji 12 kg adalah elpiji non-subsidi yang dikemas dalam tabung 12 kg.
                            gas Elpiji 12 kg ini sudah memenuhi SNI 19-1452-2001, sedangkan katup/valve juga sudah memenuhi standar SNI 1591-2008</span>
                    </div>
                    <div class="carousel-slide flex items-center flex-wrap lg:flex-nowrap">
                        <img src="{{ asset('images/slider/slider-3.png') }}" alt="Image 1">
                        <span class="text-white m-5">
                            Bright Gas tidak mendapat subsidi dari pemerintah sama sekali. Sehingga berdampak pada harga Bright Gas lebih mahal dari LPG subsidi.
                            Bright Gas dilengkapi teknologi valve ganda yang berfungsi mengurangi tekanan gas berlebih. Hal tersebut membuat Bright Gas dua kali lebih aman dari pada tabung LPG subsidi. Sehingga Bright Gas tak mudah bocor dan bisa lebih hemat.
                            Bright Gas dilengkapi dengan security seal cap atau penutup tabung yang lebih aman, sebab menggunakan teknologi teknologi double spindle dan karet pelindung. Tabung Bright Gas ini disebut lebih aman dan tahan benturan. 
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
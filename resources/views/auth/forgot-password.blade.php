<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Lupa Kata Sandi Anda? Tidak ada masalah. Beri tahu kami alamat email Anda dan kami akan mengirimi Anda email tautan pengaturan ulang kata sandi yang memungkinkan Anda memilih kata sandi yang baru.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <div class="flex gap-2 items-center">
                <a href="{{ route('login') }}" class='h-8 w-8 rounded-full p-2 bg-slate-500 text-white flex justif-center items-center  active:bg-slate-400 cursor-pointer'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                      </svg>
                </a>
                <span class="text-sm">Login</span>
            </div>
            <x-primary-button>
                {{ __('Kirim Email') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

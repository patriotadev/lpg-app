<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1 class="mb-8 text-xl text-center">Form Buat Akun</h1>
        <!-- Name -->
        <div>
            <div class="flex justify-between items-center">
                <x-input-label for="name" :value="__('Nama')" />
                <x-text-input id="name" class="block mt-1 w-9/12" type="text" name="name" :value="old('name')" required />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-right" />
        </div>

        <!-- Email Address -->
        <div>
            <div class="flex justify-between items-center mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-9/12" type="email" name="email" :value="old('email')" required />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-right" />
        </div>

        <!-- Address -->
        <div>
            <div class="flex justify-between items-center mt-4">
                <x-input-label for="address" :value="__('Alamat')" />
                <x-text-input id="address" class="block mt-1 w-9/12" type="text" name="address" :value="old('address')" required />
            </div>
            <x-input-error :messages="$errors->get('address')" class="mt-2 text-right" />
        </div>

        <!-- Roles -->
        <div class="flex justify-between items-center mt-4">
            <x-text-input id="roles" class="block mt-1 w-9/12" type="hidden" name="roles" value="public" required />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <div class="flex gap-2 w-9/12">
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required />
        
                    <button id="eye-toggle" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>                                      
                    </button>
                </div>
            </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-right" />
        </div>

        <!-- Confirm Password -->
        <div>
            <div class="flex justify-between items-center mt-4">
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                <div class="flex gap-2 w-9/12">
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                    <button id="eye-toggle-confirmation" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>                                      
                    </button>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

         <!-- Status -->
         <div class="mt-4 mb-8 flex justify-between items-center">
            <x-input-label for="status" :value="__('Status')" />
            <div class="flex gap-8">
                <div class="flex items-center gap-2">
                    <x-text-input id="status" class="block mt-1 w-4" type="radio" name="status" value='Rumah Tangga' required />
                    <x-input-label for="status" :value="__('Rumah Tangga')" />
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
                <div class="flex items-center gap-2">
                    <x-text-input id="status" class="block mt-1 w-4" type="radio" name="status" value='Pedagang' required />
                    <x-input-label for="status" :value="__('Pedagang')" />
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
                <div class="flex items-center gap-2">
                    <x-text-input id="status" class="block mt-1 w-4" type="radio" name="status" value='Warung' required />
                    <x-input-label for="status" :value="__('Warung')" />
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Buat Akun') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

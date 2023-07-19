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
    
                <x-text-input id="password" class="block mt-1 w-9/12"
                                type="password"
                                name="password"
                                required />
    
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-right" />
        </div>

        <!-- Confirm Password -->
        <div>
            <div class="flex justify-between items-center mt-4">
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
    
                <x-text-input id="password_confirmation" class="block mt-1 w-9/12"
                                type="password"
                                name="password_confirmation" required />
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

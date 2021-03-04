<!--********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************-->
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <img src="{{ asset('img/fondos/logo.png') }}" width="200" style="position:absolute;left:43%;top:6%;">
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email:')" />

                <!--<x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus /> -->
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus /> 
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Constraseña:')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordar usuario') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3">
                    {{ __('Iniciar sesión') }}
                </x-button>
            </div>
            @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste la contraseña?') }}
                    </a>
                @endif
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                       <br> {{ __('¿No tienes cuenta? ¡Registrarse!') }}
                    </a>
        </form>
    </x-auth-card>
</x-guest-layout>

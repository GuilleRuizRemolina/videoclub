<!--********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************-->
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <img src="{{ asset('img/fondos/logo.png') }}" width="120" style="position:absolute;left:45%;top:2%;">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nombre -->
            <div>
                <x-label for="nombre" :value="__('Nombre:')" />

                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
            </div>

            <!-- Apellidos -->
            <div>
                <br>
                <x-label for="apellidos" :value="__('Apellidos:')" />

                <x-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email:')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Imagen -->
            <div class="mt-4">
                <x-label for="imagen" :value="__('Imagen:')" />

                <x-input id="imagen" class="block mt-1 w-full" type="file" name="imagen" :value="old('imagen')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña:')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar contraseña:')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya tienes cuenta?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

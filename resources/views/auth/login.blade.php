
@extends('layouts.app')

@section('content')

    <div class="container mx-auto sm:px-4 mt-32">
        <img src="\photos\logo3.png" class="w-1/4" style="margin-left: 31.5rem">
        <div class="text-center p-4 font-black flex text-lg " style="margin-left: 22rem">Connexion à votre compte<br><br>Créer de meilleures relations entre
            les propriétaires et les locataires !
        </div>
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
<div class="uppercase content-center bg-purple-500 text-white">
    <span class="ml-32">{{ isset($url) ? ucwords($url) : " proprietaire  "}}</span>
</div>


                    @isset($url)
                        <form method="POST" class="w-full p-6" action='{{ url("login/$url") }}'
                              aria-label="{{ __('Login') }}">
                            @else
                                <form method="POST" class="w-full p-6" action="{{ route('login') }}"
                                      aria-label="{{ __('Login') }}">
                                    @endisset
                                    @csrf
                                    <div class="flex flex-wrap mb-6">
                                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                            {{ __('Adresse Email') }}:
                                        </label>

                                        <input id="email" type="email"
                                               class="form-input w-full @error('email') border-red-500 @enderror"
                                               name="email" value="{{ old('email') }}" required autocomplete="email"
                                               autofocus>

                                        @error('email')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="flex flex-wrap mb-6">
                                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                                            {{ __('Mot de passe') }}:
                                        </label>

                                        <input id="password" type="password"
                                               class="form-input w-full @error('password') border-red-500 @enderror"
                                               name="password" required>

                                        @error('password')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="flex mb-6">
                                        <label class="inline-flex items-center text-sm text-gray-700" for="remember">
                                            <input type="checkbox" name="remember" id="remember"
                                                   class="form-checkbox" {{ old('remember') ? 'checked' : '' }}>
                                            <span class="ml-2">{{ __('Remember Me') }}</span>
                                        </label>
                                    </div>

                                    <div class="flex flex-wrap items-center">
                                        <button type="submit"
                                                class="bg-purple-500 hover:bg-purple-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            {{ __('Connexion') }}
                                        </button>
                                        @if(Request::routeIs('login') || Request::routeIs('register'))
                                        @if (Route::has('password.request'))
                                            <a class="text-sm text-purple-500 hover:text-purple-700 whitespace-no-wrap no-underline ml-auto"
                                               href="{{ route('password.request') }}">
                                                {{ __('Mot de passe perdu ?') }}
                                            </a>
                                        @endif
                                        @endif
                                        @if(Request::routeIs('login') || Request::routeIs('register'))
                                        @if (Route::has('register'))
                                            <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                                                {{ __("Pas de de compte ?") }}
                                                <a class="text-purple-500 hover:text-purple-700 no-underline"
                                                   href="{{ route('register') }}">
                                                    {{ __('Cliquez ici') }}
                                                </a>
                                            </p>
                                        @endif
                                            @endif
                                    </div>
                                </form>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

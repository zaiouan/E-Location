@extends('layouts.app')

@section('content')
    <div class="container mx-auto sm:px-4 mx-auto sm:px-4 mx-auto mt-32">
        <img src="\photos\logo3.png" class="w-1/4" style="margin-left: 32rem">
        <div class="text-center p-4 font-bold flex text-lg " style="margin-left: 25rem">Ouvrir un compte gratuit
            <br><br>Créer de meilleures relations entre
            les propriétaires et les locataires !
        </div>
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">


                        {{ isset($url) ? ucwords($url) : ""}}

                    @isset($url)
                        <form method="POST" class="w-full p-6" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                        @else
                                <form method="POST" class="w-full p-6" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                    @endisset
                                    @csrf


                        <div class="flex flex-wrap mb-6">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Nom Complet') }}:
                            </label>

                            <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Adresse E-Mail ') }}:
                            </label>

                            <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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

                            <input id="password" type="password" class="form-input w-full @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Confirmation du mot de passe') }}:
                            </label>

                            <input id="password-confirm" type="password" class="form-input w-full" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                                {{ __('Inscription') }}
                            </button>

                            <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                                {{ __('Déjà client ?') }}
                                <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                                    {{ __('Cliquez ici') }}
                                </a>
                            </p>
                        </div>
                    </form>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

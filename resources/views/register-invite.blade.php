@extends('layouts.app')

@section('content')
    <div class="mt-20 container mx-auto sm:px-4 mx-auto sm:px-4 mx-auto mt-32">
        <img src="\photos\logo3.png" class="w-1/4" style="margin-left: 32rem">
        <div class="text-center p-4 font-bold flex text-lg " style="margin-left: 25rem">Ouvrir un compte gratuit
            <br><br>Créer de meilleures relations entre
            les propriétaires et les locataires !
        </div>
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <form method="POST" class="w-full p-6" action="{{ route('updateLoc',$locataire->id) }}" aria-label="{{ __('Register') }}">
                    @csrf
                    @method('PUT')
                        <div class="flex flex-wrap mb-6">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Nom complet') }}:
                            </label>

                            <input id="name" type="text" class="form-input w-full  " name="name" value="{{$locataire->name}}" disabled>

                        </div>
                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-8 text-sm font-bold mb-2">
                                {{ __('Adresse Email') }}:
                            </label>

                            <input id="email" type="email" class="form-input w-full" name="email" value="{{$locataire->email}}" disabled>


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
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

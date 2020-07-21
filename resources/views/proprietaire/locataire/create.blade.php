@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('locataires.store')}}">
        @csrf
        <div class="font-sans mb-10">
            <h1 class="flex items-center uppercase font-sans font-bold break-normal text-gray-700 px-2 text-xl mt-12 lg:mt-0 md:text-2xl">
                Ajouter un Locataire
            </h1>
            <hr class="border-b border-purple-500">
        </div>
        <div class="pr-64 ">
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                        Nom :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white @error('name') border-red-500 @enderror" name="name" id="my-textfield" type="text"
                           value="{{old('name')}}">
                    @error('name')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror

                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                        Prenom :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white @error('prenom') border-red-500 @enderror" id="my-textfield" type="text" name="prenom"
                           value="{{old('prenom')}}">
                    @error('prenom')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                        Date de naissance :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white @error('date') border-red-500 @enderror" id="my-textfield" type="date" name="date"
                           value="{{old('date')}}">
                    @error('date')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                        N identité :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white @error('identite') border-red-500 @enderror" id="my-textfield" type="text" name="identite"
                           value="{{old('identite')}}">
                    @error('identite')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                        Email:
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white @error('email') border-red-500 @enderror" id="my-textfield" type="email" name="email"
                           value="{{old('email')}}">
                    @error('email')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                        Invitation:
                    </label>
                </div>
                <div class="md:w-2/3">
                    <label class="ml-auto text-right" data-toggle="checkbox-toggle" data-rounded="rounded-sm"
                           data-handle-color="bg-purple-500" data-off-color="bg-purple-200"
                           data-on-color="bg-purple-600"><input type="checkbox" name="invit" value="1"/></label>
                    <p class="py-2 text-sm text-gray-600">Si vous voulez inviter et donner accès au site à votre
                        locataire, veuillez saisir son adresse e-mail (un email UNIQUE par locataire). Le locataire aura
                        accès uniquement aux informations liées à sa location, ses quittances de loyer et il pourra vous
                        envoyer des messages via son interface.</p>
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                        telephone :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white @error('tele') border-red-500 @enderror" id="my-textfield" type="number" name="tele"
                           value="{{old('tele')}}">
                    @error('tele')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                        adresse :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white @error('adresse') border-red-500 @enderror" id="my-textfield" type="text"
                           placeholder="" name="adresse" value="{{old('adresse')}}">
                    @error('adresse')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button
                        class="shadow bg-purple-700 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit">
                        Ajouter
                    </button>
                </div>
            </div>
        </div>

    </form>
@endsection

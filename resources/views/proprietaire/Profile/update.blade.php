@extends('layouts.app')
@section('content')

    <form method="post" action="{{route('updateP',Auth::user()->id)}}">
        @csrf
        @method('PUT')
        <div class="font-sans mb-10">
            <h1 class="flex items-center uppercase font-sans font-bold break-normal text-gray-700 px-2 text-xl mt-12 lg:mt-0 md:text-2xl">
                Mon profile
            </h1>
            <hr class="border-b border-purple-500">
        </div>
        <div class="mr-64">
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase" for="my-select">
                        Nom complet:
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white "
                           name="name" id="my-textfield" type="text" value="{{ Auth::user()->name }}">
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase" for="my-textfield">
                        Adresse :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white" id="my-textfield" type="text"  name="adresse" value="{{ Auth::user()->adresse }}">
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase" for="my-textfield">
                        Telephone :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white" step="0.01" id="my-textfield" type="number"  name="tele" value="{{Auth::user()->tele}}">
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase" for="my-textfield">
                        Email:
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white" id="my-textfield" type="email"  name="email" value="{{Auth::user()->email}}">
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="shadow bg-purple-700 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Modifier
                    </button>
                </div>
            </div>
        </div>
    </form>
    <form method="post" action="{{route('updatePass',Auth::user()->id)}}">
        @csrf
        @method('PUT')
        <div class="mr-64">
            <h3> Changer mot de passe </h3>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase" for="my-textfield">
                        Nouveau mot de passe :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white" id="my-textfield" type="password"  name="password" value="">
                    @error('password')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>

            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase" for="my-textfield">
                        Confirmer le mot de passe :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white" id="my-textfield" type="password"  name="password_confirmation" value="">
                </div>
            </div>


            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="shadow bg-purple-700 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Modifier
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection



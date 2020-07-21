@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('biens.store')}}">
        @csrf
        <div class="font-sans mb-10">
            <h1 class="flex items-center uppercase font-sans font-bold break-normal text-gray-700 px-2 text-xl mt-12 lg:mt-0 md:text-2xl">
                Ajouter un bien
            </h1>
            <hr class="border-b border-purple-500">
        </div>
        <div class="pr-64">
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase"
                           for="my-textfield">
                        Identifiant :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white @error('ref') border-red-500 @enderror"
                           name="ref" id="my-textfield" type="text" value="{{ old('ref') }}">
                    <p class="py-2 text-sm text-gray-600">Saisir un identifiant, référence ou numéro unique.</p>
                    @error('ref')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>


            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase"
                           for="my-select">
                        Type de bien :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <select name="tdb" value="{{ old('tdb') }}"
                            class="form-select block w-full focus:bg-white @error('tdb') border-red-500 @enderror"
                            id="my-select">>
                        @foreach($table=['Appartement','maison','studio','Local commerciale'] as $item)
                            <option value="{{$item}}">{{$item}}</option>
                        @endforeach
                    </select>
                    @error('tdb')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>


            </div>

            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase"
                           for="my-textfield">
                        Adresse :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white @error('adresse') border-red-500 @enderror"
                           name="adresse" id="my-textfield" type="text"
                           value="{{ old('adresse') }}">
                    @error('adresse')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase"
                           for="my-textfield">
                        Surface m<sup>2</sup>:
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white @error('surface') border-red-500 @enderror"
                           id="my-textfield" type="number" name="surface"
                           value="{{ old('surface') }}">
                    @error('surface')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase"
                           for="my-textfield">
                        N de champs :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white @error('ndc') border-red-500 @enderror"
                           id="my-textfield" type="number" name="ndc"
                           value="{{ old('ndc') }}">
                    @error('ndc')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase"
                           for="my-textarea">
                        Description :
                    </label>
                </div>
                <div class="md:w-2/3">
                <textarea
                    class="form-textarea block w-full focus:bg-white @error('description') border-red-500 @enderror"
                    name="description" id="my-textarea" value=""
                    placeholder="Ex. Studio meublé tout confort au 3ème étage sur cour d'un immeuble charmant..."
                    rows="8">{{ old('description') }}</textarea>
                    @error('description')
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

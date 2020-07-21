@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('biens.update',$bien)}}">
        @csrf
        @method('PUT')
        <div class="font-sans mb-10">
            <h1 class="uppercase font-bold break-normal text-gray-900 pt-6 pb-2 text-xl">Modifier Un bien</h1>
            <hr class="border-b border-purple-500">
        </div>
        <div class="pr-64">
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase"
                           for="my-select">
                        Type de bien :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <select name="tdb" class="form-select block w-full focus:bg-white" id="my-select">
                        @foreach($table=['Appartement','maison','studio','Local commerciale'] as $item)
                            <option value="{{$item}}" {{$bien->tdb==$item ? 'selected' : ''}}>{{$item}}</option>
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
                           value="{{$bien->adresse}}">
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
                           value="{{$bien->surface}}">
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
                           value="{{$bien->ndc}}">
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
                    rows="8">{{$bien->description}}</textarea>
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
                        Modifier
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

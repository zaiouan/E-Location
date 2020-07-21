@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('locations.update',$location)}}">
        @csrf
        @method('PUT')
        <div class="font-sans mb-10">
            <h1 class="flex items-center uppercase font-sans font-bold break-normal text-gray-700 px-2 text-xl mt-12 lg:mt-0 md:text-2xl">
                Mofifier une location
            </h1>
            <hr class="border-b border-purple-500">
        </div>
        <div class="pr-64">
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase" for="my-select">
                        Bien :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <select name="bien" class="form-select block w-full focus:bg-white @error('blen') border-red-500 @enderror" id="my-select">
                        <option value="">Choisir</option>
                        @foreach ($biens as $bien)
                            <option value="{{$bien->id}}" {{$bien->id==$location->bien->id ? 'selected' : ''}}>{{$bien->ref}}</option>
                        @endforeach
                    </select>
                    @error('bien')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase" for="my-select">
                        Type :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <select name="type1" class="form-select block w-full focus:bg-white @error('type1') border-red-500 @enderror" id="my-select">
                        <option value="">Choisir</option>
                        @foreach($table=['bien sans meubles','bien meublé','bien commerciale'] as $item)
                            <option value="{{$item}}" {{$location->type==$item ? 'selected' : ''}}>{{$item}}</option>
                        @endforeach
                    </select>
                    @error('type1')
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
                        Date debut :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white @error('debut') border-red-500 @enderror" id="my-textfield" type="date" name="debut"
                           value="{{$location->debut}}">
                    @error('debut')
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
                        Date fin :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white @error('fin') border-red-500 @enderror" id="my-textfield" type="date" name="fin" value="{{$location->fin}}">
                    @error('fin')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase" for="my-select">
                        Locataire :
                    </label>
                </div>
                <div class="md:w-2/3">
                    <select name="locataire" class="form-select block w-full focus:bg-white @error('locataire') border-red-500 @enderror" id="my-select">
                        @foreach ($locataires as $locataire)
                            <option value="{{$locataire->id}}" {{$locataire->id==$location->locataire->id ? 'selected' : ''}}>{{$locataire->nom}} {{$locataire->prenom}}</option>
                        @endforeach
                    </select>
                    @error('locataire')
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


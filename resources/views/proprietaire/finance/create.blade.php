@extends('layouts.app')
@section('content')

    <form method="post" action="{{route('finances.store')}}">
        @csrf
        <div class="font-sans mb-10">
            <h1 class="flex items-center uppercase font-sans font-bold break-normal text-gray-700 px-2 text-xl mt-12 lg:mt-0 md:text-2xl">
                Ajouter un finance
            </h1>
            <hr class="border-b border-purple-500">
        </div>
        <div class="mr-64">
        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase" for="my-select">
                    Location :
                </label>
            </div>
            <div class="md:w-2/3">
                <select name="location" class="form-select block w-full focus:bg-white @error('location') border-red-500 @enderror" id="my-select">
                    <option value="">Pas liée à une location</option>
                    @foreach ($location as $loc)
                        <option value="{{$loc->id}}" class="font-sans"><span class="font-bold">Bien</span> {{$loc->bien->ref}} {{$loc->debut}} -- {{$loc->fin}} ({{$loc->locataire->prenom}} {{$loc->locataire->name}})</option>
                    @endforeach
                </select>
                @error('location')
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
                <select name="type" class="form-select block w-full focus:bg-white @error('type') border-red-500 @enderror" id="my-select">
                    <option value="">Choisir</option>
                    @foreach($table=['Loyer','Remboursement','Abonnement electricite-eau','Abonnement internet','Reparetion'] as $item)
                        <option value="{{$item}}" >{{$item}}</option>
                    @endforeach
                </select>
                @error('type')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>
        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase" for="my-textfield">
                    Montant :
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="form-input block w-full focus:bg-white @error('loyer') border-red-500 @enderror" id="my-textfield" type="number"  name="loyer" value="{{old('loyer')}}">
                @error('loyer')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>
        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 uppercase" for="my-textfield">
                    TVA (%) :
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="form-input block w-full focus:bg-white @error('TVA') border-red-500 @enderror" id="my-textfield" type="number"  name="TVA" value="{{old('TVA')}}">
                @error('TVA')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>

        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-purple-700 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    Ajouter
                </button>
            </div>
        </div>
        </div>
    </form>
@endsection

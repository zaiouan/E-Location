@extends('layouts.app')
@section('content')
<form method="post" action="{{route('adminstr')}}">
    @csrf
    <div class="md:flex mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                A :
            </label>
        </div>
        <div class="md:w-2/3">
            <select name="loc" class="form-select block w-full focus:bg-white @error('loc') border-red-500 @enderror" id="my-select">
                <option value="">choisir</option>
                @foreach ($loc as $locataire)
                <option value="{{$locataire->id}}">{{$locataire->name}} {{$locataire->prenom}}</option>
                @endforeach
            </select>
            @error('loc')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
            @enderror
        </div>
    </div>
    <div class="md:flex mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                Sujet :
            </label>
        </div>
        <div class="md:w-2/3">
            <input class="form-input block w-full focus:bg-white @error('sub') border-red-500 @enderror" id="my-textfield" type="text" name="sub" value="{{old('sub')}}">
            @error('sub')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
            @enderror
        </div>
    </div>
    <div class="md:flex mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                Message :
            </label>
        </div>
        <div class="md:w-2/3">
            <textarea class="form-textarea block w-full focus:bg-white @error('msg') border-red-500 @enderror" name="msg" id="my-textarea" value="{{old('msg')}}"
                rows="8"></textarea>
            @error('msg')
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
</form>
@endsection

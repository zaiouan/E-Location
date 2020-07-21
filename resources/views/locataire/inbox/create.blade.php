@extends('layouts.app')
@section('content')
<form method="post" action="{{route('locstr')}}">
    @csrf
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
            To :
        </label>
    </div>
    <div class="md:w-2/3">
        <select name="loc" class="form-select block w-full focus:bg-white" id="my-select">
            <option value="Default">Default</option>
            @foreach ($loc as $locataire)
                <option value="{{$locataire->user->id}}">{{$locataire->user->name}}</option>
            @endforeach
        </select>

        <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
            Subject :
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="form-input block w-full focus:bg-white" id="my-textfield" type="text"  name="sub" value="">
        <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
            Message :
        </label>
    </div>
    <div class="md:w-2/3">
        <textarea class="form-textarea block w-full focus:bg-white" name="msg"  id="my-textarea" value="" rows="8"></textarea>
        <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
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
</form>
@endsection

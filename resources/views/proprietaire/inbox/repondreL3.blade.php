@extends('layouts.app')
@section('content')
    <div class="text-xl container bg-gray-200 shadow">
        <div> <b>{{$msg->user->name}}</b> <span class="font-medium text-gray-500">{{$msg->created_at}}</span>
        </div>
        <div> <b>Sujet :</b> {{$msg->subject}}</div>
    </div>
    <div class=" bg-gray-200 shadow mt-4 mb-10 text-lg">
        <span class="">{{$msg->message}}</span>
    </div>
    <form method="post" action="{{route('repondre')}}">
        @csrf
        <div class="container">
            <h3 class="uppercase bg-purple-200 ">Repondre</h3>
            <input type="hidden" name="id" value="{{$msg->locataire->location->id}}">
            <input type="hidden" name="loc" value="{{$msg->user->id}}">
            <div class="mt-8">
                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Réponse :
                        </label>
                    </div>
                    <div class="md:w-2/3">
            <textarea class="form-textarea block w-full focus:bg-white @error('msg') border-red-500 @enderror"
                      name="msg" id="my-textarea" value="{{old('msg')}}"
                      rows="8"></textarea>
                        @error('msg')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button
                        class="shadow bg-purple-700 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit">
                        Répondre
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

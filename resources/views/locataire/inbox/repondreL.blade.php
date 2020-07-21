@extends('layouts.auth')
@section('content')
    <div class="container">
        <div> {{$msg->user->name}} <span class="font-medium text-gray-500">{{$msg->created_at}}</span>
        </div>
        <div> Sujet: Nouvelle intervention pour LOCATION{{$msg->locataire->location->id}}</div>
    </div>
    <div class=" bg-gray-200 mr-64 ml-64 mb-10">
        <div class="mt-20 ml-40"><img src="\photos\notification-icon.png" alt="home"></div>
        <div>
            Bonjour ,
            <br><br>
            Une nouvelle intervention a été créé pour le bien suivant:
        </div>
        <br>
        <div> Location : {{$msg->locataire->location->id}}</div>
        <div> Object : </div>
        <div> Details : </div>
        <br>
        <div>Vous pouvez consulter l'evolution de cette intervention à l'adresse:<br></div>
        <div>Cordialement, <br><br> via E-Location</div>
    </div>
    <form method="post" action="{{route('repondreL')}}">
        @csrf
        <div class="container">
            <h3 class="uppercase bg-purple-300 ">Repondre</h3>
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

@extends('layouts.auth')
@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/3">
            <h1 class="uppercase font-bold break-normal text-gray-900 pt-6 pb-2 text-xl">Biens </h1>
        </div>
        <div class="md:w-1/3"></div>
        <div class="md:w-1/3"></div>
        <div class="right-0">
            <form action="{{route('biens.create')}}">
                @csrf
                <button
                    class="shadow bg-purple-700 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded-md"
                    type="submit">Ajouter
                </button>
        </div>

    </div>
    <div>
        <hr class="border-b border-purple-700 mb-2">
    </div>
    <!--Card-->
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


        <table id="table_id" class="ui celled table hover" style="width:100%;">
            <thead>
            <tr>
                <th>propreitere</th>
                <th>telephone</th>
                <th>Email</th>
                <th>Adresse</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($user as $user)


                <tr>
                    <td>{{$user->user->name}}</td>
                    <td>{{$user->user->tele}}</td>
                    <td>{{$user->user->email}}</td>
                    <td>
                        {{$user->user->adresse}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>




@endsection

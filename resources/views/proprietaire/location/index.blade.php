@extends('layouts.app')
@section('content')

    <div class="md:flex md:items-center">
        <div class="md:w-1/3">
            <h1 class="uppercase font-bold break-normal text-gray-900 pt-6 pb-2 text-xl">locations </h1>
        </div>
        <div class="md:w-1/3"></div>
        <div class="md:w-1/3"></div>
        <div class="right-0">
            <form action="{{route('locations.create')}}">
                @csrf
                <button
                    class="shadow bg-purple-700 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded-md"
                    type="submit">Ajouter
                </button>
            </form>
        </div>

    </div>
    <div>
        <hr class="border-b border-purple-700 mb-2">
    </div>

    <!--Card-->
    <div class="pt-8 mt-6 lg:mt-0 rounded  ">


        <table id="table_id" class="ui celled table hover" style="width:100%;">
            <thead>
            <tr>
                <th>location</th>
                <th>Locataire</th>
                <th>Loyer</th>
                <th>Durée</th>
                <th>etat</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            @foreach($locations as $location)
                <tr>
                    <td>
                        <div class="text-gray-700 text-xs"><b>Bien :</b> {{$location->bien->ref}}  <b>Location :</b>  {{$location->id}}</div>
                        <div class="text-gray-700 text-xs"><b>{{$location->type}}</b></div>
                        <div class="text-gray-700 text-xs">
                            <i class="fas fa-map-marker-alt leading-lg"></i><span
                                class="ml-2 font-light"> {{$location->bien->adresse}}</span>
                        </div>

                    </td>
                    <td>{{$location->locataire->prenom}} {{$location->locataire->name}}</td>
                    <td>
                        @foreach ($location->finances as $finance)
                            @if($finance->type=='loyer')
                            {{$finance->montant}} DH
                            @endif
                        @endforeach
                    </td>
                    <td>{{$location->debut}} - {{$location->fin}}</td>
                    <td>
                        @if(Carbon\Carbon::now()>$location->fin)
                            <label style="font-size:.75rem" type="submit"
                                    class="bg-gray-400 text-gray-600 text-white p-1 uppercase">Inactive
                            </label>
                            @else
                            <lable style="font-size:.75rem" type="submit"
                                    class="bg-purple-600 text-white p-1 uppercase">Active
                            </lable>
                        @endif
                    </td>
                    <td>
                        <div>
                            <a class="bg-green-500 text-white rounded-lg p-1 font-bold text-sm hover:bg-green-600 hover:text-white"
                               href="{{route('locations.edit',$location)}}"><i class="edit icon text-sm"></i><span class="ml-1">Modifier</span></a>
                            <button class=" bg-red-500 text-white rounded-lg p-1 font-bold text-sm hover:bg-red-600 hover:text-white -mr-16"
                                    onclick="toggleModal('modal-id')" style="transition: all .15s ease" ><i
                                    class="delete icon text-sm"></i><span class="ml-1">Supprimer</span></button>
                            <div
                                class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                                id="modal-id">
                                <div class="relative w-auto my-6 mx-auto max-w-sm">
                                    <!--content-->
                                    <div
                                        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                        <!--header-->
                                        <div
                                            class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                                            <h3 class="text-xl font-semibold">
                                                Avertissement
                                            </h3>
                                            <button
                                                class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                                onclick="toggleModal('modal-id')">
                                            <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                              ×
                                            </span>
                                            </button>
                                        </div>
                                        <!--body-->
                                        <div class="relative p-6 flex-auto">
                                            <p class="my-4 text-gray-600 text-lg leading-relaxed">
                                                Veuillez confirmer la suppression de cette
                                                location.
                                            </p>
                                        </div>
                                        <!--footer-->
                                        <div
                                            class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                                            <button
                                                class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1"
                                                type="button" style="transition: all .15s ease"
                                                onclick="toggleModal('modal-id')">
                                                Annuler
                                            </button>
                                            <button
                                                class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                                type="button" style="transition: all .15s ease"
                                                onclick="event.preventDefault();document.getElementById('delete').submit();">
                                                Confirmer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
                            <form id="delete" action="{{ route('locations.destroy', $location) }}" method="POST" class="hidden">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>




@endsection

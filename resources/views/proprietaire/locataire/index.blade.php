@extends('layouts.app')
@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/3">
            <h1 class="uppercase font-bold break-normal text-gray-900 pt-6 pb-2 text-xl">locataires </h1>
        </div>
        <div class="md:w-1/3"></div>
        <div class="md:w-1/3"></div>
        <div class="right-0">
            <form action="{{route('locataires.create')}}">
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
                <th>Locataire</th>
                <th>Bien</th>
                <th>Telephone</th>
                <th>email</th>
                <th>Etat</th>
                <th>Action</th>


            </tr>
            </thead>
            <tbody>
            @foreach($locataires as $locataire)

                <tr>
                    <td><div class="flex"><img class="w-10 h-10 mt-2" src="{{ Avatar::create($locataire->name . ' ' . $locataire->prenom)->toBase64() }}" /><span class="mt-4 ml-2 text-sm font-bold">{{$locataire->name}} {{$locataire->prenom}}</span></div></td>
                    @if ($locataire->location)
                        <td>{{$locataire->location->bien->ref}}</td>
                    @else
                        <td><a href="{{route('locations.create')}}" class=""><span
                                    class=" bg-purple-800 text-white text-sm uppercase rounded-lg p-1">creer une location</span></a>
                        </td>
                    @endif

                    <td><a href="tel:{{$locataire->tele}}" lass="text-sm"> {{$locataire->tele}}</a></td>
                    <td><a href="mailto:{{$locataire->email}}" class="text-sm">{{$locataire->email}}</a></td>
                    <td>
                        @if(!$locataire->invitation)
                            <form action="{{route('invite',$locataire->id)}}" method="post">
                                @csrf
                                <button type="submit" class="bg-purple-600 text-white text-xs p-1 uppercase">inviter
                                </button>
                            </form>
                        @elseif($locataire->invitation->status!=='connecter')
                            <label style="font-size:.6rem" class=" bg-orange-500 text-white  p-1 uppercase shadow">En
                                attente</label>
                            <form action="{{route('reinvite',$locataire->invitation->id)}}" method="post">
                                @csrf
                                <button style="font-size:.6rem" type="submit"
                                        class="bg-purple-600 text-white p-1 uppercase">reinviter
                                </button>
                            </form>
                        @elseif($locataire->invitation->status=='connecter')
                            <label style="font-size:.6rem" class=" bg-gray-500 text-white p-1 uppercase shadow">connecter</label>
                        @endif
                    </td>
                    <td>
                            <a class="bg-green-500 text-white rounded-lg p-1 font-bold text-sm hover:bg-green-600 hover:text-white"
                               href="{{route('locataires.edit',$locataire)}}"><i class="edit icon text-sm"></i><span
                                    class="ml-1">Modifier</span></a>
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
                            <form id="delete" action="{{ route('locataires.destroy', $locataire) }}" method="POST"
                                  class="hidden">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>

                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>




@endsection

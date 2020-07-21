@extends('layouts.app')
@section('content')
    <div class="font-sans">
        <h1 class="uppercase font-black break-normal text-gray-900 pt-2 pb-6 text-2xl">Bureau </h1>
        <hr class="border-b border-solid border-purple-700 mb-6">
    </div>
    <div class="flex mt-10 border-2 p-10">

        <div class=" w-1/4">

            <div
                class=" ml-16 border-8 border-solid border-purple-500 hover:border-purple-600 rounded-full h-24 w-24 flex items-center justify-center">
                <a href="{{route('biens.create')}}">
                    <svg class="stroke-current h-16 w-16 text-gray-500 hover:text-gray-600" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                </a>
            </div>
            <p class="mr-6 py-2 text-xl text-gray-900 text-center">Creer un bien</p>
        </div>

        <div class="w-1/4">
            <div
                class=" ml-16 border-8 border-solid border-purple-500 hover:border-purple-600 rounded-full h-24 w-24 flex items-center justify-center">
                <a href="{{route('locataires.create')}}">
                    <svg class="stroke-current h-16 w-16 text-gray-500 hover:text-gray-600" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>
            <p class="mr-6 py-2 text-xl text-gray-900 text-center">Creer un locataire</p>
        </div>
        <div class="w-1/4">
            <div
                class=" ml-16 border-8 border-solid border-purple-500 hover:border-purple-600 rounded-full h-24 w-24 flex items-center justify-center">
                <a href="{{route('locations.create')}}">
                    <svg class="stroke-current h-16 w-16 text-gray-500 hover:text-gray-600" fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                </a>
            </div>

            <p class="mr-6 py-2 text-xl text-gray-900 text-center">Creer un location</p>
        </div>
        <div class="w-1/4">
            <div
                class=" ml-16 border-8 border-solid border-purple-500 hover:border-purple-600 rounded-full h-24 w-24 flex items-center justify-center">
                <a href="{{route('finances.index')}}" class="group">
                    <svg class="stroke-current h-16 w-16 text-gray-500 hover:text-gray-600" viewBox="0 0 24 24"
                         stroke-width="2"
                         stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 0 0 0 4h2a2 2 0 0 1 0 4h-2a2 2 0 0 1 -1.8 -1"/>
                        <path d="M12 6v2m0 8v2"/>
                    </svg>
                </a>
            </div>

            <p class="mr-6 py-2 text-xl text-gray-900 text-center">Mes quittances</p>
        </div>
    </div>

    <div class="mt-10 ">
        <table class="table-fixed w-full">
            <tr>
                <td class="">
                    <div class=" mb-4 p-4">
                        <div class="relative shadow bg-white rounded border">
                            <div class="bg-gray-400 uppercase text-xl font-black p-2">
                                <span>biens</span>
                                <a href="{{route('biens.index')}}"><i class="fa fa-cog text-xl absolute right-0 mr-2 mt-1 text-black"></i></a>
                            </div>
                            <div class="p-4"><span
                                    class="text-4xl font-black text-purple-600 absolute right-0 mr-8 mt-1 ">{{Auth::user()->biens->count()}}</span>
                                <div
                                    class="rounded-full bg-gray-200 h-16 w-16 flex items-center text-4xl justify-center">
                                    <i class="fas fa-home text-gray-500"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="relative mb-4 p-4">
                        <div class="relative shadow bg-white rounded border">
                            <div class="bg-gray-400 uppercase text-xl font-black p-2">
                                <span>Locataires</span>
                                <a href="{{route('locataires.index')}}"><i class="fa fa-cog text-xl absolute right-0 mr-2 mt-1 text-black"></i></a>
                            </div>
                            <div class="p-4"><span
                                    class="text-4xl font-black text-purple-600 absolute right-0 mr-8 mt-1 ">{{Auth::user()->locataires->count()}}</span>
                                <div
                                    class="rounded-full bg-gray-200 h-16 w-16 flex items-center text-4xl justify-center">
                                    <i class="fas fa-users text-gray-500"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                <td>
                    <div class=" mb-4 p-4">
                        <div class="relative shadow bg-white rounded border">
                            <div class="bg-gray-400 uppercase text-xl font-black p-2">
                                <span>Locations</span>
                                <a href="{{route('locations.index')}}"><i class="fa fa-cog text-xl absolute font right-0 mr-2 mt-1 text-black"></i></a>
                            </div>
                            <div class="p-4"><span
                                    class="text-4xl font-black text-purple-600 absolute right-0 mr-8 mt-1 ">{{Auth::user()->locations->count()}}</span>
                                <div
                                    class="rounded-full bg-gray-200 h-16 w-16 flex items-center text-4xl justify-center">
                                    <i class="fas fa-key text-gray-500"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>


@endsection

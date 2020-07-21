@extends('layouts.auth')
@section('content')
    <div class="font-sans">
        <h1 class="uppercase font-black break-normal text-gray-900 pt-2 pb-6 text-2xl">Bureau </h1>
        <hr class="border-b border-solid border-purple-700 mb-6">
    </div>
    <div class="flex mt-10 border-2 p-10">

        <div class="w-1/3">
            <div
                class=" ml-16 border-8 border-solid border-purple-500 hover:border-purple-600 rounded-full h-24 w-24 flex items-center justify-center">
                <svg class="stroke-current h-16 w-16 text-gray-500 hover:text-gray-600" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 0 0 0 4h2a2 2 0 0 1 0 4h-2a2 2 0 0 1 -1.8 -1"/>
                    <path d="M12 6v2m0 8v2"/>
                </svg>
            </div>
            <p class="py-2 text-xl mr-16 text-gray-600 text-center">Mes quittances</p>
        </div>
        <div class="w-1/3">
            <div
                class=" ml-16 border-8 border-solid border-purple-500 hover:border-purple-600 rounded-full h-24 w-24 flex items-center justify-center">
                <svg class="stroke-current h-16 w-16 text-gray-500 hover:text-gray-600" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                </svg>

            </div>
            <p class="py-2 text-xl mr-16 text-gray-600 text-center">Envoyer un message</p>
        </div>
        <div class="w-1/3">
            <div
                class=" ml-16 border-8 border-solid border-purple-500 hover:border-purple-600 rounded-full h-24 w-24 flex items-center justify-center">
                <svg class="stroke-current h-16 w-16 text-gray-500 hover:text-gray-600" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-tool">
                    <path
                        d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                </svg>

            </div>
            <p class="py-2 mr-16 text-xl text-gray-600 text-center">Créer un intervention</p>
        </div>

    </div>

    <div class="mt-10 ">
        <table class="table-fixed w-full">
            <tr>
                <td class="">
                    <div class=" mb-4 p-4">
                        <div class="relative shadow bg-white rounded border">
                            <div class="bg-gray-400 uppercase text-xl font-black p-2">
                                <span>Loyers en retard</span>
                                <a href="{{route('biens.index')}}"><i
                                        class="fa fa-cog text-xl absolute right-0 mr-2 mt-1 text-black"></i></a>
                            </div>
                            <div class="p-4 flex">
                                <div
                                    class="rounded-full bg-gray-200 h-16 w-16 flex items-center text-4xl justify-center ml-40">
                                    <i class="fas fa-coins text-gray-500"></i>
                                </div>
                                <table
                                    class="table table-auto ml-4">
                                    <tr>
                                        <td class="text-center text-xl font-bold border-l-2 pl-2 pr-2 text-gray-600">
                                            Loyers en retard
                                        </td>
                                    </tr>
                                    <tr>@isset(Auth::guard('locataire')->user()->location->finance)
                                            @foreach(Auth::guard('locataire')->user()->location->finances as $finance)
                                                @if($finance->status=='en retard'|| $finance->status=='non payé' )
                                                    <td class="text-center text-xl font-semibold border-l-2 pl-2 pr-2 text-red-600">{{$finance->count()}}</td>
                                                @else
                                                    <td class="text-center text-xl font-semibold border-l-2 pl-2 pr-2 text-gray-600">
                                                        0
                                                    </td>
                                                @endif
                                            @endforeach
                                        @else
                                            <td class="text-center text-xl font-semibold border-l-2 pl-2 pr-2 text-gray-600">
                                                0
                                            </td>
                                        @endisset
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="relative mb-4 p-4">
                        <div class="relative shadow bg-white rounded border">
                            <div class="bg-gray-400 uppercase text-xl font-black p-2">
                                <span>Interventions</span>
                                <a href="{{route('locataires.index')}}"><i
                                        class="fa fa-cog text-xl absolute right-0 mr-2 mt-1 text-black"></i></a>
                            </div>
                            <div class="p-4 flex">
<?php $inter=\App\Intervention::where('lct_id',Auth::guard('locataire')->user()->id); compact('inter') ?>
                                <div
                                    class=" rounded-full bg-gray-200 h-16 w-16 flex items-center text-4xl justify-center ml-20">
                                    <i class="fas fa-tools text-gray-500"></i>
                                </div>
                                <table
                                    class="table table-auto ml-4">
                                    <tr>
                                        <td class="text-center text-xl font-bold border-r-2 border-l-2 pl-2 pr-2 text-gray-600">
                                            Ouverte
                                        </td>
                                        <td class="text-center text-xl font-bold pl-2 text-gray-600">En retard</td>
                                    </tr>
                                    <tr>@isset($inter)
                                            @foreach($inter as $int)
                                        <td class="text-center text-xl font-semibold border-r-2 border-l-2 pl-2 pr-2 text-red-600">
                                            {{$int->count()}}
                                        </td>
                                            @if($int->statu=='retard')
                                        <td class="text-center text-xl font-semibold pl-2 text-gray-600">{{$int->count()}}</td>
                                                @endif
                                            @endforeach

                                    @else
                                        <td class="text-center text-xl font-semibold border-r-2 border-l-2 pl-2 pr-2 text-red-600">
                                           1
                                        </td>
                                        <td class="text-center text-xl font-semibold pl-2 text-gray-600">1</td>
                                    @endisset
                                </table>

                            </div>
                        </div>
                    </div>
            </tr>
        </table>
    </div>
@endsection


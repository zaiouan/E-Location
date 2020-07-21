@extends('layouts.auth')
@section('content')

    <div class="md:flex md:items-center">
        <div class="md:w-1/3">
            <h1 class="uppercase font-bold break-normal text-gray-900 pt-6 pb-2 text-xl">finances </h1>
        </div>
        <div class="md:w-1/3"></div>
        <div class="md:w-1/3"></div>
    </div>
    <div>
        <hr class="border-b border-purple-700 mb-2">
    </div>

    <!--Card-->
    <div class="pt-8 mt-6 lg:mt-0 rounded  ">


        <table id="table_id" class="ui celled table hover" style="width:100%;">
            <thead>
            <tr>
                <th>Date</th>
                <th>Bien</th>
                <th>De/A</th>
                <th>Montant</th>
                <th>Descriprion</th>
                <th>Etat</th>

            </tr>
            </thead>
            <tbody>
            @foreach($finances as $finance)
                <tr>
                    <td>@if($finance->type == 'loyer') {{$finance->location->debut}} @else {{$finance->date}} @endif</td>
                    <td>{{$finance->location->bien->id}}</td>
                    <td>{{$finance->location->locataire->prenom}} {{$finance->location->locataire->name}}</td>
                    <td>{{$finance->montant}}</td>
                    <td>loyer {{$finance->location->debut}}-{{$finance->location->fin}}<br>Reçu {{$finance->loyer}} de
                        Locataire le {{$finance->location->debut}}</td>
                    <td>
                        {{$finance->status}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>




@endsection

@extends('layouts.auth')
@section('content')
<div class="md:flex md:items-center">
    <div class="md:w-1/3">
         <h1 class="uppercase font-bold break-normal text-gray-900 pt-6 pb-2 text-xl">Biens </h1>
    </div>
</div>
<div><hr class="border-b border-purple-700 mb-2"></div>
    <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


            <table id="table_id" class="ui celled table hover" style="width:100%;">
                <thead>
                <tr>
                    <th>bien</th>
                    <th>proprietere</th>
                    <th>loyer</th>
                    <th>durée</th>
                </tr>
                </thead>
                <tbody>
                @foreach($locations as $location)
                    <tr>
                        <td><div>bien: {{$location->bien->ref}} location : {{$location->id}}</div>
                            <div>{{$location->type}}</div>
                            <div class="flex"><svg class="mb-2 font-medium leading-tight text-xl w-4 text-gray-500 grid-cols-1"  viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/><div class="text-xs" >{{$location->bien->adresse}}</div></svg>
                            </div>
                        </td>
                        <td>{{$location->locataire->user->name}}</td>
                        <td>
                        @foreach ($location->finances as $finance)
                            @if($finance->type=='loyer')
                                {{$finance->montant}} DH
                            @endif
                        @endforeach</td>
                        <?php $date1=date_create($location->debut);  $date2=date_create($location->fin);  $interval = date_diff($date1, $date2)?>
                        <td>{{$interval->format('%a jours')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>




@endsection


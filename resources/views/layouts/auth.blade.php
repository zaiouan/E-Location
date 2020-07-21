<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <script src="{{ asset('js/app.js')}}"></script>
    <link rel="stylesheet" href=https://use.fontawesome.com/releases/v5.6.3/css/all.css
          integrity=sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/ crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.semanticui.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>

    <script src="{{ asset('js/jquery-tailwind-toggle.js')}}"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato');

        html {
            font-family: 'Lato', sans-serif;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-100  tracking-wider tracking-normal">
<nav class="fixed  items-center w-full z-10 top-0 px-2 py-3 navbar-expand-lg bg-purple-500">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between"><img src="\photos\logo4.png" style="width: 7%" >
        <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
            <a class="xl:text-xl font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-white"
               href="/home">
                E-location
            </a>
            <button
                class="text-white cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button" onclick="toggleNavbar('example-collapse-navbar')">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="lg:flex flex-grow items-center hidden" id="example-collapse-navbar">
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                           href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt text-lg leading-lg text-white opacity-75"></i><span
                                class="ml-2">{{ __('Connexion') }}</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">

                        <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                           href="">
                            <i class="fas fa-envelope text-lg leading-lg text-white opacity-75"></i><span class="ml-2">Notification</span>@if(Auth::user()->unreadNotifications->whereIn('type','App\Notifications\Intervention')->count()!==0)
                                <span
                                    class="right-0 top-0 -mt-6 -mr-2 rounded-full bg-red-500 pt-1 pl-2 text-xs text-white shadow w-6 h-6">{{Auth::user()->unreadNotifications->whereIn('type','App\Notifications\Intervention')->count()}}</span>@endif
                        </a>
                        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 ">
                            @forelse (Auth::user()->unreadNotifications->whereIn('type','App\Notifications\Intervention') as $notif)
                                <li class="flex-1 overflow-y-auto shadow rounded-lg">
                                    <a href="#" class="block px-6 pt-3 pb-4 bg-white">
                                        <?php $locataire = \App\Locataire::find($notif->data['user']); ?>
                                        <div class="flex justify-between ">
                        <span
                            class="text-sm font-semibold text-gray-900"> {{$locataire->name}} {{$locataire->prenom}} </span>
                                            <span
                                                class="text-sm text-gray-500">Publié {{  \Carbon\Carbon::parse($notif->created_at)->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-sm text-gray-900">{{$notif->data['subject']}}</p>

                                    </a>
                                </li>
                            @empty
                                <div
                                    class="flex overflow-y-auto shadow rounded-lg block px-6 pt-3 pb-4 bg-white overflow-y-auto shadow rounded-lg">
                                    Pas de Notifications
                                </div>
                            @endforelse
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75">
                            <i class="fas fa-bell text-lg leading-lg text-white opacity-75"></i><span class="ml-2">Message</span>@if(Auth::user()->unreadNotifications->whereIn('type','App\Notifications\Message')->count()!==0)
                                <span
                                    class="right-0 top-0 -mt-6 -mr-2 rounded-full bg-red-500 pt-1 pl-2 text-xs text-white shadow w-6 h-6">{{Auth::user()->unreadNotifications->whereIn('type','App\Notifications\Message')->count()}}</span>@endif
                        </a>
                        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 ">
                            @forelse (Auth::user()->unreadNotifications->whereIn('type','App\Notifications\Message') as $notif)
                                <li class="flex-1 overflow-y-auto shadow border-b rounded-l rounded-r">
                                    <a href="#" class="block px-8 pt-3 pb-4 bg-white">
                                        <?php $locataire = \App\Locataire::find($notif->data['user']); ?>
                                        <div class="flex justify-between ">
                        <span
                            class="text-sm font-semibold text-gray-900"> {{$locataire->name}} {{$locataire->prenom}} </span>
                                            <span
                                                class="text-sm text-gray-500">Publié {{  \Carbon\Carbon::parse($notif->created_at)->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-sm text-gray-900">{{$notif->data['subject']}}</p>
                                        <p class="text-sm text-gray-600">{{$notif->data['message']}}</p>
                                    </a>
                                </li>
                            @empty
                                <div
                                    class="flex overflow-y-auto shadow rounded-lg block px-6 pt-3 pb-4 bg-white overflow-y-auto shadow rounded-lg">
                                    Pas de Messages
                                </div>
                            @endforelse
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                           href="{{route('profileL')}}">
                            <i class="fas fa-user-circle text-lg leading-lg text-white opacity-75"></i><span
                                class="ml-2">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt text-lg leading-lg text-white opacity-75"></i>
                            <span class="ml-2">Déconnexion</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<script>
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("flex");
    }
</script>

@if (Auth::guard('locataire')->check())
    <!--Container-->
    <div class=" container mx-auto sm:px-4 w-full flex flex-wrap mx-auto px-2 pt-8 pb-8 lg:pt-16 mt-16">
        <div class="w-full lg:w-1/5 lg:px-6 text-xl text-gray-800 leading-normal">
            <p class="text-base font-bold py-2 lg:pb-6 text-gray-700">Menu</p>
            <div class="block lg:hidden sticky inset-0">
                <button id="menu-toggle"
                        class="flex w-full justify-end px-3 py-3 bg-white lg:bg-transparent border rounded border-gray-600 hover:border-purple-500 appearance-none focus:outline-none">
                    <svg class="fill-current mb-2 font-medium leading-tight text-2xl float-right" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </button>
            </div>
            <div
                class="w-full sticky inset-0 hidden h-64 lg:h-auto overflow-x-hidden overflow-y-auto lg:overflow-y-hidden lg:block mt-0 border border-gray-400 lg:border-transparent bg-white shadow lg:shadow-none lg:bg-transparent z-20"
                style="top:5em;" id="menu-content">
                <ul class="list-reset">
                    <li class="py-2 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                        <a href="/locataire"
                           class="block pl-4 align-middle text-gray-700 no-underline hover:text-purple-500 border-l-4 {{Route::currentRouteName() == 'locataire' ? 'lg:border-purple-500 lg:hover:border-purple-500' : 'border-l-4 border-transparent lg:hover:border-gray-400'}}">
                            <i class="fas fa-desktop text-sm leading-lg"></i><span
                                class="pb-1 md:pb-0 text-sm ml-2 {{Request::routeIs('locataire') ? 'font-black' : ''}}">Home</span>
                        </a>
                    </li>
                    <li class="py-2 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                        <a href="{{route('prop')}}"
                           class="block pl-4 align-middle text-gray-700 no-underline hover:text-purple-500 border-l-4 {{Request::routeIs('prop') ? 'lg:border-purple-500 lg:hover:border-purple-500' : 'border-l-4 border-transparent lg:hover:border-gray-400'}}">
                            <i class="fas fa-user-tie text-sm leading-lg"></i><span
                                class="pb-1 md:pb-0 text-sm {{Request::routeIs('prop') ? 'font-black' : ''}} ml-2">Propriteres</span>
                        </a>
                    </li>
                    <li class="py-2 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                        <a href="{{route('loc')}}"
                           class="block pl-4 align-middle text-gray-700 no-underline hover:text-purple-500 border-l-4 {{Request::routeIs('loc') ? 'lg:border-purple-500 lg:hover:border-purple-500' : 'border-l-4 border-transparent lg:hover:border-gray-400'}}">
                            <i class="fas fa-key text-sm leading-lg"></i><span
                                class="pb-1 md:pb-0 text-sm ml-2 {{Request::routeIs('loc') ? 'font-black' : ''}}">Locations</span>
                        </a>
                    </li>
                    <li class="py-2 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                        <a href="{{route('finances1.index')}}"
                           class="block pl-4 align-middle text-gray-700 no-underline hover:text-purple-500 border-l-4 {{Request::routeIs('finances1.index') ? 'lg:border-purple-500 lg:hover:border-purple-500' : 'border-l-4 border-transparent lg:hover:border-gray-400'}} ">
                            <i class="fas fa-coins text-sm leading-lg"></i><span
                                class="pb-1 md:pb-0 text-sm ml-2 {{Request::routeIs('finances1.index') ? 'font-black' : ''}}">finances</span>
                        </a>
                    </li>
                    <li class="py-2 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                        <a href="{{route('interventions.index')}}"
                           class="block pl-4 align-middle text-gray-700 no-underline hover:text-purple-500 border-l-4 {{Request::routeIs('interventions.index') ? 'lg:border-purple-500 lg:hover:border-purple-500' : 'border-l-4 border-transparent lg:hover:border-gray-400'}}">
                            <i class="fas fa-tools text-sm leading-lg"></i><span
                                class="pb-1 md:pb-0 text-sm ml-2 {{Request::routeIs('interventions.index') ? 'font-black' : ''}}">Interventions</span>
                        </a>
                    </li>
                    <li class="py-2 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                        <a href="{{route('messages1.index')}}"
                           class="block pl-4 align-middle text-gray-700 no-underline hover:text-purple-500 border-l-4 {{Request::routeIs('messages1.index') ? 'lg:border-purple-500 lg:hover:border-purple-500' : 'border-l-4 border-transparent lg:hover:border-gray-400'}}">
                            <i class="fas fa-envelope text-sm leading-l"></i><span
                                class="pb-1 md:pb-0 text-sm ml-2 {{Request::routeIs('messages1.index') ? 'font-black' : ''}}">Messages</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div
            class="w-full lg:w-4/5 p-8 mt-6 lg:mt-0 text-gray-900 leading-normal bg-white border border-gray-400 border-rounded">
            @endif
            @yield('content')
        </div>
    </div>
    <script>
        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        var helpMenuDiv = document.getElementById("menu-content");
        var helpMenu = document.getElementById("menu-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);


//Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }

//Help Menu
            if (!checkParent(target, helpMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, helpMenu)) {
                    // click on the link
                    if (helpMenuDiv.classList.contains("hidden")) {
                        helpMenuDiv.classList.remove("hidden");
                    } else {
                        helpMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    helpMenuDiv.classList.add("hidden");
                }
            }

        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }


    </script>
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable({
                "language": {
                    "sEmptyTable": "Aucune donnée disponible dans le tableau",
                    "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                    "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
                    "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ",",
                    "sLengthMenu": "Afficher _MENU_ éléments",
                    "sLoadingRecords": "Chargement...",
                    "sProcessing": "Traitement...",
                    "sSearch": "Rechercher :",
                    "sZeroRecords": "Aucun élément correspondant trouvé",
                    "oPaginate": {
                        "sFirst": "Premier",
                        "sLast": "Dernier",
                        "sNext": "Suivant",
                        "sPrevious": "Précédent"
                    },
                    "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                    },
                    "select": {
                        "rows": {
                            "_": "%d lignes sélectionnées",
                            "0": "Aucune ligne sélectionnée",
                            "1": "1 ligne sélectionnée"
                        }
                    }
                }

            })
        });
    </script>





    <!--Datatables -->

    @if (Auth::guard('locataire')->check())
        <footer class="bg-white border-t border-gray-400 shadow">
            <div class="container mx-auto sm:px-4 mx-auto flex py-8">
                <div class="w-full mx-auto flex flex-wrap">
                    <div class="flex w-full lg:w-1/2 ">
                        <div class="px-8">
                            <h3 class="font-bold text-gray-900">© E-Location Tous droits réservés</h3>
                            <p class="py-4 text-gray-600 text-sm">
                                La quittance électronique, c'est pratique, gratuit et vous faites un geste pour l'environnement. Pour éviter d'augmenter la pression sur les forêts, diminuez votre consommation de papier
                            </p>
                        </div>
                    </div>
                    <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                        <div class="px-4">
                            <h3 class="font-bold text-gray-900">E-Location</h3>
                            <ul class="list-reset items-center text-sm pt-3">
                                <li>
                                    <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:underline py-1"
                                       href="#">Nous contacter</a><hr>
                                    <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:underline py-1"
                                       href="#">Notre blog</a><hr>
                                    <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:underline py-1"
                                       href="#">Social</a><hr>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @endif

</body>
</html>


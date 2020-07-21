<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.semanticui.min.css">
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.semanticui.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Exo 2' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
	<link rel="stylesheet" href="https://use.typekit.net/jfc0gjq.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href=https://use.fontawesome.com/releases/v5.6.3/css/all.css
          integrity=sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/ crossorigin="anonymous">

    <title>Title</title>
	<style>
	body{

	</style>

</head>
<body>

<hr class="border-4 border-purple-700">
<nav class="items-center w-full z-10 top-0 px-2 py-3 navbar-expand-lg bg-white border-b-2 mb-10">
    <div class=" container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
           <a href="/home">
            <img src="\photos\logo3.png" style=' width:26%'>
           </a>
            <button
                class="text-purple-500 cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button" onclick="toggleNavbar('example-collapse-navbar')">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <li class="lg:flex flex-grow items-center hidden" id="example-collapse-navbar">
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">

                <li class="nav-item mr-2">
                    <a class="px-3 py-2 flex items-center text-md uppercase  bg-white font-bold leading-snug text-purple-600
hover:text-purple-500 hover:opacity-75 rounded-full border-2 border-purple-500"
                       href="/login/locataire">
                        <i class="fas fa-user text-lg leading-lg text-purple-600 "></i><span
                            class="ml-2">{{ __('Espace Locataire') }}</span>
                    </a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="px-3 py-2 flex items-center text-md bg-purple-700 text-white uppercase font-bold leading-snug hover:text-white hover:opacity-75 rounded-full"
                           href="{{ route('login') }}">
                            <i class="fas fa-user-tie text-lg leading-lg text-white "></i><span
                                class="ml-2">{{ __('Espace Proprietaire') }}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>

    </div>

</nav>

<div class="w-full py-24 px-6 bg-cover bg-no-repeat bg-center relative z-10"
     style="background-image: url('https://assets-cdn.iproperty.com.my/assets/rent-large-f97a346f.jpg');">

    <div class="container max-w-4xl mx-auto text-center">
        <h1 class="text-4xl font-black leading-tight md:text-4xl text-center text-purple-800 mb-3">Gérez vos biens
            immobiliers avec le
            meilleur logiciel gratuit de gestion locative immobilière</h1>
        <p class="text-2xl md:text-2xl text-center text-purple-100 text ">E-Location est le meilleur logiciel de gestion
            locative
            immobilière en ligne. Suivi des loyers et charges, comptabilité, aide à la déclaration des revenus
            fonciers... Les différentes étapes de la vie du contrat de location sont couvertes par notre site.</p>

        <a href="/register"
           class="mt-6 inline-block bg-purple-700 rounded-full text-white no-underline px-4 py-3 shadow-lg font-bold hover:text-white hover:bg-purple-600">OUVRIR
            UN COMPTE GRATUIT</a>
        <p class="text-md md:text-lg text-center mt-4 font-bold ">Deja client ? <a
                class="text-purple-500 text-md md:text-lg text-center" href="/login">Cliquez ici</a></p>
    </div>

</div>
<!-- /hero -->

<!-- home content -->
<div class="w-full px-6 py-12 bg-white">
    <div class="container max-w-4xl mx-auto text-center pb-10">

        <h3 class="text-3xl md:text-3xl leading-tight text-center max-w-md mx-auto text-gray-900 mb-4 font-black">
            Comment ça marche ?
        </h3>
        <hr class="w-16 border-2 border-purple-500" style="margin-left: 25rem">
        <p class="text-2xl md:text-2xl leading-tight text-center text-gray-700 mt-4 mb-4">
            Configurez votre compte en 3 minutes en suivant ces 3 étapes...
        </p>

    </div>

    <div class="container  mx-auto text-center flex flex-wrap items-start md:flex-no-wrap ">

        <div class="my-4 w-full md:w-1/3 flex flex-col items-center justify-center px-4 border-r-2">
            <img src="https://www.rentila.com/img/home_icon_house_256px.png"
                 class="h-40 w-40 object-cover mb-6"/>

            <h2 class="text-2xl leading-tight font-black mb-4">Créer un bien</h2>
            <p class="font-light text-gray-500">APPARTEMENTS, MAISONS....</p>
            <p class="mt-3 mx-auto text-lg leading-normal">Créez la fiche détaillée de votre Local (appartement, maison,
                parking...). Adresse, surface, équipements etc.</p>
        </div>

        <div class="my-4 w-full md:w-1/3 flex flex-col items-center justify-center px-4 border-r-2">
            <img src="https://www.rentila.com/img/home_icon_tenant_256px.png"
                 class="h-40 w-40 object-cover mb-6"/>

            <h2 class="text-2xl leading-tight font-black mb-4">Créer un locataire</h2>
            <p class="font-light text-gray-500">LOCATAIRES...</p>
            <p class="mt-3 mx-auto text-lg leading-normal">Créez la fiche détaillé de votre Locataire. Nom, prénoms,
                adresse, téléphone....</p>
        </div>

        <div class="my-4 w-full md:w-1/3 flex flex-col items-center justify-center px-4 ">
            <img src="https://www.rentila.com/img/home_icon_key_256px.png"
                 class=" h-40 w-40 object-cover mb-6"/>

            <h2 class="text-2xl leading-tight font-black mb-4">Créer une location</h2>
            <p class="font-light text-gray-500">LE CONTRAT DE BAIL</p>
            <p class="mt-3 mx-auto text-lg leading-normal">
			Liez votre Local et votre Locataire dans une Location.
                Indiquez la durée, le montant du loyer et charges...
				</p>
        </div>


    </div>
</div>

<div class="w-full h-full  py-12 text-left bg-purple-100 text-gray-700 leading-normal">
    <div class="container max-w-4xl mx-auto text-center">
        <h1 class="text-2xl font-black leading-tight md:text-3xl text-center text-black mb-3">Gérer seul son bien
            immobilier avec E-Location comme des milliers de bailleurs</h1>
        <p class="text-lg md:text-xl  font-black text-center text-gray-600">E-Location vous donne tous les outils
            professionnels et vous assiste avec la gestion de votre bien. Optimisez votre rendement locatif. Nous sommes
            là pour vous aider!</p>

    </div>
    <img src="https://www.rentila.com/img/grey_buildings.png" alt="photo" class="w-full mt-4">
</div>
<!-- /about -->

<!-- footer -->
<footer class="w-full bg-white px-6 border-t">
    <div class="container mx-auto max-w-4xl py-6 flex flex-wrap md:flex-no-wrap justify-between items-center text-sm">
        &copy;2020 E-Location. Tous les droits sont reserves.
        <div class="pt-4 md:p-0 text-center md:text-right text-xs">
            <a href="#" class="text-purple-500 no-underline hover:underline">Privacy Policy</a>
            <a href="#" class="text-purple-500 no-underline hover:underline ml-4">Terms &amp; Conditions</a>
            <a href="#" class="text-purple-500 no-underline hover:underline ml-4">Contact Us</a>
        </div>
    </div>
</footer>
<!-- /footer -->


</body>
</html>

@extends('layouts.auth')
@section('content')
    <form method="post" action="{{route('interventions.store')}}">
        @csrf
        <div class="font-sans mb-10">
            <h1 class="flex items-center uppercase font-sans font-bold break-normal text-gray-700 px-2 text-xl mt-12 lg:mt-0 md:text-2xl">
                Ajouter un intervention
            </h1>
            <hr class="border-b border-purple-500">
        </div>
        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-select">
                    Location :
                </label>
            </div>
            <div class="md:w-2/3">
                <select name="lct_id" class="form-select block w-full focus:bg-white" id="my-select">
                    <option value="">Default</option>
                    @foreach ($loc as $loc)
                        <option value="{{$loc->id}}">LOCATION {{$loc->id}}</option>
                        <input type="hidden" name="id" value="{{$loc->user->id}}"/>
                    @endforeach
                </select>

                <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
            </div>
        </div>

        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                    Sujet :
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="form-input block w-full focus:bg-white" name="sub" id="my-textfield" type="text" value="">
                <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
            </div>
        </div>
        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                    Type :
                </label>
            </div>
            <div class="md:w-2/3 flex">
                <label class="shadow border-2 mr-4 h-24 w-24">
                    <input type="radio" name="type" value="Electricité" autocomplete="off">
                    <svg id="light" class="ml-6" enable-background="new 0 0 24 24" height="32" viewBox="0 0 24 24" width="32"
                         xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path
                                d="m13.5 24h-3c-.7 0-1.5-.6-1.5-1.8v-2.1c0-1-.5-1.9-1.3-2.6-1.8-1.4-2.7-3.4-2.7-5.6.1-3.8 3.2-6.8 6.9-6.9 1.9 0 3.7.7 5 2s2.1 3.1 2.1 5c0 2.1-.9 4.1-2.6 5.4-.9.7-1.4 1.8-1.4 2.8v2.3c0 .8-.7 1.5-1.5 1.5zm-1.5-18c-3.2 0-5.9 2.7-6 5.9 0 1.9.8 3.7 2.3 4.8 1.1.9 1.7 2.1 1.7 3.4v2.1c0 .2 0 .8.5.8h3c.3 0 .5-.2.5-.5v-2.3c0-1.3.7-2.7 1.8-3.6 1.4-1.1 2.2-2.8 2.2-4.6 0-1.6-.6-3.1-1.8-4.3-1.1-1.1-2.6-1.7-4.2-1.7z"/>
                        </g>
                        <g>
                            <path d="m14.5 21h-5c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h5c.3 0 .5.2.5.5s-.2.5-.5.5z"/>
                        </g>
                        <g>
                            <path d="m12 3c-.3 0-.5-.2-.5-.5v-2c0-.3.2-.5.5-.5s.5.2.5.5v2c0 .3-.2.5-.5.5z"/>
                        </g>
                        <g>
                            <path
                                d="m18.7 5.8c-.1 0-.3 0-.4-.1-.2-.2-.2-.5 0-.7l1.4-1.4c.2-.2.5-.2.7 0s.2.5 0 .7l-1.4 1.4s-.2.1-.3.1z"/>
                        </g>
                        <g>
                            <path d="m23.5 12.5h-2c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h2c.3 0 .5.2.5.5s-.2.5-.5.5z"/>
                        </g>
                        <g>
                            <path
                                d="m20.1 20.6c-.1 0-.3 0-.4-.1l-1.4-1.4c-.2-.2-.2-.5 0-.7s.5-.2.7 0l1.4 1.4c.2.2.2.5 0 .7 0 .1-.1.1-.3.1z"/>
                        </g>
                        <g>
                            <path
                                d="m3.9 20.6c-.1 0-.3 0-.4-.1-.2-.2-.2-.5 0-.7l1.4-1.4c.2-.2.5-.2.7 0s.2.5 0 .7l-1.4 1.4c-.1.1-.2.1-.3.1z"/>
                        </g>
                        <g>
                            <path d="m2.5 12.5h-2c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h2c.3 0 .5.2.5.5s-.2.5-.5.5z"/>
                        </g>
                        <g>
                            <path
                                d="m5.3 5.8c-.1 0-.3 0-.4-.1l-1.4-1.5c-.2-.2-.2-.5 0-.7s.5-.2.7 0l1.4 1.4c.2.2.2.5 0 .7-.1.1-.2.2-.3.2z"/>
                        </g>
                        <g>
                            <path
                                d="m16 12.5c-.3 0-.5-.2-.5-.5 0-1.9-1.6-3.5-3.5-3.5-.3 0-.5-.2-.5-.5s.2-.5.5-.5c2.5 0 4.5 2 4.5 4.5 0 .3-.2.5-.5.5z"/>
                        </g>
                    </svg>
                    <span class="block label text-gray-600 ml-1">Electricité</span>
                </label>
                <label class="shadow border-2 mr-4 h-24 w-24">
                    <input type="radio" name="type" value="Plomberie"  autocomplete="off">
                    <svg class="ml-6" enable-background="new 0 0 512 512" height="32" viewBox="0 0 512 512" width="32"
                         xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <g>
                                <path
                                    d="m392.5 61.881h-243c-10.217 0-18.5-8.283-18.5-18.5 0-10.217 8.283-18.5 18.5-18.5h243c10.217 0 18.5 8.283 18.5 18.5 0 10.218-8.283 18.5-18.5 18.5z"
                                    fill="#efe7e4"/>
                                <path
                                    d="m392.5 24.881h-30c10.217 0 18.5 8.283 18.5 18.5 0 10.217-8.283 18.5-18.5 18.5h30c10.217 0 18.5-8.283 18.5-18.5 0-10.217-8.283-18.5-18.5-18.5z"
                                    fill="#dad0cb"/>
                                <path d="m234.311 83.011h73.378v35.881h-73.378z" fill="#f9f6f6"
                                      transform="matrix(0 -1 1 0 170.048 371.952)"/>
                                <path d="m207.5 235.381v-87h-201.5c-3.314 0-6 2.686-6 6v75c0 3.314 2.686 6 6 6z"
                                      fill="#efe7e4"/>
                                <path
                                    d="m334.5 148.381h87.703c37.167 0 67.297 30.13 67.297 67.297v119.703h-87v-89.267c0-5.928-4.805-10.733-10.733-10.733h-57.267z"
                                    fill="#efe7e4"/>
                                <path
                                    d="m422.203 148.381h-30c37.167 0 67.297 30.13 67.297 67.297v104.703h30v-104.703c0-37.167-30.13-67.297-67.297-67.297z"
                                    fill="#dad0cb"/>
                                <path
                                    d="m395.12 350.381h101.76c4.208 0 7.62-3.411 7.62-7.62v-14.76c0-4.208-3.412-7.62-7.62-7.62h-101.76c-4.208 0-7.62 3.412-7.62 7.62v14.76c0 4.209 3.412 7.62 7.62 7.62z"
                                    fill="#8b818e"/>
                                <path
                                    d="m496.88 320.381h-30c4.208 0 7.62 3.412 7.62 7.62v14.76c0 4.208-3.412 7.62-7.62 7.62h30c4.208 0 7.62-3.411 7.62-7.62v-14.76c0-4.208-3.412-7.62-7.62-7.62z"
                                    fill="#756e78"/>
                                <path
                                    d="m92.5 148.381v87c0 8.284 6.716 15 15 15 8.284 0 15-6.716 15-15v-87c0-8.284-6.716-15-15-15-8.284 0-15 6.716-15 15z"
                                    fill="#8b818e"/>
                                <path
                                    d="m246.562 79.263h48.876c8.284 0 15-6.716 15-15v-41.763c0-8.284-6.716-15-15-15h-48.876c-8.284 0-15 6.716-15 15v41.763c0 8.284 6.716 15 15 15z"
                                    fill="#8b818e"/>
                                <path
                                    d="m295.438 7.5h-30c8.284 0 15 6.716 15 15v41.763c0 8.284-6.716 15-15 15h30c8.284 0 15-6.716 15-15v-41.763c0-8.284-6.716-15-15-15z"
                                    fill="#756e78"/>
                                <path
                                    d="m399.028 457.547c0 25.932 21.03 46.953 46.972 46.953s46.972-21.022 46.972-46.953c0-22.617-35.73-59.357-44.865-68.381-1.17-1.156-3.043-1.156-4.213 0-9.136 9.024-44.866 45.764-44.866 68.381z"
                                    fill="#ecf5ff"/>
                                <path
                                    d="m443.896 389.163c-2.61 2.578-7.394 7.423-12.896 13.554 13.746 15.319 31.972 38.675 31.972 54.829 0 20.686-13.389 38.235-31.972 44.493 4.712 1.587 9.753 2.46 15 2.46 25.942 0 46.972-21.022 46.972-46.953 0-22.617-35.73-59.357-44.865-68.38-1.17-1.155-3.041-1.158-4.211-.003z"
                                    fill="#cbe0fd"/>
                                <path
                                    d="m321.31 261.122h-100.62c-16.569 0-30-13.432-30-30v-78.48c0-16.569 13.431-30 30-30h100.62c16.569 0 30 13.431 30 30v78.48c0 16.568-13.431 30-30 30z"
                                    fill="#8b818e"/>
                                <path
                                    d="m321.31 122.641h-30c16.569 0 30 13.431 30 30v78.48c0 16.568-13.431 30-30 30h30c16.569 0 30-13.432 30-30v-78.48c0-16.568-13.432-30-30-30z"
                                    fill="#756e78"/>
                            </g>
                            <path
                                d="m497 312.888v-22.302c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v22.296h-72v-66.772c0-10.052-8.178-18.23-18.23-18.23h-32.96v-72h63.39c32.974 0 59.8 26.826 59.8 59.8v39.906c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-39.906c0-41.245-33.555-74.8-74.8-74.8h-65.29c-4.946-14.932-19.031-25.739-35.6-25.739h-24.869v-28.404c10.201-.45 18.653-7.723 20.903-17.357h75.156c14.089.062 26-11.889 26-26 0-14.336-11.664-26-26-26h-75.157c-2.324-9.947-11.26-17.38-21.905-17.38h-48.876c-10.645 0-19.581 7.433-21.905 17.38h-75.157c-14.231-.076-26 11.817-26 26 0 14.336 11.664 26 26 26h75.156c2.25 9.634 10.702 16.907 20.903 17.357v28.404h-24.869c-16.57 0-30.654 10.807-35.6 25.739h-56.38c-3.096-8.729-11.432-14.999-21.209-14.999s-18.113 6.27-21.209 14.999h-78.792c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h77.5v72h-77.5c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h78.79c3.096 8.73 11.432 15.001 21.21 15.001s18.115-6.271 21.21-15.001h56.378c4.945 14.934 19.03 25.742 35.601 25.742h12.681c4.142 0 7.5-3.357 7.5-7.5 0-4.142-3.358-7.5-7.5-7.5h-12.68c-11.23 0-20.563-8.27-22.233-19.039-.003-.028-.009-.054-.012-.081.305-1.379-.304-82.628.002-85.259.002-.016.005-.031.007-.047 1.663-10.777 11.001-19.055 22.236-19.055h100.62c11.236 0 20.573 8.278 22.236 19.055.002.016.005.031.007.047 1.161 9.98 1.013 76.513.002 85.259-.003.027-.01.054-.012.081-1.67 10.769-11.003 19.039-22.233 19.039h-52.939c-4.142 0-7.5 3.358-7.5 7.5 0 4.143 3.358 7.5 7.5 7.5h52.939c16.571 0 30.656-10.808 35.601-25.742h34.859c1.781 0 3.23 1.449 3.23 3.23v66.778c-8.282.065-15 6.817-15 15.113v14.761c0 8.337 6.783 15.12 15.12 15.12h101.76c8.337 0 15.12-6.783 15.12-15.12v-14.761c0-8.296-6.718-15.048-15-15.113zm-179.062-280.508h74.562c6.065 0 11 4.935 11 11 0 5.952-5.022 11.03-11 11h-74.562zm-93.876 22h-74.562c-6.065 0-11-4.935-11-11 0-5.986 5.005-11.027 11-11h74.562zm-109.062 181.001c0 4.136-3.364 7.5-7.5 7.5s-7.5-3.364-7.5-7.5v-87c0-4.136 3.364-7.5 7.5-7.5s7.5 3.364 7.5 7.5zm68.19-7.501h-53.19v-72h53.19zm98.251-112.739h-20.882v-28.378h20.882zm-34.879-43.378c-4.136 0-7.5-3.364-7.5-7.5v-41.763c0-4.136 3.364-7.5 7.5-7.5h48.876c4.136 0 7.5 3.364 7.5 7.5v41.763c0 4.136-3.364 7.5-7.5 7.5zm250.438 270.999c0 .066-.054.12-.12.12h-101.76c-.066 0-.12-.054-.12-.12v-14.761c0-.065.054-.119.12-.119h101.76c.066 0 .12.054.12.119zm-43.622 41.07c-4.069-4.021-10.688-4.021-14.755-.002-14.16 13.987-47.095 49.169-47.095 73.717 0 30.025 24.436 54.453 54.472 54.453s54.472-24.428 54.472-54.453c0-24.548-32.935-59.73-47.094-73.715zm-7.378 113.168c-21.765 0-39.472-17.698-39.472-39.453 0-9.324 10.415-30.446 39.472-59.881 29.06 29.436 39.472 50.556 39.472 59.881 0 21.755-17.707 39.453-39.472 39.453z"/>
                        </g>
                    </svg>
                    <span class="block label text-gray-600 ml-1">Plomberie</span>
                </label>
                <label class="shadow border-2 mr-4 h-24 w-24">
                    <input type="radio" name="type" value="Autre" autocomplete="off">
                    <svg class="h-10 w-10 text-black ml-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                    </svg>
                    <span class="block label text-gray-600 ml-6">Autre</span>
                </label>
            </div>
        </div>
        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
                    Description :
                </label>
            </div>
            <div class="md:w-2/3">
                <textarea class="form-textarea block w-full focus:bg-white" name="desc" id="my-textarea" value=""
                          rows="8"></textarea>
                <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
            </div>
        </div>
        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                    Date :
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="form-input block w-full focus:bg-white" id="my-textfield" type="date" name="date"
                       value="">
                <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
            </div>
        </div>

        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button
                    class="shadow bg-purple-700 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                    type="submit">
                    Ajouter
                </button>
            </div>
        </div>

    </form>



@endsection

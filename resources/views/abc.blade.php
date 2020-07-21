<li class="">
    <a class="inline-block py-2 px-4 no-underline" href="{{ route('notification.index') }}">
                                <span class="fa-layers fa-fw">
                                    <span style="color: yellow" class="fas fa-bell fa-lg" data-fa-transform="grow-2"></span>
                                    <span class="fa-layers-text fa-inverse" data-fa-transform="shrink-4 up-2 left-1" style="color: black; font-weight:900">{{ auth()->user()->unreadNotifications->count() }}</span>
                                </span>
    </a>
</li>

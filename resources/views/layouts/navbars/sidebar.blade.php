@php
    $user = Auth::user();
    $isAdmin = $user->email == 'awes@example.com';
@endphp

<div class="sidebar" data-color="azure" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            {{ __('ShowBoat') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @if ($isAdmin)
                <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
            @endif
            <li class="nav-item {{ $activePage == 'profile' || $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                    <p>{{ __('Form Entries') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExample">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'new-entry' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('form-entry.create') }}">
                                <i class="material-icons">content_paste</i>

                                {{-- <span class="sidebar-mini"> content_paste </span> --}}
                                <span class="sidebar-normal">{{ __('New Entry') }} </span>
                            </a>
                        </li>
                        @if ($isAdmin)
                            <li class="nav-item{{ $activePage == 'edit-entry' ? ' active' : '' }}">
                                <a class="nav-link" href="#">
                                    {{-- <span class="sidebar-mini"> UM </span> --}}
                                    <i class="material-icons">library_books</i>

                                    <span class="sidebar-normal"> {{ __('Edit Entry') }} </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>

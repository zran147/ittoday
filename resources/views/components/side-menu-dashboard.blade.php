<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper ">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="/"><img src="/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">

                <ul class="menu">
                    <h3>Hallo , {{ Auth::user()->name }}</h3>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-circle"></i>
                            <span>Profile</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="/profil">Setting</a>
                            </li>
                            <li class="submenu-item ">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="mx-4">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-title">Menu</li>
                    <li class="sidebar-item @if (Request::is('dashboard')) {{ 'active' }} @endif">
                        <a href="/dashboard" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    {{-- KESTARY,ACARA,ADMIN,LO --}}
                    {{-- @can('action-event') --}}
                    <li class="sidebar-title">About Event</li>
                    <li class="sidebar-item @if (Request::is('dashboard/event*')) {{ 'active' }} @endif">
                        <a href="/dashboard/event" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>event</span>
                        </a>
                    </li>
                    <li class="sidebar-item  has-sub @if (Request::is('dashboard/detailevent')) {{ 'active' }} @endif">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-collection-fill"></i>
                            <span>Detail Event</span>
                        </a>
                        <ul class="submenu ">
                            @foreach ($event as $item)
                                <li class="submenu-item ">
                                    <a href="/dashboard/detailevent/{{ $item->slug_event }}">
                                        {{ $item->name_event }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    {{-- @endcan --}}

                    {{-- KESTARY,KOMPETISI,ADMIN,LO --}}
                    {{-- @can('action-competision') --}}
                    <li class="sidebar-title">About Competision</li>
                    <li class="sidebar-item ">
                        <a href="/dashboard/event" class='sidebar-link'>
                            <i class="bi bi-Code"></i>
                            <span>Competision</span>
                        </a>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-Collection-play-fill"></i>
                            <span>Detail Competision</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="extra-component-avatar.html">UX ITTODAY 2022</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="extra-component-avatar.html">HACK TODAY 2022</a>
                            </li>
                        </ul>
                    </li>
                    {{-- @endcan --}}

                    {{-- @can('action-competision') --}}
                    <li class="sidebar-title">About User</li>
                    <li class="sidebar-item ">
                        <a href="/dashboard/event" class='sidebar-link'>
                            <i class="bi bi-person"></i>
                            <span>Manage User</span>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="/dashboard/event" class='sidebar-link'>
                            <i class="bi bi-command"></i>
                            <span>Manage role and permissions</span>
                        </a>
                    </li>
                    {{-- @endcan --}}

                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
</div>

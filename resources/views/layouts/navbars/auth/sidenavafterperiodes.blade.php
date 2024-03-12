<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            
            <span class="ms-1 font-weight-bold">Gestion de  paie</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'user-management' ? 'active' : '' }}" href="{{ route('user-management') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>
            
            @if(auth()->user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link {{ route('periodes.personnel_permanent', ['id_periode' => $id_periode]) }}" href="{{ route('virtual-reality') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div> 
                    <span class="nav-link-text ms-1">Virtual Reality</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'periodes.personnel_permanent' ? 'active' : '' }}" href="{{ route('periodes.personnel_permanent', ['id_periode' => $id_periode]) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-ruler-pencil text-info text-sm opacity-10"></i>
                    </div> 
                    <span class="nav-link-text ms-1">Personnel Permanent</span>
                </a>
            </li>
            <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName() == 'salaries_exoneration.index' ? 'active' : '' }}" href="{{ route('salaries_exoneration.index', ['id_periode' => $id_periode]) }}">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-money-coins text-info text-sm opacity-10"></i>
        </div> 
        <span class="nav-link-text ms-1">Salariés Exonérés</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('personnel_occasionnel.index',['id_periode' => $id_periode]) }}">
        <i class="ni ni-single-02 text-primary"></i>
        <span class="nav-link-text ms-1">Personnel Occasionnel</span>
    </a>
</li>
            
            
        </ul>
    </div>
    
</aside>
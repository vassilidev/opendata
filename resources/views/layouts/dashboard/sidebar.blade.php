<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <i class="fas fa-database"></i>
        </div>
        <div class="sidebar-brand-text mx-3">OpenData</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @foreach((new \App\Http\Controllers\TableController())->tables as $table)
        <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == $table) ? 'fw-bold text-white' : '' }}"
               href="{{ route('table', $table) }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ ucfirst(Str::plural($table)) }}</span>
            </a>
        </li>
@endforeach

<!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                @foreach((new \App\Http\Controllers\TableController())->tables as $table)
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->segment(1) == $table) ? 'active' : '' }}"
                           href="{{ route('table', $table) }}">
                            {{ ucfirst(Str::plural($table)) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

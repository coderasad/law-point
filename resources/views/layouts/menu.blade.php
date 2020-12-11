<nav class="navbar navbar-expand-lg navbar-dark bg-light top-nav">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">  
            @php
                $db = DB::table('logos')->get();
            @endphp          
            @foreach ($db as $data)
                <img src={{asset("public/frontend/images/logo/{$data->logo}")}} alt="logo" />
            @endforeach
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="{{ Route::is('index') ? 'nav-link active' : 'nav-link' }}"href="{{route('index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('aboutUs') ? 'nav-link active' : 'nav-link' }}" href="{{route('aboutUs')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('services') ? 'nav-link active' : 'nav-link' }}" href="{{route('services')}}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('portfolios') ? 'nav-link active' : 'nav-link' }}" href="{{route('portfolios')}}">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('contact') ? 'nav-link active' : 'nav-link' }}" href="{{route('contact')}}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
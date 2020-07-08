<!-- Navbar -->
<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-none" data-aos="fade-down">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ url('frontend/images/logo_gendhis.png') }}" alt="Logo Gendhis Wedding">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a href="{{ route('home') }}" class="nav-link {{ Request::url() == url('/') ? 'active' : '' }}">Beranda</a>
                </li>
                <li class="nav-item dropdown mx-md-2">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown">
                        Paket Pernikahan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('detail/gendhis-paket-a') }}">Gendhis Paket A</a>
                        <a class="dropdown-item" href="{{ url('detail/gendhis-paket-b') }}">Gendhis Paket B</a>
                        <a class="dropdown-item" href="{{ url('detail/gendhis-paket-c') }}">Gendhis Paket C</a>
                        <a class="dropdown-item" href="{{ url('detail/gendhis-paket-d') }}">Gendhis Paket D</a>
                        {{-- @foreach ($packages as $package)
                            <a href="{{ route('detail', $package->slug) }}">{{ $package->title }}</a>
                        @endforeach --}}
                    </div>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#footer" class="nav-link">Hubungi Kami</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#testimonial" class="nav-link">Testimonial</a>
                </li>
            </ul>

            @guest
                <!-- Mobile Button-->
                <form class="form-outline d-sm-block d-md-none">
                    <button class="btn btn-login btn-outline my-2 my-sm-0" style="border-color: #F29B08;" type="button" 
                    onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                        Masuk
                    </button>
                </form>
    
                <!-- Desktop Button-->
                <form class="form-outline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-outline my-2 my-sm-0 px-4" style="border-color: #F29B08;" type="button"
                    onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                        Masuk
                    </button>
                </form>
            @endguest

            @auth
                <div class="nav-item dropdown no-arrow">
                    <a class="btn btn-login btn-outline my-0 my-sm-0 px-2 nav-link dropdown-toggle" style="border-color: #F29B08;" type="submit"
                        href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}    
                        
                    </a>
                    
                    <!-- Desktop Button -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href={{ route('profile', Auth::user()->id) }}>Profil saya</a>
                        <form class="form-outline my-2 my-lg-0 d-md-block" action="{{ url('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item">
                                Logout
                            </button>
                        </form>
                    </div>

                    <!--Mobile Button -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href={{ route('profile', Auth::user()->id) }}>Profil saya</a>
                        <form class="form-outline d-none d-md-block d-md-none" action="{{ url('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item">
                                Logout
                            </button>
                        </form>
                    </div>
                
                    
                    <!-- Mobile Button
                    <form class="form-outline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-login btn-outline my-2 my-sm-0" style="border-color: #F29B08;" type="submit">
                            Keluar
                        </button>
                    </form>
        
                    <!-- Desktop Button
                    <form class="form-outline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-login btn-outline my-2 my-sm-0 px-4" style="border-color: #F29B08;" type="submit">
                            Keluar
                        </button>
                    </form> -->
                </div>
            @endauth
            
        </div>
    </nav>
</div>
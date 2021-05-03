<nav>
    <div class="navbar">
        <div class="container">
                <ul class="primary-nav">
                    <li class="tentang"><a href="{{ route('tentang-kami') }}">Tentang Kami</a></li>
                    <li class="cerita"><a href="{{ route('cerita.index') }}">Cerita</a></li>
                </ul>
                <a href="{{ route('home-customer') }}" class="logo"><img src="{{ URL::asset('images/logo.png') }}" alt="Logo"></a>
                <ul class="secondary-nav">
                    @if (Auth('customer')->check())
                        <li class="profile"><a href="{{ route('profil-alamat') }}">Profil</a></li>
                    @else
                        <li class="profile"><a href="{{ route('login-customer') }}">Masuk</a></li>
                    @endif
                    <li class="belanja"><a href="{{ route('belanja.index') }}">Belanja</a></li>
                    <li class="sekarang"><a href="">Keranjang (0)</a></li>
                </ul>
        </div>
        <div class="container-mobile">
            <a href="{{ route('home-customer') }}"><img src="images/logo-mobile.png" alt=""></a>
            
            <input type="checkbox"  id="check">
            <label for="check" class="checkbtn"><img src="{{ URL::asset('images/nav-mobile.svg') }}" alt=""></label>
            <div class="bg-nav-mob"></div> 
                <div class="nav-mob">
                    
                    <ul>
                        <li><a href="keranjang-belanja.html">Keranjang (0)</a></li>
                        <li><a href="{{ route('belanja.index') }}">Belanja</a></li>
                        @if (Auth::check())
                            <li><a href="{{ route('profil-alamat') }}">Profil</a></li>
                        @else
                            <li><a href="{{ route('login-customer') }}">Masuk</a></li>
                        @endif
                        <li><a href="{{ route('cerita.index') }}">Cerita</a></li>
                        <li><a href="{{ route('tentang-kami') }}">Tentang Kami</a></li>
                    </ul>
                </div>
        </div>
    </div>
    </nav>
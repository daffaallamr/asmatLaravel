<nav>
    <div class="navbar" id="navbar-dekstop">
        <div class="container">
                <ul class="primary-nav">
                    <li class="tentang"><a href="{{ route('tentang-kami') }}">Tentang Kami</a></li>
                    <li class="cerita"><a href="{{ route('cerita.index') }}">Cerita</a></li>
                    <li><a href="{{ route('home-customer') }}">Beranda</a></li>
                </ul>
                <a href="{{ route('home-customer') }}" class="logo" id="navbar-dekstop-2"><img src="{{ asset('/public/images/logo.png') }}" alt="Logo"></a>
                <ul class="secondary-nav">
                    @if (Auth('customer')->check())
                        <li class="profile"><a href="{{ route('profilAlamat') }}">Profil</a></li>
                    @else
                        <li class="profile"><a href="{{ route('login-customer') }}">Masuk</a></li>
                    @endif
                    <li class="belanja"><a href="{{ route('belanja.index') }}">Belanja</a></li>
                    @if ($order->where('customer_id', Auth('customer')->id())->isEmpty())
                        <li class="sekarang"><a href="{{ route('keranjang') }}">Keranjang (0)</a></li>
                    @else
                        @foreach ($order->where('customer_id', Auth('customer')->id()) as $customerOrder)
                            <li class="sekarang"><a href="{{ route('keranjang') }}">Keranjang ({{ $customerOrder->orderDetails->count() }})</a></li>
                        @endforeach
                    @endif
                </ul>
        </div>
        <div class="container-mobile"> 
            <a href="{{ route('home-customer') }}"><img src="{{ asset('public/images/logo-mobile.png') }}" alt=""></a>
            
            <input type="checkbox"  id="check">
            <label for="check" class="checkbtn"><img src="{{ asset('public/images/nav-mobile.svg') }}" alt=""></label>
            <div class="bg-nav-mob"></div> 
                <div class="nav-mob">
                    
                    <ul>
                        @if ($order->where('customer_id', Auth('customer')->id())->isEmpty())
                        <li class="sekarang"><a href="{{ route('keranjang') }}">Keranjang (0)</a></li>
                        @else
                            @foreach ($order->where('customer_id', Auth('customer')->id()) as $customerOrder)
                                <li class="sekarang"><a href="{{ route('keranjang') }}">Keranjang ({{ $customerOrder->orderDetails->count() }})</a></li>
                            @endforeach
                        @endif
                        <li><a href="{{ route('belanja.index') }}">Belanja</a></li>
                        @if (Auth('customer')->check())
                            <li class="profile"><a href="{{ route('profilAlamat') }}">Profil</a></li>
                        @else
                            <li class="profile"><a href="{{ route('login-customer') }}">Masuk</a></li>
                        @endif
                        <li><a href="{{ route('home-customer') }}">Beranda</a></li>
                        <li><a href="{{ route('cerita.index') }}">Cerita</a></li>
                        <li><a href="{{ route('tentang-kami') }}">Tentang Kami</a></li>
                    </ul>
                </div>
        </div>
    </div>
    </nav>
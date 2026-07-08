<nav class="navbar navbar-expand-lg fixed-top navbar-dark py-3">
    <div class="container-fluid nav-overlay" data-aos="zoom-in">
        <a class="navbar-brand" href="#">mebel.id</a>
        <button class="navbar-toggler menu-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto ">
                <span>&times;</span>
                <li class="nav-item ms-4" data-aos="zoom-in">
                    <a class="nav-link  {{ $title === 'Home' ? 'active' : '' }}" href="/">HOME</a>
                </li>
                <li class="nav-item ms-4" data-aos="zoom-in" data-aos-delay="100">
                    <a class="nav-link  {{ $title === 'Tentang Kami' ? 'active' : '' }}" href="/tentangkami">TENTANG</a>
                </li>
                <li class="nav-item ms-4" data-aos="zoom-in" data-aos-delay="200">
                    <a class="nav-link  {{ $title === 'Berita' ? 'active' : '' }}"
                        href="{{ route('frontend.berita') }}">BERITA</a>
                </li>
                <li class="nav-item ms-4" data-aos="zoom-in" data-aos-delay="300">
                    <a class="nav-link  {{ $title === 'Product' ? 'active' : '' }}" href="/product">PRODUCT</a>
                </li>
                <li class="nav-item ms-4" data-aos="zoom-in" data-aos-delay="300">
                    <a class="nav-link  {{ $title === 'Kontak' ? 'active' : '' }}" href="/kontak">KONTAK</a>
                </li>
                @auth
                    <li class="nav-item ms-4" data-aos="zoom-in" data-aos-delay="400">
                        <a class="nav-link {{ $title === 'Riwayat Pesanan' ? 'active' : '' }}"
                            href="{{ route('orders.index') }}">RIWAYAT PESANAN</a>
                    </li>
                    <li class="nav-item ms-4" data-aos="zoom-in" data-aos-delay="500">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-decoration-none p-0">LOGOUT</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item ms-4" data-aos="zoom-in" data-aos-delay="500">
                        <a class="nav-link {{ $title === 'Login' ? 'active' : '' }}" href="{{ route('login') }}">LOGIN</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var nav = document.querySelector('nav');

    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 10) {
            nav.classList.add('bg-a', 'shadow');
        } else {
            nav.classList.remove('bg-a', 'shadow');
        }
    });
    document.querySelector('.navbar button').onclick = () => {
        document.querySelector('.navbar-nav').classList.add("active");
    }
    document.querySelector('.navbar-nav span').onclick = () => {
        document.querySelector('.navbar-nav').classList.remove("active");
    }
</script>

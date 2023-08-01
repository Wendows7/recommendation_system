<!-- Navigation-->
<nav class="navbar navbar-expand-lg {{ Request::is('/')? 'navbar-dark' : 'bg-dark' }} fixed-top" id="mainNav">
    <div class="container">
        <a  href="/"><img src="{{ asset('user_assets/assets/img/cat777.svg') }}" width="50"  alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" 
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link {{ Request::is('/')? 'active' : '' }}" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('ratings*')? 'active' : '' }}" href="/ratings">Rating</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('products')? 'active' : '' }}" href="/products">Product</a></li>
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

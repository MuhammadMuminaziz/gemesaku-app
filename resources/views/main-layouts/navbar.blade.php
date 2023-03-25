<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#home">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            GEMESAKU
        </a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon border-0 shadow-none"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="#hasil_pembelajaran">Hasil Pembelajaran</a>
            <a class="nav-link" href="#pengenalan_program">Pengenalan Program</a>
            <a class="nav-link" href="#gallery">Gallery</a>
        </div>
        <div class="navbar-nav">
            <div class="nav-link">
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
            </div>
        </div>
        </div>
    </div>
</nav>
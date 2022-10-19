<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a href={{ route('beranda') }} class="navbar-brand">JDIH Tambong</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href={{ route('beranda') }} class="nav-link">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dokumen Hukum
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href={{ route('perdes') }} class="dropdown-item">Perdes</a></li>
                        <li><a href={{ route('perkades') }} class="dropdown-item">Perkades</a></li>
                        <li><a href={{ route('permakades') }} class="dropdown-item">Permakades</a></li>
                        <li><a href={{ route('keputusan') }} class="dropdown-item">SK Kades</a></li>
                        <li><a href={{ route('lain-lain') }} class="dropdown-item">Lain-Lain</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href={{ route('dokumen') }} class="dropdown-item">Semua Dokumen</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

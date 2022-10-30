<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ $active['admin.dashboard'] ?? '' }}" aria-current="page"
                    href="{{ route('admin.dashboard') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active['admin.dokumen'] ?? '' }}" href="{{ route('admin.dokumen') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Dokumen
                </a>
            </li>
        </ul>

        @if ($isSuperAdmin)
            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Super Admin Menu</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                    <span data-feather="plus-circle" class="align-text-bottom"></span>
                </a>
            </h6>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Pengelola Dokumen
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Tipe Dokumen
                    </a>
                </li>
            </ul>
        @endif
    </div>
</nav>

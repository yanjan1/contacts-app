<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">

        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#secondaryNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="secondaryNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
                        id="profileDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle fs-5"></i>
                        {{ $username }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="#">Dashboard</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

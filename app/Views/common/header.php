<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('images/agua.png'); ?>" type="image/png">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url(""); ?>">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ingreso
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($session->has('user_id')): ?>
                                <li><a class="dropdown-item" href="<?= site_url("logout"); ?>">Cerrar Sesión</a></li>
                                <?php if ($session->get('is_admin') == true): ?>
                                    <li><a class="dropdown-item" href="<?= site_url("admin"); ?>">Administrador</a></li>
                                <?php endif; ?>
                            <?php else: ?>
                                <li><a class="dropdown-item" href="<?= site_url("register"); ?>">Register</a></li>
                                <li><a class="dropdown-item" href="<?= site_url("login"); ?>">Login</a></li>
                                <li><a class="dropdown-item" href="<?= site_url(""); ?>">Home</a></li>
                                <li><a class="dropdown-item" href="<?= site_url(""); ?>">About Us</a></li>
                                <li><a class="dropdown-item" href="<?= site_url(""); ?>">Contact</a></li>
                                <li><a class="dropdown-item" href="<?= site_url("logout"); ?>">logout</a></li>
                            <?php endif; ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?= site_url("acercade"); ?>">Acerca De</a></li>
                        </ul>
                    </li>
                </ul>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <?php if ($session->has('user_name')): ?>
                    <p class="text-white">Bienvenido, <?= $session->get('user_name'); ?></p>
                <?php endif; ?>

            </div>
        </div>
    </nav>
</body>
</html>
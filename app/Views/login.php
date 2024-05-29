<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Mode Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link href="login_styles/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body class="bg-dark text-white">

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card bg-dark border-light">
                    <div class="card-body">
                        <h1 class="text-center text-white mb-3">Log in</h1>
                        <form method="post" action="<?= base_url("loginForm"); ?>">
                            <div class="mb-3">
                                <label for="email" class="form-label text-white"><i class="fas fa-user"></i> Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-white"><i class="fas fa-lock"></i> Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Log in <i class="fas fa-chevron-right"></i></button>
                        </form>
                        <div class="mt-3 text-white">
                            <p>You do not have an account?<a href="<?= site_url("register"); ?>">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
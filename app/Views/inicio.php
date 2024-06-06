<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>pH-Detector</title>
    <link rel="shortcut icon" href="<?php echo base_url('images/agua.png'); ?>" type="image/png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/styles.css'); ?>">
    <link rel="website icon" type="png" href="<?php echo base_url('images/agua.png');?>">
    
</head>

<body>
    <header>
        <img src="<?php echo base_url('images/agua.png'); ?>" alt="Logo de la empresa" class="logo" href="<?= site_url(""); ?>">
        <h1 class="text-white">pH-Detector</h1>
        
        <nav>

            <a href="<?= site_url(""); ?>">Home</a>
            <a href="#">About us</a>
            <a href="#">Contact</a>
            <a href="<?= site_url("login"); ?>">Login</a>
            <a href="<?= site_url("logout"); ?>">Logout</a>

        </nav>
    </header>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-white">
                    About us
                </h3>
                <p class="text-white text-justify">
                Welcome to our project! We are students passionate about technology who are developing a pH detector to regulate water with automatic pumps. Our mission is to create an innovative and efficient solution to maintain pH balance in various environments. We focus on automating the process to ensure accuracy and convenience in use. Join us on this exciting journey towards a more sustainable and technologically advanced future. Thanks for being part of our community!
                </p>
            </div>
        </div>
    </section>
    <footer>
        <h2>Contact</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Mauris ac lacinia mauris, a tincidunt urna. Fusce consectetur elit eu risus pharetra, vitae vestibulum velit suscipit. Proin scelerisque velit at ligula fermentum, ut tempor nunc pretium. Aenean vitae arcu et lacus ullamcorper tempor in sit amet neque. Maecenas vestibulum consequat risus, et vehicula leo auctor vel.</p>
        <hr>
        &copy; Todos los derechos reservados
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>
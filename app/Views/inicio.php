<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pH-Detector</title>
    <link rel="shortcut icon" href="<?php echo base_url('images/agua.png'); ?>" type="image/png">
    <link rel="website icon" type="png" href="<?php echo base_url('images/agua.png'); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<main class="flex-grow">
    <section class="container mx-auto py-8 flex justify-start">
        <div class="max-w-xl">
            <h3 class="text-white text-2xl mt-10">About us</h3>
            <p class="text-white text-justify">
                Welcome to our project! We are students passionate about technology who are developing a pH detector to regulate water with automatic pumps. Our mission is to create an innovative and efficient solution to maintain pH balance in various environments. We focus on automating the process to ensure accuracy and convenience in use. Join us on this exciting journey towards a more sustainable and technologically advanced future. Thanks for being part of our community!
            </p>
        </div>
    </section>
</main>

<footer class="flex flex-col items-center justify-center py-8 bg-gray-800 text-white">
    <div class="flex flex-wrap justify-between w-full px-8 mb-8">
        <div class="flex items-center space-x-4">
            <h2 class="text-xl font-bold text-white">Contact</h2>
            <a href="https://www.instagram.com">
                <img src="<?php echo base_url('images/instagram.png') ?>" alt="Instagram" class="w-6 h-6 hover:opacity-75">
            </a>
            <a href="https://www.facebook.com">
                <img src="<?php echo base_url('images/facebook.png') ?>" alt="Facebook" class="w-6 h-6 hover:opacity-75">
            </a>
            <a href="https://mail.google.com/">
                <img src="<?php echo base_url('images/email.png') ?>" alt="Facebook" class="w-6 h-6 hover:opacity-75">
            </a>
            <a href="tel:+1234567890">
                <img src="<?php echo base_url('images/telefono.png') ?>" alt="Facebook" class="w-6 h-6 hover:opacity-75">
            </a>
        </div>
        <div class="text-sm text-gray-400">
            <p>Subscribe to our newsletter!</p>
            <a href="<?php echo base_url('register') ?>" class="text-white hover:underline">Sign Up</a>
        </div>
    </div>
    <hr class="border-gray-700 w-full my-4">
    <div class="text-center text-sm text-gray-400 mt-2">
        <p>&copy; Todos los derechos reservados</p>
    </div>
</footer>
</body>

</html>
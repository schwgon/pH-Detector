<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="mt-2 bg-gray-100 p-8 shadow-md max-w-md w-full mx-auto">
        <h1 class="text-black text-2xl font-sans mb-6 text-center">Register</h1>
        <?php if (session()->getFlashdata('error_message')) : ?>
            <div class="alert alert-correo text-center mb-4 text-red-600	color: rgb(220 38 38);">
                <?= session()->getFlashdata('error_message') ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?= base_url("register1"); ?>">
            <div class="mb-4">
                <label for="email" class="block text-black mb-2 font-sans"><i class="fas fa-user"></i> User</label>
                <input name="name" required type="text" pattern="[A-Za-zÀ-ÿ\u00f1\u00d1\s]+" class="form-input w-full bg-gray-200 text-black font-light pl-2" id="name" placeholder="Your Name">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-black mb-2"><i class="fas fa-envelope font-sans"></i> Email</label>
                <input name="email" required type="email" class="form-input w-full bg-gray-200 text-black font-light pl-2" id="email" placeholder="examplemail@email.com">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-black mb-2 font-sans"><i class="fas fa-lock"></i> Password</label>
                <input name="password" required type="password" class="form-input w-full bg-gray-200 text-black font-light pl-2" id="password" minlength="8" placeholder="At least 8 characters">
            </div>
            <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-balck font-sans py-2 w-full px-4 mb-4">Register <i class="fas fa-chevron-right"></i></button>
            <p class="text-black font-light text-center">Do you already have an account? <a href="<?= site_url("login"); ?>" class="text-back hover:text-gray-700 ml-2">Log-In</a></p>
        </form>
    </div>

</body>

</html>
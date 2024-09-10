<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body class="bg-gray-100 dark:bg-gray-800 flex justify-center items-center min-h-screen">

    <!-- Tarjeta del formulario con fondo blanco en modo claro y fondo negro en modo oscuro -->
    <div class="dark:text-black p-8 shadow-md max-w-md w-full mx-auto border-2 border-emerald-400 ">
        <h1 class="text-2xl font-sans mb-6 text-center">Register</h1>

        <?php if (session()->getFlashdata('error_message')): ?>
            <div class="alert alert-correo text-center mb-4 text-red-600">
                <?= session()->getFlashdata('error_message') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url("register1"); ?>">
            <div class="mb-4">
                <label for="name" class="block mb-2 font-sans"><i class="fas fa-user"></i> User</label>
                <input name="name" required type="text" pattern="[A-Za-zÀ-ÿ\u00f1\u00d1\s]+"
                    class="form-input w-full bg-gray-200 dark:bg-gray-900 text-black dark:text-white font-light pl-2"
                    id="name" placeholder="Your Name">
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 font-sans"><i class="fas fa-envelope font-sans"></i> Email</label>
                <input name="email" required type="email"
                    class="form-input w-full bg-gray-200 dark:bg-gray-900 text-black dark:text-white font-light pl-2"
                    id="email" placeholder="example@mail.com">
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 font-sans"><i class="fas fa-lock"></i> Password</label>
                <input name="password" required type="password"
                    class="form-input w-full bg-gray-200 dark:bg-gray-900 text-black dark:text-white font-light pl-2"
                    id="password" minlength="8" placeholder="At least 8 characters">
            </div>
            <button type="submit"
                class="bg-emerald-400 hover:bg-emerald-500 text-white font-sans py-2 w-full px-4 mb-4">
                Register <i class="fas fa-chevron-right"></i>
            </button>
            <p class="font-light text-center">
                Do you already have an account? 
                <a href="<?= site_url("login"); ?>" class="text-emerald-400 hover:text-emerald-500 ml-2">
                    Log-In
                </a>
            </p>
        </form>
    </div>

</body>

</html>
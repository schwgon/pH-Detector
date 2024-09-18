<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body class="bg-gray-100 dark:bg-gray-800 flex justify-center items-center min-h-screen">
    <div class=" p-8 shadow-md max-w-md w-full mx-auto border-2 border-emerald-400">
        <h1 class="text-2xl font-sans mb-6 text-center">Log In</h1>
        <?php if (session()->getFlashdata('error_message')): ?>
            <div class="alert alert-error text-center mb-4 text-gray-300">
                <?= session()->getFlashdata('error_message') ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?= base_url("loginForm"); ?>">
            <div class="mb-4">
                <label for="email" class="block  mb-2 font-sans"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" class="form-input w-full bg-gray-200 text-black pl-2" id="email" name="email"
                    placeholder="Email" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block  mb-2 font-sans"><i class="fas fa-lock"></i> Password</label>
                <input type="password" class="form-input w-full bg-gray-200 text-black pl-2" id="password"
                    name="password" minlength="8" placeholder="Password" required>
            </div>
            <button type="submit"
                class="bg-emerald-400 hover:bg-emerald-500 text-white font-sans py-2 w-full px-4 mb-4">
                Log In <i class="fas fa-chevron-right"></i>
            </button>
        </form>
        <p class="font-light text-center">
            You don't have an account
            <a href="<?= site_url("register"); ?>" class="text-emerald-400 hover:text-emerald-500 ml-2">
                Register
            </a>
        </p>
        <div class="text-center">
            <p><a href="<?= site_url("restore_password"); ?>" class="hover:text-gray-200 ml-2">¿Olvido su
                    contraseña?</a></p>
        </div>

    </div>

</body>

</html>
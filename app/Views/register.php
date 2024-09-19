<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/register.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>
<body class="flex justify-center items-center min-h-screen">

    <!-- Tarjeta del formulario con fondo claro/oscuro -->
    <div class="card p-8 shadow-md max-w-5xl w-full mx-auto border-2 border-emerald-400">
        <h1 class="signup">Register</h1>

        <?php if (session()->getFlashdata('error_message')): ?>
            <div class="alert alert-correo text-center mb-4 text-red-600">
                <?= session()->getFlashdata('error_message') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url("register1"); ?>">
            <div class="inputBox">
                <input name="name" required type="text" pattern="[A-Za-zÀ-ÿ\u00f1\u00d1\s]+" placeholder=" " />
                <span>User</span>
            </div>
            <div class="inputBox">
                <input name="email" required type="email" placeholder="" />
                <span>Email</span>
            </div>
            <div class="inputBox">
                <input name="password" required type="password" minlength="8" placeholder=" " />
                <span>Password</span>
            </div>
            <button type="submit" class="enter">Enter</button>
        </form>

        <span class="text-center mt-4">
            Do you already have an account?
            <a href="<?= site_url("login"); ?>" class="text-emerald-400 hover:text-emerald-500 ml-2">Log In</a>
        </span>
    </div>

</body>
</html>

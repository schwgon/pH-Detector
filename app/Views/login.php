<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Mode Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body class="bg-gray-900 flex justify-center items-center min-h-screen">
    <div class="mt-14 bg-gray-800 p-8 rounded-xl shadow-sm max-w-md w-full mx-auto my-auto">
        <h1 class="text-white text-2xl font-bold mb-6 text-center">Log in</h1>
        <?php if (session()->getFlashdata('success_message')): ?>
                <div class="alert alert-success text-center mb-4 text-lime-400	color: rgb(163 230 53);">
                    <?= session()->getFlashdata('success_message') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error_message')): ?>
                <div class="alert alert-error text-center mb-4 text-red-600	color: rgb(220 38 38);">
                    <?= session()->getFlashdata('error_message') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('password_message')): ?>
                <div class="alert alert-password text-center mb-4 text-red-600	color: rgb(220 38 38);">
                    <?= session()->getFlashdata('password_message') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('user_message')): ?>
                <div class="alert alert-user text-center mb-4 text-red-600	color: rgb(220 38 38);">
                    <?= session()->getFlashdata('user_message') ?>
                </div>
            <?php endif; ?>
        <form method="post" action="<?= base_url("loginForm"); ?>">
            <div class="mb-4">
                <label for="email" class="block text-white mb-2"><i class="fas fa-envelope"></i> Email</label>
                <input type="text" class="form-input w-full bg-gray-700 text-white rounded-sm pl-2" id="email" name="email" placeholder="Email">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-white mb-2"><i class="fas fa-lock"></i> Password</label>
                <input type="password" class="form-input w-full bg-gray-700 text-white rounded-sm pl-2" id="password" name="password" minlength="8" placeholder="Password">
            </div>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded w-full mb-4">Log in <i class="fas fa-chevron-right"></i></button>
        </form>
        <div class="text-white text-center">
            <p>You do not have an account?<a href="<?= site_url("register"); ?>" class="text-indigo-400 hover:text-indigo-500 ml-2">Sign Up</a></p>
        </div>
    </div>

</body>

</html>
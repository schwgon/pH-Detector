<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Mode Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body class="bg-white flex justify-center items-center min-h-screen">
    <div class=" mt-8 bg-gray-100 p-8 shadow-sm max-w-md w-full mx-auto my-auto">
        <h1 class="text-black text-2xl font-sans mb-6 text-center">Log in</h1>
            <?php if (session()->getFlashdata('error_message')): ?>
                <div class="alert alert-error text-center mb-4 text-gray-300">
                    <?= session()->getFlashdata('error_message') ?>
                </div>
            <?php endif; ?>
        <form method="post" action="<?= base_url("loginForm"); ?>">
            <div class="mb-4">
                <label for="email" class="block text-black mb-2 font-sans"><i class="fas fa-envelope"></i> Email</label>
                <input type="text" class="form-input w-full bg-gray-200 text-black pl-2" id="email" name="email" placeholder="Email">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-black mb-2 font-sans"><i class="fas fa-lock"></i> Password</label>
                <input type="password" class="form-input w-full bg-gray-200 text-black pl-2" id="password" name="password" minlength="8" placeholder="Password">
            </div>
            <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-black font-sans py-2 px-4 w-full mb-4">Log in <i class="fas fa-chevron-right"></i></button>
        </form>
        <div class="text-black text-center">
            <p>You do not have an account?<a href="<?= site_url("register"); ?>" class="text-black hover:text-gray-700 ml-2">Sign Up</a></p>
        </div>
    </div>

</body>

</html>
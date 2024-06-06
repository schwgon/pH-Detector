<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body class="bg-gray-900 flex justify-center items-center min-h-screen">

    <div class="mt-24 bg-gray-800 p-8 rounded-xl shadow-md max-w-md w-full mx-auto">
        <h1 class="text-white text-2xl font-bold mb-6 text-center">Register</h1>
        <form method="post" action="<?= base_url("register1"); ?>">
            <div class="mb-4">
                <label for="name" class="block text-white mb-2">Name</label>
                <input name="name" required type="text" class="form-input w-full bg-gray-700 text-white rounded-sm" id="name" placeholder="Your Name">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-white mb-2">Email</label>
                <input name="email" required type="email" class="form-input w-full bg-gray-700 text-white rounded-sm" id="email" placeholder="examplemail@email.com">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-white mb-2">Password</label>
                <input name="password" required type="password" class="form-input w-full bg-gray-700 text-white rounded-sm" id="password" placeholder="1234">
            </div>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded w-full mb-4">Register</button>
            <p class="text-white text-center">Do you already have an account? <a href="<?= site_url("login"); ?>" class="text-indigo-400 hover:text-indigo-500 ml-2">Log-In</a></p>
        </form>
    </div>

</body>

</html>
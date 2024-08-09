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
        <?php if (session()->getFlashdata('error_message')): ?>
            <div class="alert alert-error text-center mb-4 text-red-600	color: rgb(220 38 38);">
                <?= session()->getFlashdata('error_message') ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?= base_url("recuperarPass"); ?>">
            <div class="mb-4">
                <label for="codigo" class="block text-white mb-2"><i class="fas fa-envelope"></i>Ingrese el Codigo</label>
                <input type="text" class="form-input w-full bg-gray-700 text-white rounded-sm pl-2" id="codigo" name="codigo" placeholder="codigo">
            </div>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded w-full mb-4">Recuperar Contraseña <i class="fas fa-chevron-right"></i></button>
        </form>
    </div>

</body>

</html>
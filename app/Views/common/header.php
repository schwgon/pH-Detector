<?php
$session = \Config\Services::session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pH-Detector</title>
    <link rel="shortcut icon" href="<?php echo base_url('images/agua.png'); ?>" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body class="bg-white"> <!-- Color de fondo blanco -->
    <header class="flex justify-between items-center p-5">
        <div class="flex-shrink-0">
            <a href="<?= site_url(""); ?>">
                <img class="h-12 w-auto" src="<?php echo base_url('images/agua.png'); ?>" alt="Logo"> <!-- Ajuste del tamaño del logo -->
            </a>
        </div>
        <nav class="flex space-x-4">
            <a href="<?= site_url(""); ?>" class="text-black hover:bg-gray-800 hover:text-white px-3 py-2 rounded-sm text-sm font-medium">Home</a>
            <a href="<?= site_url(""); ?>" class="text-black hover:bg-gray-800 hover:text-white px-3 py-2 rounded-sm text-sm font-medium">About Us</a>
            <?php if ($session->has('user_name')) : ?>
                <a href="<?= base_url('logout'); ?>" class="text-black hover:bg-gray-800 hover:text-white px-3 py-2 rounded-sm text-sm font-medium" onclick="return confirm('¿Estás seguro de que deseas cerrar la sesión?');">Log Out</a>
                <a href="<?= site_url("perfil"); ?>" class="text-black hover:bg-gray-800 hover:text-white px-3 py-2 rounded-sm text-sm font-medium">Perfil</a>
                
                <div class="relative inline-block text-left">
                    <button type="button" class="text-black hover:bg-gray-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="menu-button" aria-expanded="true" aria-haspopup="true">
                        Device
                    </button>
                </div>

                <?php if ($session->get('is_admin') == true) : ?>
                    <a href="<?= site_url("panel_admin"); ?>" class="text-black hover:bg-gray-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Admin</a>
                <?php endif; ?>
                <p class="text-black ml-4">Welcome, <?= $session->get('user_name'); ?></p> <!-- Texto de bienvenida -->
            <?php else : ?>
                <a href="<?= site_url("register"); ?>" class="text-black hover:bg-gray-800 hover:text-white px-3 py-2 rounded-sm text-sm font-medium">Sign Up</a>
                <a href="<?= site_url("login"); ?>" class="text-black hover:bg-gray-800 hover:text-white px-3 py-2 rounded-sm text-sm font-medium">Log In</a>
            <?php endif; ?>
        </nav>
    </header>

    <script>
        document.addEventListener('click', function(event) {
            var menuButton = document.getElementById('menu-button');
            var dropdownMenu = document.getElementById('dropdown-menu');

            if (menuButton.contains(event.target)) {
                dropdownMenu.classList.toggle('hidden');
            } else {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
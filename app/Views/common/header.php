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

<body class="bg-gray-800">
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="<?= site_url(""); ?>">
                            <img class="h-8 w-8" src="<?php echo base_url('images/agua.png'); ?>" alt="Logo">
                        </a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <?php if ($session->has('user_name')) : ?>
                                <a href="<?= base_url('logout'); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" onclick="return confirm('¿Estás seguro de que deseas cerrar la sesión?');">Log Out</a>
                                <a href="<?= site_url("perfil"); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Perfil</a>
                                <a href="<?= site_url(""); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                                <a href="<?= site_url(""); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About Us</a>
                                
                                <div class="relative inline-block text-left">
                                    <button type="button" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Device
                                    </button>
                                    <div id="dropdown-menu" class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                        <div class="py-1" role="none">
                                            <a href="<?= site_url('device'); ?>" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-1">Add Device</a>
                                            <?php $dispositivos = $session->get('dispositivos') ?? [];
                                                foreach ($dispositivos as $dispo): ?>
                                                <a href="<?= site_url('mostrar_datos/' . $dispo['id_dispositivo']); ?>" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-<?//= htmlspecialchars($dispo['id_dispositivo']); ?>">
                                                    <?= htmlspecialchars($dispo['nombre']); ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <?php if ($session->get('is_admin') == true) : ?>
                                    <a href="<?= site_url("panel_admin"); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Admin</a>
                                <?php endif; ?>
                            <?php else : ?>
                                <a href="<?= site_url(""); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                                <a href="<?= site_url(""); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About Us</a>
                                <a href="<?= site_url("register"); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Sign Up</a>
                                <a href="<?= site_url("login"); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log In</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <?php if ($session->has('user_name')) : ?>
                            <p class="text-white ml-4">Welcome, <?= $session->get('user_name'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
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
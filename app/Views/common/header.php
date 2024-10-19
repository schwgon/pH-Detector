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
<body class="bg-white" id="body"> <!-- Color de fondo blanco por defecto -->
    <header class="flex justify-between items-center p-5">
        <div class="flex-shrink-0">
            <a href="<?= site_url(""); ?>">
                <img id="logo" class="h-12 w-auto" src="<?php echo base_url('images/agua.png'); ?>" alt="Logo">
            </a>
        </div>
        <nav class="flex space-x-4">
            <?php if ($session->has('user_name')): ?>
                <a href="<?= base_url('logout'); ?>"
                    class="header-button hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium" 
                    onclick="return confirm('¿Estás seguro de que deseas cerrar la sesión?');">Log Out</a>
                <a href="<?= site_url("perfil"); ?>"
                    class="header-button hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium">Perfil</a>
                <a href="<?= site_url("about_us"); ?>"
                    class="header-button hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium">About Us</a>
                <div class="relative inline-block text-left">
                    <button type="button" class=" hover:text-emerald-400 px-3 py-2 rounded-md text-sm font-medium"
                        id="menu-button" aria-expanded="true" aria-haspopup="true">Device</button>
                    <div id="dropdown-menu"
                        class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-sm bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <a href="<?= site_url('device'); ?>" class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem" tabindex="-1" id="menu-item-1">Add Device</a>
                            <?php $dispositivos = $session->get('dispositivos') ?? [];
                            foreach ($dispositivos as $dispo): ?>
                                <a href="<?= site_url('mostrar_datos/' . $dispo['id_dispositivo']); ?>"
                                    class="block px-4 py-2 text-smext-gray-700" role="menuitem" tabindex="-1">
                                    <?= htmlspecialchars($dispo['nombre']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php if ($session->get('is_admin') == true): ?>
                    <a href="<?= site_url("panel_admin"); ?>"
                        class="header-button hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium">Admin</a>
                <?php endif; ?>
                <p class=" ml-4">Welcome, <?= $session->get('user_name'); ?></p> <!-- Texto de bienvenida -->
            <?php else: ?>
                <nav class="flex space-x-4">
                    <a href="<?= site_url("about_us"); ?>" class="header-button text-white hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium">About Us</a>
                    <a href="<?= site_url("register"); ?>" class="header-button text-white hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium">Sign Up</a>
                    <a href="<?= site_url("login"); ?>" class="header-button text-white hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium">Log In</a>
                </nav>
            <?php endif; ?>
            <button id="theme-toggle"
                class="text-black hover:text-emerald-400 px-3 py-2 rounded-md text-sm font-medium">
                <img id="theme-icon" class="h-6 w-6" src="<?php echo base_url('images/moon.png'); ?>" alt="Tema"> <!-- Icono por defecto -->
            </button>
        </nav>
    </header>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleButton = document.getElementById('theme-toggle');
            const themeIcon = document.getElementById('theme-icon');
            const logo = document.getElementById('logo');
            const body = document.getElementById('body');

            // Verificar si el modo oscuro ya está guardado en el almacenamiento local
            const isDarkMode = localStorage.getItem('theme') === 'dark';
            body.classList.toggle('dark-mode', isDarkMode);
            themeIcon.src = isDarkMode ? '<?php echo base_url('images/sun.png'); ?>' : '<?php echo base_url('images/moon.png'); ?>';
            logo.src = isDarkMode ? '<?php echo base_url('images/agua.png'); ?>' : '<?php echo base_url('images/agua_light.png'); ?>';

            // Alternar entre modo claro y oscuro
            toggleButton.addEventListener('click', () => {
                const darkModeEnabled = body.classList.toggle('dark-mode');
                localStorage.setItem('theme', darkModeEnabled ? 'dark' : 'light');
                themeIcon.src = darkModeEnabled ? '<?php echo base_url('images/sun.png'); ?>' : '<?php echo base_url('images/moon.png'); ?>';
                logo.src = darkModeEnabled ? '<?php echo base_url('images/agua.png'); ?>' : '<?php echo base_url('images/agua_light.png'); ?>';
            });
        });

        // Lógica para el menú desplegable
        document.addEventListener('click', function (event) {
            const menuButton = document.getElementById('menu-button');
            const dropdownMenu = document.getElementById('dropdown-menu');

            if (menuButton.contains(event.target)) {
                dropdownMenu.classList.toggle('hidden');
            } else {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>

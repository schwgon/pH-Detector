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
<body class="bg-white dark-mode"> <!-- Color de fondo blanco -->
    <header class="flex justify-between items-center p-5">
    <div class="flex-shrink-0">
    <a href="<?= site_url(""); ?>">
        <!-- Logo claro (para el fondo oscuro) -->
        <img id="logo" class="h-12 w-auto" src="<?php echo base_url('images/agua.png'); ?>" alt="Logo">
    </a>
</div>
        <nav class="flex space-x-4">
            <?php if ($session->has('user_name')): ?>
                <a href="<?= base_url('logout'); ?>"
                    class="text-black hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium" 6
                    onclick="return confirm('¿Estás seguro de que deseas cerrar la sesión?');">Log Out</a>
                <a href="<?= site_url("perfil"); ?>"
                    class="text-black hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium">Perfil</a>
                <a href="<?= site_url(""); ?>"
                    class="text-black hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium">Home</a>
                <a href="<?= site_url("about_us"); ?>"
                    class="text-black hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium">About Us</a>
                <div class="relative inline-block text-left">
                    <button type="button" class="text-black hover:text-emerald-400 px-3 py-2 rounded-md text-sm font-medium"
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
                                    class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                    id="menu-item-<?//= htmlspecialchars($dispo['id_dispositivo']); ?>">
                                    <?= htmlspecialchars($dispo['nombre']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php if ($session->get('is_admin') == true): ?>
                    <a href="<?= site_url("panel_admin"); ?>"
                        class="text-black hover:text-emerald-400 px-3 py-2 rounded-md text-sm font-medium">Admin</a>
                <?php endif; ?>
                <p class="text-black ml-4">Welcome, <?= $session->get('user_name'); ?></p> <!-- Texto de bienvenida -->
            <?php else: ?>
                <a href="<?= site_url(""); ?>"
                    class="text-black hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium">Home</a>
                <a href="<?= site_url("about_us"); ?>"
                    class="text-black hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium">About Us</a>
                <a href="<?= site_url("register"); ?>"
                    class="text-black hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium">Sign Up</a>
                <a href="<?= site_url("login"); ?>"
                    class="text-black hover:text-emerald-400 px-3 py-2 rounded-sm text-sm font-medium">Log In</a>
            <?php endif; ?>
            <!-- Botón de modo oscuro/claro -->
            <button id="theme-toggle"
                class="text-black hover:text-emerald-400 px-3 py-2 rounded-md text-sm font-medium">
                <img id="theme-icon" class="h-6 w-6" src="<?php echo base_url('images/sun.png'); ?>" alt="Tema">
            </button>
        </nav>
    </header>
    <script>
        document.addEventListener('click', function (event) {
            var menuButton = document.getElementById('menu-button');
            var dropdownMenu = document.getElementById('dropdown-menu');

            if (menuButton.contains(event.target)) {
                dropdownMenu.classList.toggle('hidden');
            } else {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleButton = document.getElementById('theme-toggle');
            const themeIcon = document.getElementById('theme-icon');

            // Verificar si el modo oscuro ya está guardado en el almacenamiento local
            if (localStorage.getItem('theme') === 'dark') {
                document.body.classList.add('dark-mode');
                themeIcon.src = '<?php echo base_url('images/moon.png'); ?>';
            } else {
                themeIcon.src = '<?php echo base_url('images/moon.png'); ?>';
            }

            toggleButton.addEventListener('click', () => {
                document.body.classList.toggle('dark-mode');

                if (document.body.classList.contains('dark-mode')) {
                    themeIcon.src = '<?php echo base_url('images/moon.png'); ?>';
                    localStorage.setItem('theme', 'dark'); // Guardar la preferencia en modo oscuro
                } else {
                    themeIcon.src = '<?php echo base_url('images/sun.png'); ?>';
                    localStorage.setItem('theme', 'light'); // Guardar la preferencia en modo claro
                }
            });
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const logo = document.getElementById('logo');

        // Verificar el modo actual al cargar la página
        if (localStorage.getItem('theme') === 'dark') {
            logo.src = '<?php echo base_url(relativePath: 'images/agua.png'); ?>'; // Logo claro para modo oscuro
        } else {
            logo.src = '<?php echo base_url(relativePath: 'images/agua_light.png'); ?>'; // Logo oscuro para modo claro
        }

        // Cambiar la imagen del logo cuando el usuario alterna el tema
        document.getElementById('theme-toggle').addEventListener('click', () => {
            if (document.body.classList.contains('dark-mode')) {
                logo.src = '<?php echo base_url('images/agua_light.png'); ?>'; // Logo claro para modo oscuro
            } else {
                logo.src = '<?php echo base_url('images/agua.png'); ?>'; // Logo oscuro para modo claro
            }
        });
    });
</script>
</body>

</html>
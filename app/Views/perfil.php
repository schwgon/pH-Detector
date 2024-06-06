<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="shortcut icon" href="<?php echo base_url('images/agua.png'); ?>" type="image/png">
    <link rel="website icon" type="png" href="<?php echo base_url('images/agua.png'); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body>
    <div class="min-h-screen flex justify-center items-center">
        <div class="bg-white shadow-md rounded-lg p-6 max-w-md w-full">
            <div class="flex items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold">
                        <p class="text-2xl font-bold"><?= $session->get('user_name'); ?></p>
                    </h2>
                </div>
            </div>
            <hr>
            <div>
                <h3 class="text-lg font-semibold mb-2">Información de contacto</h3>
                <ul class="text-gray-700">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <?= $session->get('user_email'); ?>
                    </li>
                </ul>
            </div>
            <div class="mt-6 flex justify-end">
                <a href="<?= site_url("editarPerfil"); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Editar Perfil</a>
            </div>
        </div>
    </div>
</body>

</html>
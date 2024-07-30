<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="shortcut icon" href="<?php echo base_url('images/agua.png'); ?>" type="image/png">
    <link rel="website icon" type="png" href="<?php echo base_url('images/agua.png'); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body>
    <div class="min-h-screen flex justify-center items-center">
        <div class="bg-white shadow-md rounded-lg p-6 max-w-md w-full">
            <h2 class="text-2xl font-bold mb-6">Editar Perfil</h2>
            <?php if (isset($success)) : ?>
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    <?= $success ?>
                </div>
            <?php endif; ?>
            <?php if (isset($error)) : ?>
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <form action="<?= site_url('editarPerfil'); ?>" method="post">
                <div class="mb-4">
                    <label for="user_name" class="block text-gray-700">Nombre</label>
                    <input type="text" id="user_name" name="user_name" value="<?= esc($user->name); ?>" class="mt-1 p-2 w-full border rounded">
                </div>
                <div class="mb-4">
                    <label for="user_email" class="block text-gray-700">Correo Electrónico</label>
                    <input type="email" id="user_email" name="user_email" value="<?= esc($user->email); ?>" class="mt-1 p-2 w-full border rounded">
                </div>
                <!-- Agrega más campos según sea necesario -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
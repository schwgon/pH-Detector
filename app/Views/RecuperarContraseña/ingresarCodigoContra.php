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
        <form id="formulario" method="post" action="<?= base_url("verificarCodigo"); ?>">
            <div class="mb-4">
                <label for="codigo" class="block text-white mb-2"><i class="fas fa-envelope"></i>Ingrese el Codigo</label>
                <input type="text" class="form-input w-full bg-gray-700 text-white rounded-sm pl-2" id="codigo" name="codigo" placeholder="xxxxxxxx">
            </div>
            <div class="mb-4">
                <label for="contraseña" class="block text-white mb-2"><i class="fas fa-envelope"></i>Ingresar Contraseña</label>
                <input type="pass" class="form-input w-full bg-gray-700 text-white rounded-sm pl-2" id="contraseña" name="contraseña">
            </div>
            <div class="mb-4">
                <label for="contraseña1" class="block text-white mb-2"><i class="fas fa-envelope"></i>Confirmar Contraseña</label>
                <input type="pass" class="form-input w-full bg-gray-700 text-white rounded-sm pl-2" id="contraseña1" name="contraseña1">
            </div>
            <input type="hidden" name="email" value="<?= esc($email) ?>">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded w-full mb-4">Actualizar<i class="fas fa-chevron-right"></i></button>
        </form>

        <!-- Script para validar las contraseñas -->
        <script>
            document.getElementById('formulario').addEventListener('submit', function(event) {
                // Obtiene los valores de los campos de contraseña
                const password = document.getElementById('contraseña').value;
                const confirmPassword = document.getElementById('contraseña1').value;

                // Verifica si las contraseñas coinciden
                if (password !== confirmPassword) {
                    // Muestra un mensaje de error
                    alert('Las contraseñas no coinciden. Por favor, verifica.');
                    // Previene el envío del formulario
                    event.preventDefault();
                }
            });
        </script>
    </div>

</body>

</html>
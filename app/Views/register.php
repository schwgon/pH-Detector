<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>
<body class="bg-gray-100 dark:bg-gray-800 flex justify-center items-center min-h-screen">
    <!-- Tarjeta del formulario -->
    <div class=" bg-gray-100 dark:bg-gray-800 max-w-md w-auto mx-auto bg-opacity-0 border-2 border-emerald-400 shadow-2xl overflow-hidden p-8 space-y-8 -mt-4">
        <h2 class="text-center text-4xl font-extrasans">Regístrate</h2>

        <?php if (session()->getFlashdata('error_message')): ?>
            <div class="alert alert-error text-center mb-4 text-red-600">
                <?= session()->getFlashdata('error_message') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url("register1"); ?>" class="space-y-6">
            <div class="relative">
                <input
                    placeholder="Ingresa tu nombre"
                    class="peer h-10 w-full border-b-2 border-transparent bg-transparent placeholder-transparent focus:outline-none focus:border-emerald-400"
                    required=""
                    id="name"
                    name="name"
                    type="text"
                    pattern="[A-Za-zÀ-ÿ\u00f1\u00d1\s]+"
                />
                <label
                    class="absolute left-0 -top-3.5 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown peer-placeholder-shown:top-2 peer-focus:-top-3.5  peer-focus:text-sm"
                    for="name"
                >Usuario</label>
            </div>
            <div class="relative">
                <input
                    placeholder="john@example.com"
                    class="peer h-10 w-full border-b-2 border-transparent bg-transparent placeholder-transparent focus:outline-none focus:border-emerald-400"
                    required=""
                    id="email"
                    name="email"
                    type="email"
                />
                <label
                    class="absolute left-0 -top-3.5 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown peer-placeholder-shown:top-2 peer-focus:-top-3.5  peer-focus:text-sm"
                    for="email"
                >Correo electrónico</label>
            </div>
            <div class="relative">
                <input
                    placeholder="Crea una contraseña"
                    class="peer h-10 w-full border-b-2 border-transparent bg-transparent placeholder-transparent focus:outline-none focus:border-emerald-400"
                    required=""
                    id="password"
                    name="password"
                    type="password"
                    required minlength="8"
                />
                <label
                    class="absolute left-0 -top-3.5 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-sm"
                    for="password"
                >Contraseña</label>
            </div>

            <div class="text-right">
                <a class="text-sm text-emerald-400 hover:text-emerald-500" href="#">¿Olvidaste tu contraseña?</a>
            </div>

            <button
                class="w-full py-2 px-4 bg-emerald-600 hover:bg-emerald-500 rounded-md shadow-lg text-white font-semibold transition duration-200"
                type="submit"
            >
                Registrar
            </button>
        </form>

        <p class="text-center ">
            ¿Ya tienes una cuenta?
            <a class="text-emerald-400 hover:text-emerald-500" href="<?= site_url("login"); ?>">Iniciar sesión</a>
        </p>
    </div>

</body>
</html>

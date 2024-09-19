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

<body class="bg-gray-100 dark:bg-gray-800 flex justify-center items-center min-h-screen">
    <div class="min-h-screen flex justify-center items-center -mt-24">
        <div class="bg-transparent shadow-md rounded-lg p-6 max-w-md w-full border-2 border-emerald-400">
            <div class="flex items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold dark:text-white">
                        <p class="text-2xl font-bold dark:text-white"><?= esc($user->name); ?></p>
                    </h2>
                </div>
            </div>
            <hr class=" border-emerald-400">
            <div>
                <h3 class="text-lg font-semibold mb-2">Información de contacto</h3>
                <ul>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <?= esc($user->email);?>

                        <label for="user" class="block mb-2"><i class="fas fa-user"> </i> <?= esc($user->id_permiso); ?> </label>
                    </li>
                </ul>
            </div>
            <div class="mt-6 flex justify-end">
            </div>
        </div>
    </div>
</body>

</html>
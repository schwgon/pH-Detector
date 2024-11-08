<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas Frecuentes</title>
    <link rel="shortcut icon" href="<?php echo base_url('images/agua.png'); ?>" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body class="bg-gray-100 dark:bg-gray-800 flex justify-center items-center min-h-screen">
    <div class="max-w-2xl w-full mx-auto p-8 shadow-md bg-transparent border border-emerald-400 rounded-lg backdrop-blur-lg">
        <h1 class="text-3xl font-extrabold mb-6 text-center text-emerald-600 dark:text-emerald-400">Preguntas Frecuentes</h1>

        <div id="faq" class="space-y-6">
            <!-- Pregunta 1 -->
            <div class="border-b border-emerald-400 pb-4 mb-4">
                <button onclick="toggleAnswer('answer1')" class="flex items-center justify-between w-full text-lg font-semibold focus:outline-none">
                    <span>¿Cómo puedo registrar un nuevo dispositivo?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="icon1">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
                <p id="answer1" class="hidden mt-2 font-semibold">Para registrar un nuevo dispositivo, ve a la sección de dispositivos y selecciona "Agregar dispositivo". Completa los datos solicitados y guarda los cambios.</p>
            </div>
            
            <!-- Pregunta 2 -->
            <div class="border-b border-emerald-400 pb-4 mb-4">
                <button onclick="toggleAnswer('answer2')" class="flex items-center justify-between w-full text-lg font-semibold  focus:outline-none">
                    <span>¿Cómo restablezco mi contraseña?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="icon2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
                <p id="answer2" class="hidden mt-2 font-semibold">Para restablecer tu contraseña, dirígete a la página de inicio de sesión y selecciona "¿Olvidaste tu contraseña?". Sigue las instrucciones para recibir un enlace de restablecimiento en tu correo electrónico.</p>
            </div>

            <!-- Pregunta 3 -->
            <div class="pb-4">
                <button onclick="toggleAnswer('answer3')" class="flex items-center justify-between w-full text-lg font-semibold  focus:outline-none">
                    <span>¿Qué debo hacer si encuentro un problema en la plataforma?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="icon3">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
                <p id="answer3" class="hidden mt-2 font-semibold">Si encuentras algún problema, puedes comunicarte con nuestro soporte a través de la sección de contacto. Nos aseguraremos de responder lo más pronto posible.</p>
            </div>
        </div>
    </div>

    <script>
        function toggleAnswer(id) {
            const answer = document.getElementById(id);
            const icon = document.getElementById('icon' + id.replace('answer', ''));
            answer.classList.toggle('hidden');
            icon.classList.toggle('rotate-45');
        }
    </script>
</body>

</html>

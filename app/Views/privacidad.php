<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones & Política de Privacidad</title>
    <link rel="shortcut icon" href="<?php echo base_url('images/agua.png'); ?>" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body class="bg-transparent flex justify-center items-center min-h-screen">
    <div class="max-w-3xl w-full mx-auto p-8 shadow-md bg-transparent rounded-lg border border-emerald-400 backdrop-blur-lg">
        <h1 class="text-3xl font-bold mb-6 text-center text-emerald-600 dark:text-emerald-400">Aspectos Legales</h1>
        
        <!-- Pestañas de navegación -->
        <div class="flex justify-around border-b border-emerald-400 mb-6">
            <button id="tab-terms" class="py-2 px-4  hover:text-emerald-500 border-b-2 border-transparent hover:border-emerald-400 focus:outline-none" onclick="showSection('terms')">Términos y Condiciones</button>
            <button id="tab-privacy" class="py-2 px-4  hover:text-emerald-500 border-b-2 border-transparent hover:border-emerald-400 focus:outline-none" onclick="showSection('privacy')">Política de Privacidad</button>
        </div>

        <!-- Sección de Términos y Condiciones -->
        <section id="section-terms" class="hidden">
            <h2 class="text-xl font-semibold  mb-4">Términos y Condiciones</h2>
            <p class="  mb-4">Al acceder a nuestra plataforma, aceptas cumplir con estos términos y condiciones, así como con todas las leyes y regulaciones aplicables. Si no estás de acuerdo, debes abstenerte de usar este sitio.</p>
            <h3 class="font-semibold ">Uso de la Plataforma</h3>
            <p class="  mb-4">Nuestra plataforma está destinada únicamente para uso personal y no comercial. No se permite la copia, distribución, o modificación sin autorización previa.</p>
            <h3 class="font-semibold ">Propiedad Intelectual</h3>
            <p class=" ">Todo el contenido de este sitio, incluyendo textos, gráficos, logotipos y software, es propiedad de la empresa y está protegido por las leyes de propiedad intelectual.</p>
        </section>

        <!-- Sección de Política de Privacidad -->
        <section id="section-privacy" class="hidden">
            <h2 class="text-xl font-semibold  mb-4">Política de Privacidad</h2>
            <p class=" mb-4">Recopilamos información personal cuando te registras en nuestra plataforma. Esto puede incluir tu nombre, dirección de correo electrónico y otros datos necesarios para el funcionamiento del servicio.</p>
            <h3 class="font-semibold ">Uso de la Información</h3>
            <p class=" mb-4">La información que recopilamos se utiliza para mejorar la experiencia del usuario, personalizar el contenido y mejorar la funcionalidad de la plataforma.</p>
            <h3 class="font-semibold ">Seguridad</h3>
            <p class="">Nos comprometemos a proteger tu información personal. Como hashear su contraseña cuando la registra en nuestro sito web.</p>
        </section>

        <!-- Botón de Volver -->
        <div class="flex justify-center mt-8">
            <button onclick="window.history.back()" class="py-2 px-4 bg-emerald-600 hover:bg-emerald-500 text-white font-semibold rounded-md shadow-lg transition duration-200">
                Volver
            </button>
        </div>
    </div>

    <!-- Script para alternar entre secciones -->
    <script>
        function showSection(section) {
            // Ocultar ambas secciones
            document.getElementById('section-terms').classList.add('hidden');
            document.getElementById('section-privacy').classList.add('hidden');
            document.getElementById('tab-terms').classList.remove('border-emerald-400', 'text-emerald-500');
            document.getElementById('tab-privacy').classList.remove('border-emerald-400', 'text-emerald-500');

            // Mostrar la sección seleccionada
            document.getElementById(`section-${section}`).classList.remove('hidden');
            document.getElementById(`tab-${section}`).classList.add('border-emerald-400', 'text-emerald-500');
        }

        // Mostrar "Términos y Condiciones" por defecto
        showSection('terms');
    </script>
</body>
</html>

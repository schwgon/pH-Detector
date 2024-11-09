<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to pH-Detector</title>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Función para mostrar el contenido correspondiente cuando el usuario hace clic
        function showSection(section) {
            // Esconde todas las secciones
            const allSections = document.querySelectorAll('.about-section');
            allSections.forEach(function(el) {
                el.classList.add('hidden');
            });

            // Muestra la sección seleccionada
            const activeSection = document.getElementById(section);
            if (activeSection) {
                activeSection.classList.remove('hidden');
            }
        }

        // Asegurar que se muestre una sección por defecto al cargar
        window.onload = function() {
            showSection('mission'); // Muestra la misión por defecto
        };
    </script>
</head>

<body class="bg-transparent text-black dark:text-gray-200 flex flex-col min-h-screen">

<?php if (session()->getFlashdata('success_message')): ?>
        <div id="successMessage" class="alert alert-error text-center mb-4 text-emerald-400">
            <?= session()->getFlashdata('success_message') ?>
        </div>
    <?php endif; ?>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const messageElement = document.getElementById('successMessage');
            if (messageElement) {
                setTimeout(() => {
                    messageElement.style.opacity = 3000;
                    setTimeout(() => messageElement.remove(), 2000);
                }, 3000);
            }
        });
    </script>

    <!-- Contenido Principal -->
    <main class="pt-24 pb-16 flex-grow">
        <!-- Sección de Bienvenida y About Us en formato cuadrado -->
        <section class="container mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Cuadro de Bienvenida -->
            <div class="bg-transparent bg-opacity-80 p-8 rounded-lg shadow-xl border border-emerald-400 transition-all duration-300 max-w-xl mx-auto">
                <h2 class="text-4xl font-bold text-emerald-600 dark:text-emerald-400 text-center mb-6">¡Bienvenido a pH-Detector!</h2>
                <p class="text-lg leading-relaxed">
                Este sistema avanzado no solo permite una detección precisa del pH, sino que incorpora una interfaz web interactiva para el monitoreo de datos en tiempo real, brindando una experiencia de usuario fluida y efectiva.
                </p>
                <p class="text-lg leading-relaxed mt-4">
                Nuestro detector optimiza tanto la precisión como la eficiencia del proceso analítico, permitiendo ajustes automáticos mediante bombas integradas para mantener la calidad del agua en distintos entornos. Esta herramienta es ideal para aplicaciones en la industria, agricultura y cualquier entorno que requiera una gestión rigurosa del pH.
                </p>
                <p class="text-lg leading-relaxed mt-4">
                ¡Gracias por tu interés en nuestro proyecto! Te invitamos a explorar más sobre nuestras técnicas y hallazgos, y a descubrir cómo este sistema puede ser una solución sostenible y eficaz en el control de la calidad del agua.
                </p>
            </div>
            <!-- Cuadro de About Us -->
            <div class="bg-transparent bg-opacity-80 p-8 rounded-lg shadow-xl border border-emerald-400 transition-all duration-300 max-w-xl mx-auto">
                <h2 class="text-4xl font-bold text-emerald-600 dark:text-emerald-400 text-center mb-6">Sobre Nosotros </h2>
                <p class="text-lg leading-relaxed ">
                Somos un equipo dedicado a la tecnología y la innovación, enfocados en desarrollar soluciones que promuevan la sostenibilidad y la eficiencia en el manejo de recursos. Nuestra pasión nos ha llevado a diseñar este sistema de detección y control de pH, pensado para regular la calidad del agua mediante un sistema de bombas automáticas, ideal para aplicaciones en diversos entornos industriales y agrícolas.
                </p>
                <p class="text-lg leading-relaxed mt-4">
                Este proyecto refleja nuestro compromiso con el desarrollo de herramientas avanzadas para la gestión ambiental. Trabajamos con el objetivo de crear un impacto positivo, utilizando tecnología que promueva prácticas sostenibles y un mejor aprovechamiento de los recursos.
                </p>
            </div>
        </section>

        <!-- Pestañas de navegación para mostrar Misión y Visión -->
        <section class="container mx-auto px-4 py-12">
            <div class="flex justify-center mb-6">
                <button id="tab-mission" class="py-2 px-4  hover:text-emerald-500 border-b-2 border-transparent hover:border-emerald-400 focus:outline-none" onclick="showSection('mission')">Misión</button>
                <button id="tab-vision" class="py-2 px-4  hover:text-emerald-500 border-b-2 border-transparent hover:border-emerald-400 focus:outline-none" onclick="showSection('vision')">Visión</button>
            </div>

            <!-- Sección de Misión -->
            <section id="mission" class="about-section">
                <div class="bg-transparent bg-opacity-80 p-8 rounded-lg shadow-xl border border-emerald-400 transition-all duration-300 max-w-3xl mx-auto">
                    <h2 class="text-xl font-semibold  mb-4">Nuestra Misión</h2>
                    <p class="text-lg leading-relaxed">
                    Contribuir a la sostenibilidad ambiental mediante tecnología confiable y asequible para la gestión de la calidad del agua. Nos esforzamos por hacer que la detección de pH sea accesible para todos, facilitando la creación de condiciones óptimas en agricultura, industria y otros sectores esenciales.
                    </p>
                </div>
            </section>

            <!-- Sección de Visión -->
            <section id="vision" class="about-section hidden">
                <div class="bg-transparent bg-opacity-80 p-8 rounded-lg shadow-xl border border-emerald-400 transition-all duration-300 max-w-3xl mx-auto">
                    <h2 class="text-xl font-semibold  mb-4">Nuestra Visión</h2>
                    <p class="text-lg leading-relaxed">
                    Visualizamos un mundo donde el agua limpia y los ecosistemas saludables se preserven a través de tecnología innovadora y accesible. Aspiramos a liderar el desarrollo de herramientas avanzadas que empoderen a personas y organizaciones para proteger la calidad del agua en todo el mundo.
                    </p>
                </div>
            </section>
        </section>
    </main>
</body>
</html>

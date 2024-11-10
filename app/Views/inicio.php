<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pH-Detector - Home</title>
    <link rel="shortcut icon" href="<?php echo base_url('images/agua.png'); ?>" type="image/png">
    <link rel="website icon" type="png" href="<?php echo base_url('images/agua.png'); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>

<body class="bg-gray-100 dark:bg-gray-800 flex justify-center items-center min-h-screen">
    <?php if (session()->getFlashdata('success_message')): ?>
        <div id="successMessage" class="alert alert-error text-center mb-4 text-emerald-400">
            <?= session()->getFlashdata('success_message') ?>
        </div>
    <?php endif; ?>
    <script>
        // Verifica si el mensaje existe en la página
        window.addEventListener('DOMContentLoaded', (event) => {
            const messageElement = document.getElementById('successMessage');
            if (messageElement) {
                // Oculta el mensaje después de 3 segundos (3000 milisegundos)
                setTimeout(() => {
                    messageElement.style.opacity = 3000;
                    // Elimina el mensaje del DOM después de que se desvanece para liberar el espacio
                    setTimeout(() => messageElement.remove(), 2000); // Ajusta el tiempo para el desvanecimiento
                }, 3000);
            }
        });
    </script>
    <main class="flex-grow flex items-center justify-center py-8 mt-11">
        <section class="container mx-auto px-4">
        <div class="dark:text-black p-8 shadow-md mx-auto border-2 border-emerald-400 -mt-5">
                <h3 class="text-3xl font-sans mb-4" data-en="Welcome to pH-Detector" data-es="Bienvenido a pH-Detector">
                    Welcome to pH-Detector</h3>
                <p class="text-lg leading-relaxed font-sans"
                    data-en="Hello! We are Lucas Fernández and Gaspar Schwartz, and we are pleased to present our innovative research in the field of pH detection. In this thesis, we explore new techniques and technologies to measure pH accurately and efficiently, a fundamental aspect in numerous scientific and industrial applications.

                 In our project, we have developed an advanced method for pH detection that not only improves the accuracy of measurements but also optimizes the analysis process. Throughout our research, we have faced various challenges and have worked tirelessly to overcome technical obstacles, with the goal of offering a robust and accessible solution."
                    data-es="¡Hola! Somos Lucas Fernández y Gaspar Schwartz, y nos complace presentar nuestra innovadora investigación en el campo de la detección de pH. En esta tesis, exploramos nuevas técnicas y tecnologías para medir el pH de manera precisa y eficiente, un aspecto fundamental en numerosas aplicaciones científicas e industriales.
                    
                    En nuestro proyecto, hemos desarrollado un método avanzado para la detección de pH que no solo mejora la precisión de las mediciones, sino que también optimiza el proceso de análisis. A lo largo de nuestra investigación, hemos enfrentado varios desafíos y hemos trabajado incansablemente para superar obstáculos técnicos, con el objetivo de ofrecer una solución robusta y accesible.">
                    Hello! We are Lucas Fernández and Gaspar Schwartz, and we are pleased to present our innovative
                    research in the field of pH detection. In this thesis, we explore new techniques and technologies to
                    measure pH accurately and efficiently, a fundamental aspect in numerous scientific and industrial
                    applications. <br><br>In our project, we have developed an advanced method for pH detection that not
                    only improves the accuracy of measurements but also optimizes the analysis process. Throughout our
                    research, we have faced various challenges and have worked tirelessly to overcome technical
                    obstacles, with the goal of offering a robust and accessible solution.</p>
            </div>
        </section>
    </main>
</body>
</html>

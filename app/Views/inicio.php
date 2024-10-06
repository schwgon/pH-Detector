<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pH-Detector</title>
    <link rel="shortcut icon" href="<?php echo base_url('images/agua.png'); ?>" type="image/png">
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
        window.addEventListener('DOMContentLoaded', (event) => {
            const messageElement = document.getElementById('successMessage');
            if (messageElement) {
                setTimeout(() => {
                    messageElement.style.opacity = 3000;
                    setTimeout(() => messageElement.remove(), 2000);
                }, 3000);
            }
        });
    </script>

    <main class="flex-grow flex items-center justify-center py-8 mt-11">
        <section class="container mx-auto px-4">
        <div class="bg-white bg-opacity-85 dark:bg-opacity-80 text-black p-8 rounded-lg shadow-lg border border-emerald-400 transition-all duration-300 w-full mx-auto">
    <h3 class="text-3xl font-sans mb-4 text-emerald-600 dark:text-emerald-600">Welcome to pH-Detector</h3>
    <p class="text-lg leading-relaxed font-sans text-black">
    Welcome to pH-Detector! We are Lucas Fernández and Gaspar Schwartz, and we are thrilled to present our innovative research in the field of pH detection. 
    This project aims to explore new techniques and technologies for accurate and efficient pH measurement, which is essential in various scientific and industrial applications.

    Our advanced pH detection method not only improves measurement accuracy but also optimizes the analytical process, making it faster and more reliable. 
    Throughout our research, we have encountered and overcome numerous challenges, demonstrating our commitment to developing robust and accessible solutions. 

    Thank you for your interest in our project! We invite you to explore more about our methods and findings.
</p>
</div>
        </section>
    </main>
</body>

</html>

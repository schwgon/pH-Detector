<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= lang('Errors.pageNotFound') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 font-sans leading-normal tracking-normal">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg text-center">
            <h1 class="text-6xl font-light text-gray-400 mb-4">404</h1>
            <p class="text-gray-400 mb-6">
                <?php if (ENVIRONMENT !== 'production') : ?>
                    <?= nl2br(esc($message)) ?>
                <?php else : ?>
                    <?= lang('Errors.sorryCannotFind') ?>
                <?php endif; ?>
            </p>
            <a href="<?= site_url('') ?>" class="text-indigo-300 hover:text-indigo-500">Go Back Home</a>
        </div>
    </div>
</body>
</html>
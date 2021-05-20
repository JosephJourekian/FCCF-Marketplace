<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <section class="px-8 py-4 mb-6">
            <header class="container mx-auto">   
                <h1>
                    <img src="<?php echo e(URL::to('./images/logo.png')); ?>"
                    alt="FCCF">
                </h1>
            </header>
        </section>

        <?php echo e($slot); ?>

    </div>

    <script src="http://unpkg.com/turbolinks"></script>
</body>
</html>
<?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/components/master.blade.php ENDPATH**/ ?>
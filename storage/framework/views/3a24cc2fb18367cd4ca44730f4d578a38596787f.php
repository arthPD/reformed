<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/app.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/bulma.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/font-awesome.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap-datepicker3.standalone.css')); ?>">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <?php echo $__env->yieldContent('head'); ?>
    </head>
    <body class="container">
        <nav class="navbar">
            <div class="navbar-brand">
                <?php if(Auth::check()): ?>
                    <ul style="display: inline-flex;">
                        <!-- <a class="navbar-item" href="/"><img src="images/logo.png" width="112" height="28"></a> -->
                        <li <?php echo e(Request::is('dashboard') ? "class=active" : null); ?>><a class="navbar-item" href="/dashboard">Home</a></li>
                        <li <?php echo e(Request::is('users') ? "class=active" : null); ?>><a class="navbar-item" href="/users">Members</a></li>
                        <li <?php echo e(Request::is('finance') ? "class=active" : null); ?>><a class="navbar-item" href="/finance">F</a></li>
                        <li <?php echo e(Request::is('reports') ? "class=active" : null); ?>><a class="navbar-item" href="/reports">Reports</a></li>
                        
                    </ul>
                <?php endif; ?>
            </div>
        </nav>
        <?php echo $__env->yieldContent('body'); ?>
    </body>
    <footer><?php echo $__env->yieldContent('footer'); ?></footer>
</html>
    <script src="<?php echo e(URL::asset('js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/vue.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/moment.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        <?php if(session('message')): ?>
            toastr.options = {
                "closeButton": true,
            }
            toastr.<?php echo e(session('message')[0]); ?>("<?php echo e(session('message')[1]); ?>");
            <?php echo e(session()->forget('message')); ?>

        <?php endif; ?>

        $( document ).ready(function() {    
            $('#birthday').datepicker({
                daysOfWeekHighlighted: "0"
            });
        });
    </script>
    <?php echo $__env->make('layouts.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?>



    
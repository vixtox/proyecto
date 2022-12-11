<?php

 /**
         * varios
         *
         */

    use Jenssegers\Blade\Blade;

    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    require __DIR__ . '/../ctes.php';
    include (__DIR__.'/../../vendor/autoload.php');

    $blade = new Blade(VIEW_PATH, CACHE_PATH);
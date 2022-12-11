<?php

 /**
         * index
         *
         */

    require __DIR__ . '/models/GestionDatabase.php';

    require __DIR__ . '/controllers/varios.php';

    echo $blade->render('login');
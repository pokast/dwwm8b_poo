<?php

use App\Routing\Router;
use Symfony\Component\HttpFoundation\Request;

    return [

        // La requête
        Request::class => Request::createFromGlobals(),

        // Liste des contrôleurs
        'controllers'  => [
            // 
        ],


        // Le routeur
        DI\create(Router::class)->constructor(DI\get(Request::class), DI\get('controllers')),

    ];
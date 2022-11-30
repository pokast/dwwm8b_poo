<?php
namespace App\HttpKernel;

use Symfony\Component\HttpFoundation\Response;


    interface HttpKernelInterface
    {
        /**
         * Cette méthode du HttpKernel lui pêrmet de soumettre la requête
         * et de récupérer...
         *
         * @return Response
         */
        public function handleRequest() : Response;
    }
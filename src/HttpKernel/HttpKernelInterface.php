<?php
namespace App\HttpKernel;

use Symfony\Component\HttpFoundation\Response;


    interface HttpKernelInterface
    {
        
        /**
         * Cette méthode du HttpKernel lui permet de soumettre la requête
         * et de récupérer la réponse correspondante.
         *
         * @return Response
         */
        public function handleRequest() : Response;

    }
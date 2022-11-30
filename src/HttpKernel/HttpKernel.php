<?php
namespace App\HttpKernel;

use Psr\Container\ContainerInterface;
use App\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Response;


    class HttpKernel implements HttpKernelInterface
    {

        /**
         * Cette propriété représente le conteneur de dépendances
         *
         * @var ContainerInterface
         */
        private ContainerInterface $container;


        public function __construct(ContainerInterface $container)
        {
            $this->container = $container;
        }



        /**
         * Cette méthode du HttpKernel lui permet de soumettre la requête
         * et de récupérer la réponse correspondante.
         *
         * @return Response
         */
        public function handleRequest() : Response
        {
            dd('test');
        }
    }
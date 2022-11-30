<?php
namespace App\HttpKernel;

use Psr\Container\ContainerInterface;
use App\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Response;



    class HttpKernel implements HttpKernelInterface
    {

        /**
         * Undocumented variable
         *
         * @var ContainerInterface
         */
        private ContainerInterface $container;

        
        public function __construct(ContainerInterface $container)
        {
            $this->container = $container;
        }

        /**
         * Cette méthode du HttpKernel lui pêrmet de soumettre la requête
         * et de récupérer...
         *
         * @return Response
         */
        public function handleRequest() : Response
        {
            dd('test');
        }
    }
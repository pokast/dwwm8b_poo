<?php
declare(strict_types=1);

namespace App\Zinc\HttpKernel;

use App\Zinc\Routing\RouterInterface;
use Psr\Container\ContainerInterface;
use App\Zinc\HttpKernel\HttpKernelInterface;
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
           $router = $this->container->get(RouterInterface::class);
           $router_response = $router->run();
           
           $this->getControllerResponse($router_response);
        }


        /**
         * Cette propriété du HttpKernel lui permet :
         *      - d'appeler le contrôleur en charge de la requête
         *      - de lui demander de générer la réponse correspondante
         *      - et de la lui retourner
         *
         * @param array|null $router_response
         * @return response
         */
        private function getControllerResponse(array|null $router_response) : response
        {
            if ( $router_response === null )
            {
                // Pause
            }
        }

    }
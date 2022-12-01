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


        /**
         * Cette propriété représente le noyau dans lui-même
         *
         * @var HttpKernel
         */
        private static HttpKernel $kernel;


        public function __construct(ContainerInterface $container)
        {
            self::$kernel = $this;
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
            
            $response = $this->getControllerResponse($router_response);

            return $response;
        }


        /**
         * Cette propriété du HttpKernel lui permet : 
         *      - d'appeler le contrôleur en charge de la requête
         *      - de lui demander de générer la réponse correspondante
         *      - et de la lui retourner
         *
         * @param array|null $router_response
         * @return Response
         */
        private function getControllerResponse(array|null $router_response) : Response
        {
            // Si la page recherchée n'est pas trouvée
            if ( $router_response === null ) 
            {
                $controller = $this->container->get('controllers')['ErrorController'];

                $response = $this->container->call([$controller, 'notFound']);

                return $response;
            }


            // Dans le cas contraire,
            
            // Récupérer le nom du contrôleur ainsi que sa méthode censée gérer l'évenement
            $controller = $router_response['route']['class'];
            $method     = $router_response['route']['method'];

            if ( isset($router_response['parameters']) && !empty($router_response['parameters']) ) 
            {
                $parameters = $router_response['parameters'];
                return $this->container->call([$controller, $method], [$parameters]);
            }
            
            return $this->container->call([$controller, $method]);
        }


        public static function getKernel() : HttpKernel
        {
            return self::$kernel;
        }


        public function getContainer() : ContainerInterface
        {
            return $this->container;
        }
    }
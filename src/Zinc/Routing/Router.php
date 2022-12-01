<?php
declare(strict_types=1);

namespace App\Zinc\Routing;

use App\Zinc\Routing\Route;
use App\Zinc\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;

    class Router implements RouterInterface
    {
        /**
         * Cette propriet" représente la requête injectée dans le router
         *
         * @var Request
         */
        private Request $request;


        /**
         * Cette propriété représente le tableau des routes (armoire)
         *
         * @var array
         */
        private array $routes = [];


        /**
         * Cette propriété représente la liste des paramètres extraits de l'uri de l'url
         *
         * @var array
         */
        private array $parameters = [];


        public function __construct(Request $request, array $controllers)
        {
            //dd($request);
            $this->request = $request;
            $this->addRoutes($controllers);
        }


        /**
         * Cette méthode permet de :
         *      - récupérer les contrôleurs,
         *      - En extraire les routes
         *      - Stocker dans le tableau à routes (armoire)
         *
         * @param array $controllers
         * 
         * @return void
         */
        public function addRoutes(array $controllers) : void
        {
            foreach ($controllers as $controller) 
            {
                $reflectionController = new \ReflectionClass($controller);

                foreach ($reflectionController->getMethods() as $reflectionMethod) 
                {
                    $routeAttributes = $reflectionMethod->getAttributes(Route::class);

                    foreach ($routeAttributes as $routeAttribute) 
                    {
                        $route = $routeAttribute->newInstance();
                        
                        $this->routes[$route->getName()] = 
                        [
                            'class' => $reflectionMethod->class,
                            'method' => $reflectionMethod->name,
                            'route' => $route
                        ];
                    }
                }
                
            }
        }





        /**
         * Cette méthode du routeur lui permet :
         *      - De s'exécuter
         *      - Et de retourner la réponse correspondante qui peut être
         *           -- Un tableau dans le cas oû les routes match
         *           -- null dans le cas oû aucune routes n'a matché
         *
         * @return array|null
         */
        public function run() : ?array
        {
            foreach ($this->routes as $route)
            {
                if( $this->match($this->request->server->get('REQUEST_URI'), $route['route']->getPath()))
                {
                   if ( isset($this->parameters) && !empty($this->parameters))
                   {
                       return 
                       [
                           "route" => $route,
                           "parameters" => $this->parameters
                       ];
                   }

                   return 
                   [
                       "route" => $route,
                   ];
                }
            }
            return null;
        }


        private function match(string $uri_url, string $uri_route)
        {
            $pattern = preg_replace("#{[a-z]+}#", "([0-9a-zA-Z-_]+)", $uri_route);
            $pattern = "#^$pattern$#";

            if (preg_match($pattern, $uri_url, $matches))
            {
                array_shift($matches);
                $this->parameters = $matches;
                return true;
            }
            return false;
        }

    }
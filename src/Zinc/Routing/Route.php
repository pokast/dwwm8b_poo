<?php
namespace App\Zinc\Routing;

//use App\Zinc\Routing\Route;
use App\Zinc\Routing\RouteInterface;

    #[\Attribute(\Attribute::TARGET_METHOD)]

    class Route implements RouteInterface
    {

        /**
         * Cette méthode représente l'url de la route
         *
         * @var string
         */
        private string $path;


        /**
         * Cette méthode représente le nom de la route
         *
         * @var string
         */
        private string $name;


        /**
         * Cette méthode représente la liste des méthodes autorisées 
         * pour accéder à la route
         * 
         * @var array
         */
        private array $methods = [];


        public function __construct(string $path, string $name, array $methods = ['GET'])
        {
            $this->path    = $path;
            $this->name    = $name;
            $this->methods = $methods;
        }


        /**
         * Cette méthode retourne l'url de la route
         * dont l'application attend la réception
         *
         * @return string
         */
        public function getPath() : string
        {
           return $this->path;
        }


         /**
         * Cette méthode retourne le nom de la route
         * dont l'application attend la réception
         *
         * @return string
         */
        public function getName() : string
        {
            return $this->name;
        }


         /**
         * Cette méthode retourne la liste des méthodes par lesquelles 
         * on peut accéder à la route
         * 
         *
         * @return string
         */
        public function getMethods() : array
        {
            return $this->methods;
        }

    }
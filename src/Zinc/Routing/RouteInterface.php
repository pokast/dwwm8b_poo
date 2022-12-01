<?php
namespace App\Zinc\Routing;

    interface RouteInterface
    {
        /**
         * Cette méthode retourne l'url de la route
         * dont l'application attend la réception
         *
         * @return string
         */
        public function getPath() : string;


         /**
         * Cette méthode retourne le nom de la route
         * dont l'application attend la réception
         *
         * @return string
         */
        public function getName() : string;


         /**
         * Cette méthode retourne la liste des méthodes par lesquelles 
         * on peut accéder à la route
         * 
         *
         * @return string
         */
        public function getMethods() : array;

    }
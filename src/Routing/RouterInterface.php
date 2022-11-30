<?php
namespace App\Routing;

    Interface RouterInterface
    {
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
        public function addRoutes(array $controllers) : void;

        /**
         * Cette méthose du routeur lui permet :
         *      - De s'exécuter
         *      - Et de retourner la réponse correspondante qui peut etre
         *          -- Un tableau dans la cas ou les routes match
         *          -- null dans le cas oû aucune routes n'a matché

         * 
         * @return array|null
         */
        public function run() : ?array;
    }
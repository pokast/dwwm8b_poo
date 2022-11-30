<?php
namespace App\Routing;

    interface RouterInterface
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
         * Cette méthode du routeur lui permet :
         *      - De s'exécuter
         *      - Et de retourner la réponse correspondante qui peut être
         *           -- Un tableau dans le cas oû les routes match
         *           -- null dans le cas oû aucune routes n'a matché
         *
         * @return array|null
         */
        public function run() : ?array;
        
    }
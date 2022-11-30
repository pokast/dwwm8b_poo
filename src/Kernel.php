<?php
namespace App;

use App\HttpKernel\HttpKernel;
use Psr\Container\ContainerInterface;

    /**
     * ------------------------------------------------------------------------------------------
     * Kernel
     * 
     * Le noyau
     * 
     * Ses rôles
     *      - Récuperer les dépendances du conteneur
     *      - Demander au routeur de vérifier si l'application attend la visite de la requête du 
     *      du client c'est à dire, vérifier si la request (requete) e l'url match avec l'une des route
     *      dont la'pplication attend la reception
     *      -Récupérer la réponse du routeur
     *          -- Si la réponse est positive :
     *              --- Demander au contrôleur en charge de la requête de générer 
     *              --- Puis, de lui retourner la réponse correspondante
     *          -- Dans le cas contraire,
     *              --- Demander au contrôleur chargé de gerer les erreurs de s'activer
     *              --- Puis, retourner au client la réponse conrrespondante
     *      - Retourner cette réponde au contrôleur frontal
     *      
     * 
     * @version 1.0.0
     * @author Steve PODGA KACK <pokast@outlook.fr>
     * -------------------------------------------------------------------------------------------
     */

    class Kernel extends HttpKernel
    {

       use changeTimeZone;

        public function __construct(ContainerInterface $container) changeTimeZone() : void
        {
            date_default_timezone_set("Europe/Paris");
        }
    }
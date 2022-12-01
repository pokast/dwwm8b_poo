<?php
declare(strict_types=1);

    /**
     * -----------------------------------------------------------------------------
     * Le contrôleur frontal
     * 
     * Ses rôles :
     *      - Réaliser le "bootstrapping" de l'application 
     *          - Chargement de l'autoloader de composer
     *          - Chargement des constantes
     *          - Chargement des variables d'environnement
     *          - Chargement du conteneur de dépendances
     *      - Créer une nouvelle instance du noyau (kernel)
     *          - En lui passant le conteneur en paramètres
     *      - Demander au noyau de soumettre la requête du client au système
     *      - Récupérer la réponse correspondante
     *      - Envoyer cette réponse au client
     * -----------------------------------------------------------------------------
    */

use App\Kernel;


    // Bootstrapping de l'application
    require __DIR__ . "/../config/bootstrap.php";


    // Créer une nouvelle instance du noyau (kernel) en lui passant le conteneur en paramètres
    $kernel = new Kernel($container);


    // Demander au noyau de soumettre la requête du client au système
    // Récupérer la réponse correspondante
    $response = $kernel->handleRequest();


    
<?php

    /**
     * ------------------------------------------------------------
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
     * ------------------------------------------------------------
     */


    // Bootstrapping de l'application
    require __DIR__ . "/../config/bootstrap.php";


    dd($_ENV);
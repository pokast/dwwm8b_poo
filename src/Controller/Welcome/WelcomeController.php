<?php
declare(strict_types=1);

namespace App\Controller\Welcome;

use App\Zinc\AbstractController\AbstractController;
use App\Zinc\Routing\Route;
use Symfony\Component\HttpFoundation\Response;

    class WelcomeController extends AbstractController
    {
        
        #[Route('/', name: "welcome.index", methods: ['GET'])]
        public function index() : Response
        {
            $nom = "Jeudi aprèm";
            $jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
            return $this->render("index.html.twig", [
                "nom"   => $nom,
                "jours" => $jours
            ]);
        }


        #[Route('/edit/{id}', name: "edit", methods: ['GET'])]
        public function edit() : Response
        {
            dd('edit');
        }
        

        #[Route('/hello', name: "welcome.hello", methods: ['GET'])]
        public function hello() : Response
        {
            dd('hello');
        }
    }

    
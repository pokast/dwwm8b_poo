<?php
declare(strict_types=1);

namespace App\Controller\Welcome;

use App\Zinc\Routing\Route;
use Symfony\Component\HttpFoundation\Response;
//use App\Controller\Welcome\WelcomeController;


class WelcomeController
{
    #[Route('/', name: "welcome.index", methods: ['GET'])]
   
    public function index() : Response
    {
        dd('welcome');
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


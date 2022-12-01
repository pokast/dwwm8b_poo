<?php
declare(strict_types=1);

namespace App\Controller\Error;

use Symfony\Component\HttpFoundation\Response;

    class ErrorController
    {
        public function notFound() : Response
        {
            $response = new Response
            (
                'Page non trouvée',
                Response::HTTP_OK,
                ['content-type' => 'text/html']
            );
            
            return $response;
        }
    }

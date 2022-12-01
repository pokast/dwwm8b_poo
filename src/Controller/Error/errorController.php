<?php
declare(strict_types=1);

namespace App\Controller\Error;

    class ErrorController
    {
        public function notFound() : Response
        {
            dd('Not found');
        }
    }

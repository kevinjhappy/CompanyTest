<?php

namespace App\Controller\Company;

use Symfony\Component\HttpFoundation\Response;

class CompanyController
{
    public function launch()
    {
        return new Response(
            '<html><body>This is a test page, please refer to the README project to get informations about how to launch unit tests</body></html>'
        );
    }
}
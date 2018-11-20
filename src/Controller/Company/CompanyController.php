<?php

namespace App\Controller\Company;

use Symfony\Component\HttpFoundation\Response;

class CompanyController
{
    public function launch()
    {
        return new Response(
            '<html><body>Test</body></html>'
        );
    }
}
<?php

declare(strict_types=1);

namespace ruan\psr\Controller;

class Error404Controller implements Controller
{
    public function processaRequisicao(): void
    {
        http_response_code(404);
    }
}

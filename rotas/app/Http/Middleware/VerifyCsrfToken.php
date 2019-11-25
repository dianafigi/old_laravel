<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/rest*' // '/rest*' qq coisa q esteja à frente do rest está allowed //podia pôr '/rest/hello' para um path especifico
    ];
}

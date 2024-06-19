<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/web-api/auth/session/v2/verifyOperatorPlayerSession',
        '/web-api/auth/session/v2/verifySession',
        '/web-api/game-proxy/v2/GameName/Get',
        // '/game-api/*/v2/GameInfo/Get',
        // '/game-api/*/v2/Spin'
    ];

    protected function inExceptArray($request) {
        if(parent::inExceptArray($request)) {
            return true;
        }

        // adiciona a lógica para verificar as rotas dinâmicas
        $path = $request->path();
        if(preg_match('#^game-api/.+/v2/(gameInfo/get|spin)$#i', $path)) {
            return true;
        }
    }
}

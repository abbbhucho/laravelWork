<?php

namespace App\Components\Cors;

class CorsParams {

    const allow_methods = [
        'POST',
        'GET',
        'OPTIONS',
        'PUT',
        'PATCH',
        'DELETE',
    ];

    const allow_headers = [
        'Content-Type',
        'X-Auth-Token',
        'Origin',
        'Authorization',
    ];

    const expose_headers = [
        'Cache-Control',
        'Content-Language',
        'Content-Type',
        'Expires',
        'Last-Modified',
        'Pragma',
    ];

    const allowOrigins = [
        '*'
    ];

    const allow_credentials = false;
}

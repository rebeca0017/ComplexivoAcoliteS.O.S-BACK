<?php

return [
    'paths' => ['api/*'], // ruta de la API a la que deseas permitir el acceso CORS
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'], // métodos HTTP permitidos
    'allowed_origins' => ['*'], // origen permitido
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['Content-Type', 'X-Requested-With'],
    'exposed_headers' => [],
    'max_age' => 86400,
    'supports_credentials' => false,
];
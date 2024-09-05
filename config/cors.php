<?php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost:5173'], // Ajoutez ici l'URL de votre front-end
    'allowed_headers' => ['*'],
    'supports_credentials' => true, // Autoriser l'envoi des cookies
];

<?php

return [
    'home' => '/movies',
    'redirects' => [
        'after_login' => 'movies.index', // Use route name instead of path
        'after_logout' => 'login',
    ],
];
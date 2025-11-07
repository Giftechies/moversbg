<?php

$app = require __DIR__.'/../vendor/autoload.php';

$app = /* … instantiate Laravel application … */;

$app->withMiddleware(function ($middleware) {
    $middleware->api(prepend: [
        \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    ]);
});

return $app;


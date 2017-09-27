safe-url-middleware
===================
A Slim 3 middleware to redirect an HTTP URL to an HTTPS URL.

Install the Middleware
----------------------
```
composer require osorcom/safe-url-middleware:*@dev
```

Use the Middleware
------------------
```
$app->add(new \Slim\Middleware\SafeURLMiddleware());
```

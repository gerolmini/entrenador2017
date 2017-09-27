<?php
/**
 * A Slim 3 middleware to redirect an HTTP URL to an HTTPS URL.
 *
 * @author      Anonimus MOD 3 <anonimo@anonimo.com>
 * @copyright   Curso Desarrollo web MOD 3
 * @link        https://github.com/toyouthat/entrenador2017/visitas-url-middleware
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 * @version     1.0
 */
namespace Slim\Middleware;


class SafeURLMiddleware
{

    public function __invoke($request, $response, $next)
    {
        if ($request->getUri()->getScheme() !== 'https' ) {
            $https_url = $request->getUri()->withScheme("https")->withPort(null);
            $response = $response->withRedirect((string)$https_url, 301);
        } else {
            $response = $next($request, $response);
        }
        return $response;
    }
}

?>

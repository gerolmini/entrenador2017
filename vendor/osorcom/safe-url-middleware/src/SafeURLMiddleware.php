<?php
/**
 * A Slim 3 middleware to redirect an HTTP URL to an HTTPS URL.
 *
 * @author      Òscar Soria Comas <oscar.sor.com@gmail.com>
 * @copyright   2016 Òscar Soria Comas
 * @link        https://github.com/osorcom/safe-url-middleware
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

<?php

namespace Vaneves\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class JsonRequestServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app->before(function (Request $request) {
            if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
                $data = json_decode($request->getContent(), true);
                $request->request->replace(is_array($data) ? $data : array());
            }
        });
    }

    public function boot(Application $app)
    {
    }
}

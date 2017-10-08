<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 08.10.17
 * Time: 22:58
 */
namespace UserBundle\Handler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class RequestRedirectHandler
 * @package UserBundle\Handler
 */
class RequestRedirectHandler
{
    /**
     * Constant which store substring for check route is OAuth login
     */
    const OAUTH_LOGIN_SERVICE_ROUTE = 'login/service';

    /**
     * @var string $redirectPath path to home page
     */
    private $redirectPath = '/';

    /**
     * Handle redirect
     *
     * @param Request $request
     * @return bool|string
     */
    public function handleRedirect(Request $request)
    {
        $this->checkIsOAuthRoute($request);

        $resultRedirect = $this->checkIsOAuthRoute($request);

        return ($resultRedirect) ? $resultRedirect : $this->redirectPath;

    }

    /**
     * Check is OAuth route
     *
     * @param $request
     * @return bool
     */
    public function checkIsOAuthRoute($request)
    {
        $referrer = $request->headers->get('referer');

        if ($referrer && !$this->checkStoreSubString($referrer, self::OAUTH_LOGIN_SERVICE_ROUTE)) {
            return $referrer;
        }

        return false;
    }

    /**
     * Check store substring in route
     *
     * @param string $route
     * @param string $rule
     * @return bool
     */
    public function checkStoreSubString(string $route, string $rule)
    {
        if (strpos($route, $rule) === false) {
            return false;
        }
        return true;
    }

    /**
     * Redirect to path
     *
     * Call redirect to path which sender as path paran
     *
     * @param string $path
     * @return RedirectResponse
     */
    public function redirectTo(string $path)
    {
        return new RedirectResponse($path, 302);
    }
}
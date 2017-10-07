<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 07.10.17
 * Time: 17:47
 */
namespace AppBundle\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;


/**
 * Class AccessDeniedHandler
 *
 * Implementation AccessDeniedHandlerInterface
 *
 * @package AppBundle\Security
 */
class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
    /**
     * Handle an access denied faulure
     *
     * Implement AccessDeniedHandlerInterface handle method which return
     * redirect user to referer route or to main page when access is denied
     * for the current user
     *
     * @param Request $request
     * @param AccessDeniedException $accessDeniedException
     * @return RedirectResponse
     */
    public function handle(Request $request, AccessDeniedException $accessDeniedException)
    {
        $redirectTo = $request->headers->get('referer');

        if (!$redirectTo) {
            $redirectTo = '/';
        }

        return new RedirectResponse($redirectTo, 302);
    }
}
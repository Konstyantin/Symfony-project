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
use UserBundle\Handler\RequestRedirectHandler;


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
     * @var RequestRedirectHandler $redirectHandler
     */
    private $redirectHandler;

    /**
     * AccessDeniedHandler constructor.
     * @param RequestRedirectHandler $redirectHandler
     */
    public function __construct(RequestRedirectHandler $redirectHandler)
    {
        $this->redirectHandler = $redirectHandler;
    }

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
        $path = $this->redirectHandler->handleRedirect($request);

        return $this->redirectHandler->redirectTo($path);
    }
}
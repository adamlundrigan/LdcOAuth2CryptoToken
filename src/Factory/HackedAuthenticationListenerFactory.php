<?php
namespace LdcOAuth2CryptoToken\Factory;

use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZF\MvcAuth\Authentication\DefaultAuthenticationListener;

/**
 * @HACK to work around https://github.com/zfcampus/zf-mvc-auth/issues/45
 */
class HackedAuthenticationListenerFactory implements DelegatorFactoryInterface
{
    public function createDelegatorWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName, $callback)
    {
        $listener = call_user_func($callback);
        if ( ! $listener instanceof DefaultAuthenticationListener ) {
            return $listener;
        }
        
        $listener->setOauth2Server(
            $serviceLocator->get('ZF\OAuth2\Service\OAuth2Server')
        );

        return $listener;
    }
}
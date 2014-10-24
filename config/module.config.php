<?php
return array(
    'service_manager' => array(
        'invokables' => array(
            'ldc-oauth2-crypto-token-server' => 'LdcOAuth2CryptoToken\Factory\CryptoTokenServerFactory',
            'ldc-oauth2-crypto-token-hacked-authentication-listener' => 'LdcOAuth2CryptoToken\Factory\HackedAuthenticationListenerFactory',
        ),
        'delegators' => array(
            'ZF\OAuth2\Service\OAuth2Server' => array(
                'ldc-oauth2-crypto-token-server'
            ),
            // @HACK to work around https://github.com/zfcampus/zf-mvc-auth/issues/45
            'ZF\MvcAuth\Authentication\DefaultAuthenticationListener' => array(
                'ldc-oauth2-crypto-token-hacked-authentication-listener'
            ),
        ),
    ),
);

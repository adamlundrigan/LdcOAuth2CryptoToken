<?php

namespace LdcOAuth2CryptoToken\Factory;

use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CryptoTokenServerFactory implements DelegatorFactoryInterface
{
    public function createDelegatorWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName, $callback)
    {
        $server = call_user_func($callback);

        $config = $serviceLocator->get('Config');

        // Retrieve the pre-configured storage instance
        $coreStorage = $config['ldc-oauth2-crypto-token']['inject_existing_storage'] === true
            ? $serviceLocator->get($config['zf-oauth2']['storage'])
            : null;

        if (! isset($config['ldc-oauth2-crypto-token']['keys']['public_key']) || ! file_exists($config['ldc-oauth2-crypto-token']['keys']['public_key'])) {
            throw new Exception\KeyFileNotFoundException('You must provide a public key to use LdcOAuth2CryptoToken!');
        }
        if (! isset($config['ldc-oauth2-crypto-token']['keys']['private_key']) || ! file_exists($config['ldc-oauth2-crypto-token']['keys']['private_key'])) {
            throw new Exception\KeyFileNotFoundException('You must provide a private key to use LdcOAuth2CryptoToken!');
        }

        // Load the public and private key files
        $publicKey  = file_get_contents($config['ldc-oauth2-crypto-token']['keys']['public_key']);
        $privateKey = file_get_contents($config['ldc-oauth2-crypto-token']['keys']['private_key']);

        // Instantiate in-memory storage for our keys
        $storage = new \OAuth2\Storage\Memory(array(
            'keys' => array(
                'public_key'  => $publicKey,
                'private_key' => $privateKey,
            ),
        ));

        // Make the "access_token" storage use Crypto Tokens instead of a database
        $cryptoStorage = new \OAuth2\Storage\CryptoToken($storage, $coreStorage);
        $server->addStorage($cryptoStorage, 'access_token');

        // make the "token" response type a CryptoToken
        $cryptoResponseType = new \OAuth2\ResponseType\CryptoToken($storage, $coreStorage);
        $server->addResponseType($cryptoResponseType);

        return $server;
    }
}

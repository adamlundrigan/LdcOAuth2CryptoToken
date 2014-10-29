<?php
namespace LdcOAuth2CryptoTokenTest\Factory;

use LdcOAuth2CryptoTokenTest\TestCase;
use LdcOAuth2CryptoToken\Factory\CryptoTokenServerFactory;

class CryptoTokenServiceFactoryTest extends TestCase
{
    public function testExecuteDelegatorFactory()
    {
        $name = 'ZF\OAuth2\Service\OAuth2Server';
        $callback = function () {
            $mock = \Mockery::mock('OAuth2\Server');
            $mock->shouldReceive('addStorage')->with(\Mockery::type('OAuth2\Storage\CryptoToken'), 'access_token');
            $mock->shouldReceive('addResponseType')->with(\Mockery::type('OAuth2\ResponseType\CryptoToken'));

            return $mock;
        };

        $serviceManager = $this->getServiceManager(array(
            'ldc-oauth2-crypto-token' => array(
                'inject_existing_storage' => false,
                'keys' => array(
                    'public_key' => __DIR__ . '/../TestAssets/id_rsa',
                    'private_key' => __DIR__ . '/../TestAssets/id_rsa.pub',
                )
            ),
        ));

        $factory = new CryptoTokenServerFactory();
        $obj = $factory->createDelegatorWithName($serviceManager, $name, $name, $callback);

        $this->assertInstanceOf('OAuth2\Server', $obj);
    }

    public function testExecuteDelegatorFactoryConfiguredToInjectExistingStorage()
    {
        $name = 'ZF\OAuth2\Service\OAuth2Server';
        $callback = function () {
            $mock = \Mockery::mock('OAuth2\Server');
            $mock->shouldReceive('addStorage')->with(\Mockery::type('OAuth2\Storage\CryptoToken'), 'access_token');
            $mock->shouldReceive('addResponseType')->with(\Mockery::type('OAuth2\ResponseType\CryptoToken'));

            return $mock;
        };

        $serviceManager = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceManager->shouldReceive('get')->with('Config')->andReturn(array(
            'ldc-oauth2-crypto-token' => array(
                'inject_existing_storage' => true,
                'keys' => array(
                    'public_key' => __DIR__ . '/../TestAssets/id_rsa',
                    'private_key' => __DIR__ . '/../TestAssets/id_rsa.pub',
                )
            ),
            'zf-oauth2' => array(
                'storage' => 'MockStorageClass',
            )
        ));
        $serviceManager->shouldReceive('get')
                       ->with('MockStorageClass')
                       ->andReturn(\Mockery::mock('OAuth2\Storage\AccessTokenInterface'));

        $factory = new CryptoTokenServerFactory();
        $obj = $factory->createDelegatorWithName($serviceManager, $name, $name, $callback);

        $this->assertInstanceOf('OAuth2\Server', $obj);
    }
}

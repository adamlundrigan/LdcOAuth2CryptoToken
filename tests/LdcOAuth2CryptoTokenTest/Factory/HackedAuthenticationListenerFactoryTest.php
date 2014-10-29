<?php
namespace LdcOAuth2CryptoTokenTest\Factory;
use LdcOAuth2CryptoTokenTest\TestCase;
use LdcOAuth2CryptoToken\Factory\HackedAuthenticationListenerFactory;

class HackedAuthenticationListenerFactoryTest extends TestCase
{
    public function testDelegator()
    {
        $mockServer = \Mockery::mock('OAuth2\Server');
        
        $name = 'ZF\MvcAuth\Authentication\DefaultAuthenticationListener';
        $callback = function() use ($mockServer) {
            $mock = \Mockery::mock('ZF\MvcAuth\Authentication\DefaultAuthenticationListener');
            $mock->shouldReceive('setOauth2Server')->with($mockServer)->once();
            return $mock;
        };
        
        $sl = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        $sl->shouldReceive('get')->with('ZF\OAuth2\Service\OAuth2Server')->andReturn($mockServer);
        
        $factory = new HackedAuthenticationListenerFactory();
        $obj = $factory->createDelegatorWithName($sl, $name, $name, $callback);
        
        $this->assertInstanceOf('ZF\MvcAuth\Authentication\DefaultAuthenticationListener', $obj);
    }
    
    public function testDelegatorBailsIfParentFactoryFails()
    {
        $name = 'ZF\MvcAuth\Authentication\DefaultAuthenticationListener';
        $callback = function() { return null; };
        
        $sl = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        
        $factory = new HackedAuthenticationListenerFactory();
        $this->assertNull($factory->createDelegatorWithName($sl, $name, $name, $callback));
    }
}
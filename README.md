# LdcOAuth2CryptoToken

Reconfigures [`zf-oauth2`](https://github.com/zfcampus/zf-oauth2) to issue [JWT crypto tokens](http://bshaffer.github.io/oauth2-server-php-docs/overview/crypto-tokens/).

----

[![Latest Stable Version](https://poser.pugx.org/adamlundrigan/ldc-oauth2-crypto-token/v/stable.svg)](https://packagist.org/packages/adamlundrigan/ldc-oauth2-crypto-token) [![License](https://poser.pugx.org/adamlundrigan/ldc-oauth2-crypto-token/license.svg)](https://packagist.org/packages/adamlundrigan/ldc-oauth2-crypto-token) [![Build Status](https://travis-ci.org/adamlundrigan/LdcOAuth2CryptoToken.svg?branch=release%2F1.x)](https://travis-ci.org/adamlundrigan/LdcOAuth2CryptoToken) [![Code Coverage](https://scrutinizer-ci.com/g/adamlundrigan/LdcOAuth2CryptoToken/badges/coverage.png?b=release%2F1.x)](https://scrutinizer-ci.com/g/adamlundrigan/LdcOAuth2CryptoToken/?branch=release%2F1.x) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/adamlundrigan/LdcOAuth2CryptoToken/badges/quality-score.png?b=release%2F1.x)](https://scrutinizer-ci.com/g/adamlundrigan/LdcOAuth2CryptoToken/?branch=release%2F1.x)

----

## How?

1. Install module using Composer

   ```
   composer require adamlundrigan/ldc-oauth2-crypto-token:~1.0
   ```

   > NOTE: If your application requires `bshaffer/oauth2-server-php` version >= 1.6, use V2 or higher of this module.

2. Enable required modules in your `application.config.php` file:

   - ZF\OAuth2
   - LdcOAuth2CryptoToken 

3. You will need an RSA public/private key pair.  If you do not already have one, refer to ["Creating a Public and Private Key Pair" section of this page.](http://bshaffer.github.io/oauth2-server-php-docs/overview/crypto-tokens/) 

4. Copy the dist configuration file `ldc-oauth2-crypto-token.local.php.dist` to `config/autoload`




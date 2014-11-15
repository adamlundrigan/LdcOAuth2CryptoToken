# LdcOAuth2CryptoToken

Reconfigures [`zf-oauth2`](https://github.com/zfcampus/zf-oauth2) to issue [JWT crypto tokens](http://bshaffer.github.io/oauth2-server-php-docs/overview/crypto-tokens/).

----

[![Latest Stable Version](https://poser.pugx.org/adamlundrigan/ldc-oauth2-crypto-token/v/stable.svg)](https://packagist.org/packages/adamlundrigan/ldc-oauth2-crypto-token) [![License](https://poser.pugx.org/adamlundrigan/ldc-oauth2-crypto-token/license.svg)](https://packagist.org/packages/adamlundrigan/ldc-oauth2-crypto-token) [![Build Status](https://travis-ci.org/adamlundrigan/LdcOAuth2CryptoToken.svg?branch=master)](https://travis-ci.org/adamlundrigan/LdcOAuth2CryptoToken) [![Code Coverage](https://scrutinizer-ci.com/g/adamlundrigan/LdcOAuth2CryptoToken/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/adamlundrigan/LdcOAuth2CryptoToken/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/adamlundrigan/LdcOAuth2CryptoToken/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/adamlundrigan/LdcOAuth2CryptoToken/?branch=master)

----

## How?

1. Install module using Composer

   ```
   composer require adamlundrigan/ldc-oauth2-crypto-token:<version>
   ```

2. Enable required modules in your `application.config.php` file:

   - ZF\OAuth2
   - LdcOAuth2CryptoToken 

3. You will need an RSA public/private key pair.  If you do not already have one, refer to ["Creating a Public and Private Key Pair" section of this page.](http://bshaffer.github.io/oauth2-server-php-docs/overview/crypto-tokens/) 

4. Copy the dist configuration file `ldc-oauth2-crypto-token.local.php.dist` to `config/autoload`




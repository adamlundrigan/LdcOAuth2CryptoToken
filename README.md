# LdcOAuth2CryptoToken

Reconfigures [`zf-oauth2`](https://github.com/zfcampus/zf-oauth2) to issue [JWT crypto tokens](http://bshaffer.github.io/oauth2-server-php-docs/overview/crypto-tokens/).

__WARNING__: This code is not yet tested, documented or been used in a live environment.  Approach with extreme caution.

## How?

1. Install module using Composer

   ```
   composer install adamlundrigan/ldc-oauth2-crypto-token:<version>
   ```

2. Enable required modules in your `application.config.php` file:

   - ZF\OAuth2
   - LdcOAuth2CryptoToken 

3. Copy the dist configuration file `ldc-oauth2-crypto-token.local.php.dist` to `config/autoload`

4. You will need an RSA public/private key pair.  If you do not already have one, refer to ["Creating a Public and Private Key Pair" section of this page.](http://bshaffer.github.io/oauth2-server-php-docs/overview/crypto-tokens/) 




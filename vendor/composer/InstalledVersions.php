<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-main',
    'version' => 'dev-main',
    'aliases' => 
    array (
    ),
    'reference' => '48fcd38bfca376b366182fb3c0f66a078af55696',
    'name' => 'laravel/laravel',
  ),
  'versions' => 
  array (
    'asm89/stack-cors' => 
    array (
      'pretty_version' => 'v2.1.1',
      'version' => '2.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '73e5b88775c64ccc0b84fb60836b30dc9d92ac4a',
    ),
    'barryvdh/laravel-debugbar' => 
    array (
      'pretty_version' => 'v3.7.0',
      'version' => '3.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3372ed65e6d2039d663ed19aa699956f9d346271',
    ),
    'barryvdh/laravel-dompdf' => 
    array (
      'pretty_version' => 'v2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1d47648c6cef37f715ecb8bcc5f5a656ad372e27',
    ),
    'binarystash/pdf-watermarker' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5ee90d7499eeb22de1509a484ba485ce89f0bc8f',
    ),
    'brick/math' => 
    array (
      'pretty_version' => '0.9.3',
      'version' => '0.9.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ca57d18f028f84f777b2168cd1911b0dee2343ae',
    ),
    'carlos-meneses/laravel-mpdf' => 
    array (
      'pretty_version' => '2.1.8',
      'version' => '2.1.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '8cc36dc1c8275f7a08b0f59dc1395d273c922e7d',
    ),
    'cordoval/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'creativeorange/gravatar' => 
    array (
      'pretty_version' => 'v1.0.22',
      'version' => '1.0.22.0',
      'aliases' => 
      array (
      ),
      'reference' => '0eed243a16bcd01e618036f9b8021526ea26f64a',
    ),
    'davedevelopment/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'dflydev/dot-access-data' => 
    array (
      'pretty_version' => 'v3.0.1',
      'version' => '3.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '0992cc19268b259a39e86f296da5f0677841f42c',
    ),
    'doctrine/cache' => 
    array (
      'pretty_version' => '2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1ca8f21980e770095a31456042471a57bc4c68fb',
    ),
    'doctrine/collections' => 
    array (
      'pretty_version' => '1.6.8',
      'version' => '1.6.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '1958a744696c6bb3bb0d28db2611dc11610e78af',
    ),
    'doctrine/dbal' => 
    array (
      'pretty_version' => '2.13.9',
      'version' => '2.13.9.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c480849ca3ad6706a39c970cdfe6888fa8a058b8',
    ),
    'doctrine/deprecations' => 
    array (
      'pretty_version' => 'v1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '0e2a4f1f8cdfc7a92ec3b01c9334898c806b30de',
    ),
    'doctrine/event-manager' => 
    array (
      'pretty_version' => '1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '41370af6a30faa9dc0368c4a6814d596e81aba7f',
    ),
    'doctrine/inflector' => 
    array (
      'pretty_version' => '2.0.4',
      'version' => '2.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '8b7ff3e4b7de6b2c84da85637b59fd2880ecaa89',
    ),
    'doctrine/instantiator' => 
    array (
      'pretty_version' => '1.4.1',
      'version' => '1.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '10dcfce151b967d20fde1b34ae6640712c3891bc',
    ),
    'doctrine/lexer' => 
    array (
      'pretty_version' => '1.2.3',
      'version' => '1.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c268e882d4dbdd85e36e4ad69e02dc284f89d229',
    ),
    'doctrine/persistence' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '25ec98a8cbd1f850e60fdb62c0ef77c162da8704',
    ),
    'dompdf/dompdf' => 
    array (
      'pretty_version' => 'v2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '79573d8b8a141ec8a17312515de8740eed014fa9',
    ),
    'dragonmantank/cron-expression' => 
    array (
      'pretty_version' => 'v3.3.1',
      'version' => '3.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'be85b3f05b46c39bbc0d95f6c071ddff669510fa',
    ),
    'egulias/email-validator' => 
    array (
      'pretty_version' => '2.1.25',
      'version' => '2.1.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '0dbf5d78455d4d6a41d186da50adc1122ec066f4',
    ),
    'eklundkristoffer/seedster' => 
    array (
      'pretty_version' => '4.0',
      'version' => '4.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9c01f9d3527a1988eb9454270ec9e77787c2da7f',
    ),
    'facade/flare-client-php' => 
    array (
      'pretty_version' => '1.9.1',
      'version' => '1.9.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b2adf1512755637d0cef4f7d1b54301325ac78ed',
    ),
    'facade/ignition' => 
    array (
      'pretty_version' => '2.17.6',
      'version' => '2.17.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '6acd82e986a2ecee89e2e68adfc30a1936d1ab7c',
    ),
    'facade/ignition-contracts' => 
    array (
      'pretty_version' => '1.0.2',
      'version' => '1.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '3c921a1cdba35b68a7f0ccffc6dffc1995b18267',
    ),
    'fideloper/proxy' => 
    array (
      'pretty_version' => '4.4.2',
      'version' => '4.4.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a751f2bc86dd8e6cfef12dc0cbdada82f5a18750',
    ),
    'filp/whoops' => 
    array (
      'pretty_version' => '2.14.5',
      'version' => '2.14.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a63e5e8f26ebbebf8ed3c5c691637325512eb0dc',
    ),
    'friendsofphp/proxy-manager-lts' => 
    array (
      'pretty_version' => 'v1.0.12',
      'version' => '1.0.12.0',
      'aliases' => 
      array (
      ),
      'reference' => '8419f0158715b30d4b99a5bd37c6a39671994ad7',
    ),
    'fruitcake/laravel-cors' => 
    array (
      'pretty_version' => 'v2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '783a74f5e3431d7b9805be8afb60fd0a8f743534',
    ),
    'fzaninotto/faker' => 
    array (
      'pretty_version' => 'v1.9.2',
      'version' => '1.9.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '848d8125239d7dbf8ab25cb7f054f1a630e68c2e',
    ),
    'google/recaptcha' => 
    array (
      'pretty_version' => '1.2.4',
      'version' => '1.2.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '614f25a9038be4f3f2da7cbfd778dc5b357d2419',
    ),
    'graham-campbell/result-type' => 
    array (
      'pretty_version' => 'v1.0.4',
      'version' => '1.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '0690bde05318336c7221785f2a932467f98b64ca',
    ),
    'guzzlehttp/guzzle' => 
    array (
      'pretty_version' => '7.4.5',
      'version' => '7.4.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '1dd98b0564cb3f6bd16ce683cb755f94c10fbd82',
    ),
    'guzzlehttp/promises' => 
    array (
      'pretty_version' => '1.5.1',
      'version' => '1.5.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fe752aedc9fd8fcca3fe7ad05d419d32998a06da',
    ),
    'guzzlehttp/psr7' => 
    array (
      'pretty_version' => '2.4.0',
      'version' => '2.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '13388f00956b1503577598873fffb5ae994b5737',
    ),
    'hamcrest/hamcrest-php' => 
    array (
      'pretty_version' => 'v2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8c3d0a3f6af734494ad8f6fbbee0ba92422859f3',
    ),
    'illuminate/auth' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/broadcasting' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/bus' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/cache' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/collections' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/config' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/console' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/container' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/cookie' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/database' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/encryption' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/events' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/filesystem' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/hashing' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/http' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/log' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/macroable' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/mail' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/notifications' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/pagination' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/pipeline' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/queue' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/redis' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/routing' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/session' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/support' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/testing' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/translation' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/validation' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'illuminate/view' => 
    array (
      'replaced' => 
      array (
        0 => 'v8.83.22',
      ),
    ),
    'intervention/image' => 
    array (
      'pretty_version' => '2.7.2',
      'version' => '2.7.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '04be355f8d6734c826045d02a1079ad658322dad',
    ),
    'jaybizzle/crawler-detect' => 
    array (
      'pretty_version' => 'v1.2.111',
      'version' => '1.2.111.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd572ed4a65a70a2d2871dc5137c9c5b7e69745ab',
    ),
    'jaybizzle/laravel-crawler-detect' => 
    array (
      'pretty_version' => 'v1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a0339574b6dfb6b82167b6c65d068d751a6e8c4d',
    ),
    'jeremykenedy/laravel-blocker' => 
    array (
      'pretty_version' => 'v3.3.0',
      'version' => '3.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c636187f741a32fde7a4adecaf2c646f6d020377',
    ),
    'jeremykenedy/laravel-exception-notifier' => 
    array (
      'pretty_version' => 'v1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '50458c1a6f698166c978c86571cc9d55ac3d4f28',
    ),
    'jeremykenedy/laravel-https' => 
    array (
      'pretty_version' => 'v1.5.0',
      'version' => '1.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '29673df2b672e945d889110085128e9d957448cb',
    ),
    'jeremykenedy/laravel-logger' => 
    array (
      'pretty_version' => 'v3.9.0',
      'version' => '3.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a9b77c0575bab0828c8b5a5a0825b0e366267994',
    ),
    'jeremykenedy/laravel-phpinfo' => 
    array (
      'pretty_version' => 'v1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1b56c76045587ae6afcd416cab6e6a9d8ce2479a',
    ),
    'jeremykenedy/laravel-roles' => 
    array (
      'pretty_version' => 'v3.8.0',
      'version' => '3.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '64906b7586996f1d64d206dd0bad87be9fae6561',
    ),
    'jeremykenedy/laravel2step' => 
    array (
      'pretty_version' => 'v2.1.0',
      'version' => '2.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '22679c5466266569b2da6922b63b354199baacb3',
    ),
    'jeremykenedy/uuid' => 
    array (
      'pretty_version' => 'v3.1.0',
      'version' => '3.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f8b8eeb43c0eaf830c250116170ebb841c4f136c',
    ),
    'jorenvanhocht/laravel-share' => 
    array (
      'pretty_version' => '4.2.0',
      'version' => '4.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '86af334068038a840567ed62f2082fe3ac981476',
    ),
    'kodova/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'laminas/laminas-code' => 
    array (
      'pretty_version' => '4.5.2',
      'version' => '4.5.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'da01fb74c08f37e20e7ae49f1e3ee09aa401ebad',
    ),
    'laminas/laminas-escaper' => 
    array (
      'pretty_version' => '2.10.0',
      'version' => '2.10.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '58af67282db37d24e584a837a94ee55b9c7552be',
    ),
    'laravel/framework' => 
    array (
      'pretty_version' => 'v8.83.22',
      'version' => '8.83.22.0',
      'aliases' => 
      array (
      ),
      'reference' => '96aecced5126d48e277e5339193c376fe82b6565',
    ),
    'laravel/helpers' => 
    array (
      'pretty_version' => 'v1.5.0',
      'version' => '1.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c28b0ccd799d58564c41a62395ac9511a1e72931',
    ),
    'laravel/laravel' => 
    array (
      'pretty_version' => 'dev-main',
      'version' => 'dev-main',
      'aliases' => 
      array (
      ),
      'reference' => '48fcd38bfca376b366182fb3c0f66a078af55696',
    ),
    'laravel/serializable-closure' => 
    array (
      'pretty_version' => 'v1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '09f0e9fb61829f628205b7c94906c28740ff9540',
    ),
    'laravel/socialite' => 
    array (
      'pretty_version' => 'v5.5.2',
      'version' => '5.5.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '68afb03259b82d898c68196cbcacd48596a9dd72',
    ),
    'laravel/tinker' => 
    array (
      'pretty_version' => 'v2.7.2',
      'version' => '2.7.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dff39b661e827dae6e092412f976658df82dbac5',
    ),
    'laravel/ui' => 
    array (
      'pretty_version' => 'v2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2ccaa3b821ea8ac7e05393b946d0578bdb46099b',
    ),
    'laravelcollective/html' => 
    array (
      'pretty_version' => 'v6.3.0',
      'version' => '6.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '78c3cb516ac9e6d3d76cad9191f81d217302dea6',
    ),
    'league/commonmark' => 
    array (
      'pretty_version' => '2.3.4',
      'version' => '2.3.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '155ec1c95626b16fda0889cf15904d24890a60d5',
    ),
    'league/config' => 
    array (
      'pretty_version' => 'v1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a9d39eeeb6cc49d10a6e6c36f22c4c1f4a767f3e',
    ),
    'league/flysystem' => 
    array (
      'pretty_version' => '1.1.9',
      'version' => '1.1.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '094defdb4a7001845300334e7c1ee2335925ef99',
    ),
    'league/mime-type-detection' => 
    array (
      'pretty_version' => '1.11.0',
      'version' => '1.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ff6248ea87a9f116e78edd6002e39e5128a0d4dd',
    ),
    'league/oauth1-client' => 
    array (
      'pretty_version' => 'v1.10.1',
      'version' => '1.10.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd6365b901b5c287dd41f143033315e2f777e1167',
    ),
    'masterminds/html5' => 
    array (
      'pretty_version' => '2.7.5',
      'version' => '2.7.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f640ac1bdddff06ea333a920c95bbad8872429ab',
    ),
    'maximebf/debugbar' => 
    array (
      'pretty_version' => 'v1.18.0',
      'version' => '1.18.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '0d44b75f3b5d6d41ae83b79c7a4bceae7fbc78b6',
    ),
    'mockery/mockery' => 
    array (
      'pretty_version' => '1.5.0',
      'version' => '1.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c10a5f6e06fc2470ab1822fa13fa2a7380f8fbac',
    ),
    'monolog/monolog' => 
    array (
      'pretty_version' => '2.8.0',
      'version' => '2.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '720488632c590286b88b80e62aa3d3d551ad4a50',
    ),
    'mpdf/mpdf' => 
    array (
      'pretty_version' => 'v8.1.1',
      'version' => '8.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e511e89a66bdb066e3fbf352f00f4734d5064cbf',
    ),
    'mtdowling/cron-expression' => 
    array (
      'replaced' => 
      array (
        0 => '^1.0',
      ),
    ),
    'myclabs/deep-copy' => 
    array (
      'pretty_version' => '1.11.0',
      'version' => '1.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '14daed4296fae74d9e3201d2c4925d1acb7aa614',
    ),
    'nesbot/carbon' => 
    array (
      'pretty_version' => '2.59.1',
      'version' => '2.59.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a9000603ea337c8df16cc41f8b6be95a65f4d0f5',
    ),
    'nette/schema' => 
    array (
      'pretty_version' => 'v1.2.2',
      'version' => '1.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '9a39cef03a5b34c7de64f551538cbba05c2be5df',
    ),
    'nette/utils' => 
    array (
      'pretty_version' => 'v3.2.7',
      'version' => '3.2.7.0',
      'aliases' => 
      array (
      ),
      'reference' => '0af4e3de4df9f1543534beab255ccf459e7a2c99',
    ),
    'nikic/php-parser' => 
    array (
      'pretty_version' => 'v4.14.0',
      'version' => '4.14.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '34bea19b6e03d8153165d8f30bba4c3be86184c1',
    ),
    'niklasravnsborg/laravel-pdf' => 
    array (
      'pretty_version' => 'v4.1.0',
      'version' => '4.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a5f5c22dd5e10d8f536102cec01c21282e18ebae',
    ),
    'nunomaduro/collision' => 
    array (
      'pretty_version' => 'v5.11.0',
      'version' => '5.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8b610eef8582ccdc05d8f2ab23305e2d37049461',
    ),
    'ocramius/proxy-manager' => 
    array (
      'replaced' => 
      array (
        0 => '^2.1',
      ),
    ),
    'opis/closure' => 
    array (
      'pretty_version' => '3.6.3',
      'version' => '3.6.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '3d81e4309d2a927abbe66df935f4bb60082805ad',
    ),
    'paragonie/random_compat' => 
    array (
      'pretty_version' => 'v9.99.100',
      'version' => '9.99.100.0',
      'aliases' => 
      array (
      ),
      'reference' => '996434e5492cb4c3edcb9168db6fbb1359ef965a',
    ),
    'paragonie/sodium_compat' => 
    array (
      'pretty_version' => 'v1.17.1',
      'version' => '1.17.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ac994053faac18d386328c91c7900f930acadf1e',
    ),
    'phar-io/manifest' => 
    array (
      'pretty_version' => '2.0.3',
      'version' => '2.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '97803eca37d319dfa7826cc2437fc020857acb53',
    ),
    'phar-io/version' => 
    array (
      'pretty_version' => '3.2.1',
      'version' => '3.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
    ),
    'phenx/php-font-lib' => 
    array (
      'pretty_version' => '0.5.4',
      'version' => '0.5.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dd448ad1ce34c63d09baccd05415e361300c35b4',
    ),
    'phenx/php-svg-lib' => 
    array (
      'pretty_version' => '0.4.1',
      'version' => '0.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4498b5df7b08e8469f0f8279651ea5de9626ed02',
    ),
    'php-http/async-client-implementation' => 
    array (
      'provided' => 
      array (
        0 => '*',
      ),
    ),
    'php-http/client-implementation' => 
    array (
      'provided' => 
      array (
        0 => '*',
      ),
    ),
    'php-http/message-factory' => 
    array (
      'pretty_version' => 'v1.0.2',
      'version' => '1.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a478cb11f66a6ac48d8954216cfed9aa06a501a1',
    ),
    'phpdocumentor/reflection-common' => 
    array (
      'pretty_version' => '2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1d01c49d4ed62f25aa84a747ad35d5a16924662b',
    ),
    'phpdocumentor/reflection-docblock' => 
    array (
      'pretty_version' => '5.3.0',
      'version' => '5.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '622548b623e81ca6d78b721c5e029f4ce664f170',
    ),
    'phpdocumentor/type-resolver' => 
    array (
      'pretty_version' => '1.6.1',
      'version' => '1.6.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '77a32518733312af16a44300404e945338981de3',
    ),
    'phpoffice/phpword' => 
    array (
      'pretty_version' => '0.18.3',
      'version' => '0.18.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'be0190cd5d8f95b4be08d5853b107aa4e352759a',
    ),
    'phpoption/phpoption' => 
    array (
      'pretty_version' => '1.8.1',
      'version' => '1.8.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'eab7a0df01fe2344d172bff4cd6dbd3f8b84ad15',
    ),
    'phpspec/prophecy' => 
    array (
      'pretty_version' => 'v1.15.0',
      'version' => '1.15.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bbcd7380b0ebf3961ee21409db7b38bc31d69a13',
    ),
    'phpunit/php-code-coverage' => 
    array (
      'pretty_version' => '9.2.15',
      'version' => '9.2.15.0',
      'aliases' => 
      array (
      ),
      'reference' => '2e9da11878c4202f97915c1cb4bb1ca318a63f5f',
    ),
    'phpunit/php-file-iterator' => 
    array (
      'pretty_version' => '3.0.6',
      'version' => '3.0.6.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cf1c2e7c203ac650e352f4cc675a7021e7d1b3cf',
    ),
    'phpunit/php-invoker' => 
    array (
      'pretty_version' => '3.1.1',
      'version' => '3.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '5a10147d0aaf65b58940a0b72f71c9ac0423cc67',
    ),
    'phpunit/php-text-template' => 
    array (
      'pretty_version' => '2.0.4',
      'version' => '2.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28',
    ),
    'phpunit/php-timer' => 
    array (
      'pretty_version' => '5.0.3',
      'version' => '5.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2',
    ),
    'phpunit/phpunit' => 
    array (
      'pretty_version' => '9.5.21',
      'version' => '9.5.21.0',
      'aliases' => 
      array (
      ),
      'reference' => '0e32b76be457de00e83213528f6bb37e2a38fcb1',
    ),
    'psr/cache' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd11b50ad223250cf17b86e38383413f5a6764bf8',
    ),
    'psr/cache-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0|2.0',
      ),
    ),
    'psr/container' => 
    array (
      'pretty_version' => '1.1.2',
      'version' => '1.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '513e0666f7216c7459170d56df27dfcefe1689ea',
    ),
    'psr/container-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/event-dispatcher' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
    ),
    'psr/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/http-client' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '2dfb5f6c5eff0e91e20e913f8c5452ed95b86621',
    ),
    'psr/http-client-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/http-factory' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '12ac7fcd07e5b077433f5f2bee95b3a771bf61be',
    ),
    'psr/http-factory-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/http-message' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f6561bf28d520154e4b0ec72be95418abe6d9363',
    ),
    'psr/http-message-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/link' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'eea8e8662d5cd3ae4517c9b864493f59fca95562',
    ),
    'psr/link-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.4',
      'version' => '1.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd49695b909c3b7628b6289db5479a1c204601f11',
    ),
    'psr/log-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0.0 || 2.0.0 || 3.0.0',
        1 => '1.0|2.0',
      ),
    ),
    'psr/simple-cache' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
    ),
    'psr/simple-cache-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
        1 => '1.0|2.0',
      ),
    ),
    'psy/psysh' => 
    array (
      'pretty_version' => 'v0.11.7',
      'version' => '0.11.7.0',
      'aliases' => 
      array (
      ),
      'reference' => '77fc7270031fbc28f9a7bea31385da5c4855cb7a',
    ),
    'pusher/pusher-php-server' => 
    array (
      'pretty_version' => 'v4.1.5',
      'version' => '4.1.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '251f22602320c1b1aff84798fe74f3f7ee0504a9',
    ),
    'ralouphie/getallheaders' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '120b605dfeb996808c31b6477290a714d356e822',
    ),
    'ramsey/collection' => 
    array (
      'pretty_version' => '1.2.2',
      'version' => '1.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cccc74ee5e328031b15640b51056ee8d3bb66c0a',
    ),
    'ramsey/uuid' => 
    array (
      'pretty_version' => '4.2.3',
      'version' => '4.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fc9bb7fb5388691fd7373cd44dcb4d63bbcf24df',
    ),
    'rap2hpoutre/laravel-log-viewer' => 
    array (
      'pretty_version' => 'v1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '27392d29234b6ff38a456454558f4bcc40cc837a',
    ),
    'rhumsaa/uuid' => 
    array (
      'replaced' => 
      array (
        0 => '4.2.3',
      ),
    ),
    'sabberworm/php-css-parser' => 
    array (
      'pretty_version' => '8.4.0',
      'version' => '8.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e41d2140031d533348b2192a83f02d8dd8a71d30',
    ),
    'sebastian/cli-parser' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '442e7c7e687e42adc03470c7b668bc4b2402c0b2',
    ),
    'sebastian/code-unit' => 
    array (
      'pretty_version' => '1.0.8',
      'version' => '1.0.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '1fc9f64c0927627ef78ba436c9b17d967e68e120',
    ),
    'sebastian/code-unit-reverse-lookup' => 
    array (
      'pretty_version' => '2.0.3',
      'version' => '2.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5',
    ),
    'sebastian/comparator' => 
    array (
      'pretty_version' => '4.0.6',
      'version' => '4.0.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '55f4261989e546dc112258c7a75935a81a7ce382',
    ),
    'sebastian/complexity' => 
    array (
      'pretty_version' => '2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '739b35e53379900cc9ac327b2147867b8b6efd88',
    ),
    'sebastian/diff' => 
    array (
      'pretty_version' => '4.0.4',
      'version' => '4.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '3461e3fccc7cfdfc2720be910d3bd73c69be590d',
    ),
    'sebastian/environment' => 
    array (
      'pretty_version' => '5.1.4',
      'version' => '5.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '1b5dff7bb151a4db11d49d90e5408e4e938270f7',
    ),
    'sebastian/exporter' => 
    array (
      'pretty_version' => '4.0.4',
      'version' => '4.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '65e8b7db476c5dd267e65eea9cab77584d3cfff9',
    ),
    'sebastian/global-state' => 
    array (
      'pretty_version' => '5.0.5',
      'version' => '5.0.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '0ca8db5a5fc9c8646244e629625ac486fa286bf2',
    ),
    'sebastian/lines-of-code' => 
    array (
      'pretty_version' => '1.0.3',
      'version' => '1.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c1c2e997aa3146983ed888ad08b15470a2e22ecc',
    ),
    'sebastian/object-enumerator' => 
    array (
      'pretty_version' => '4.0.4',
      'version' => '4.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '5c9eeac41b290a3712d88851518825ad78f45c71',
    ),
    'sebastian/object-reflector' => 
    array (
      'pretty_version' => '2.0.4',
      'version' => '2.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b4f479ebdbf63ac605d183ece17d8d7fe49c15c7',
    ),
    'sebastian/recursion-context' => 
    array (
      'pretty_version' => '4.0.4',
      'version' => '4.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cd9d8cf3c5804de4341c283ed787f099f5506172',
    ),
    'sebastian/resource-operations' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8',
    ),
    'sebastian/type' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b233b84bc4465aff7b57cf1c4bc75c86d00d6dad',
    ),
    'sebastian/version' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c6c1022351a901512170118436c764e473f6de8c',
    ),
    'setasign/fpdf' => 
    array (
      'pretty_version' => '1.8.4',
      'version' => '1.8.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b0ddd9c5b98ced8230ef38534f6f3c17308a7974',
    ),
    'setasign/fpdi' => 
    array (
      'pretty_version' => 'v2.3.6',
      'version' => '2.3.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '6231e315f73e4f62d72b73f3d6d78ff0eed93c31',
    ),
    'setasign/fpdi-fpdf' => 
    array (
      'pretty_version' => 'v2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f2fdc44e4d5247a3bb55ed2c2c1396ef05c02357',
    ),
    'shvetsgroup/laravel-email-database-log' => 
    array (
      'pretty_version' => '8.0.2',
      'version' => '8.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '9c56f32eea38172f0957323523dc21b4d385801a',
    ),
    'socialiteproviders/37signals' => 
    array (
      'pretty_version' => 'v3.1.0',
      'version' => '3.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd55d80c86347d7dda4e66fad8abeb34dee6c6bc8',
    ),
    'socialiteproviders/generators' => 
    array (
      'pretty_version' => 'v4.6.2',
      'version' => '4.6.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e910bc5db562006d8722acbe6f1ecd21491ec543',
    ),
    'socialiteproviders/instagram' => 
    array (
      'pretty_version' => 'v3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '054dc7c8d2e4cf80e94321ee6fe316d0ef78a7f6',
    ),
    'socialiteproviders/linkedin' => 
    array (
      'pretty_version' => 'v3.1',
      'version' => '3.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '87457ddf6fa55bd4f91dc9c5e2cf20bd7a2000cc',
    ),
    'socialiteproviders/manager' => 
    array (
      'pretty_version' => 'v3.6',
      'version' => '3.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fc8dbcf0061f12bfe0cc347e9655af932860ad36',
    ),
    'socialiteproviders/twitch' => 
    array (
      'pretty_version' => 'v5.2.0',
      'version' => '5.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9ee6fe196d7c28777139b3cde04cbd537cf7e652',
    ),
    'socialiteproviders/youtube' => 
    array (
      'pretty_version' => 'v3.1.0',
      'version' => '3.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '0c82b395d140a1021fa7c0e5f767ade662e16a84',
    ),
    'swiftmailer/swiftmailer' => 
    array (
      'pretty_version' => 'v6.3.0',
      'version' => '6.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8a5d5072dca8f48460fce2f4131fcc495eec654c',
    ),
    'symfony/asset' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/browser-kit' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/cache' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/cache-contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.5.2',
      ),
    ),
    'symfony/cache-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0|2.0',
      ),
    ),
    'symfony/config' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/console' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/contracts' => 
    array (
      'pretty_version' => 'v2.5.2',
      'version' => '2.5.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd3da2932c17d3cc0d6cd167518cc63ab7b909f38',
    ),
    'symfony/css-selector' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/debug-bundle' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/dependency-injection' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/deprecation-contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.5.2',
      ),
    ),
    'symfony/doctrine-bridge' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/dom-crawler' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/dotenv' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/error-handler' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/event-dispatcher' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/event-dispatcher-contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.5.2',
      ),
    ),
    'symfony/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '2.0',
      ),
    ),
    'symfony/expression-language' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/filesystem' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/finder' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/form' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/framework-bundle' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/http-client' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/http-client-contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.5.2',
      ),
    ),
    'symfony/http-client-implementation' => 
    array (
      'provided' => 
      array (
        0 => '2.4',
      ),
    ),
    'symfony/http-foundation' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/http-kernel' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/inflector' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/intl' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/ldap' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/lock' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/mailer' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/messenger' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/mime' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/monolog-bridge' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/notifier' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/options-resolver' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/password-hasher' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6fd1b9a79f6e3cf65f9e679b23af304cd9e010d4',
    ),
    'symfony/polyfill-iconv' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '143f1881e655bebca1312722af8068de235ae5dc',
    ),
    'symfony/polyfill-intl-grapheme' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '433d05519ce6990bf3530fba6957499d327395c2',
    ),
    'symfony/polyfill-intl-icu' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e407643d610e5f2c8a4b14189150f68934bf5e48',
    ),
    'symfony/polyfill-intl-idn' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '59a8d271f00dd0e4c2e518104cc7963f655a1aa8',
    ),
    'symfony/polyfill-intl-normalizer' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '219aa369ceff116e673852dce47c3a41794c14bd',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9344f9cb97f3b19424af1a21a3b0e75b0a7d8d7e',
    ),
    'symfony/polyfill-php72' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bf44a9fd41feaac72b074de600314a93e2ae78e2',
    ),
    'symfony/polyfill-php73' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e440d35fa0286f77fb45b79a03fedbeda9307e85',
    ),
    'symfony/polyfill-php80' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cfa0ae98841b9e461207c13ab093d76b0fa7bace',
    ),
    'symfony/polyfill-php81' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '13f6d1271c663dc5ae9fb843a8f16521db7687a1',
    ),
    'symfony/polyfill-uuid' => 
    array (
      'pretty_version' => 'v1.26.0',
      'version' => '1.26.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a41886c1c81dc075a09c71fe6db5b9d68c79de23',
    ),
    'symfony/process' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/property-access' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/property-info' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/proxy-manager-bridge' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/rate-limiter' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/routing' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/security-bundle' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/security-core' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/security-csrf' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/security-guard' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/security-http' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/semaphore' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/serializer' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/service-contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.5.2',
      ),
    ),
    'symfony/service-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0|2.0',
      ),
    ),
    'symfony/stopwatch' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/string' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/symfony' => 
    array (
      'pretty_version' => 'v5.4.10',
      'version' => '5.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '1fa210d33a57b982305bae55ee81f6593b2299f6',
    ),
    'symfony/templating' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/translation' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/translation-contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.5.2',
      ),
    ),
    'symfony/translation-implementation' => 
    array (
      'provided' => 
      array (
        0 => '2.3',
      ),
    ),
    'symfony/twig-bridge' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/twig-bundle' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/uid' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/validator' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/var-dumper' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/var-exporter' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/web-link' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/web-profiler-bundle' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/workflow' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'symfony/yaml' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.4.10',
      ),
    ),
    'theseer/tokenizer' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '34a41e998c2183e22995f158c581e7b5e755ab9e',
    ),
    'tijsverkoyen/css-to-inline-styles' => 
    array (
      'pretty_version' => '2.2.4',
      'version' => '2.2.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'da444caae6aca7a19c0c140f68c6182e337d5b1c',
    ),
    'twig/twig' => 
    array (
      'pretty_version' => 'v3.4.1',
      'version' => '3.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e939eae92386b69b49cfa4599dd9bead6bf4a342',
    ),
    'vlucas/phpdotenv' => 
    array (
      'pretty_version' => 'v5.4.1',
      'version' => '5.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '264dce589e7ce37a7ba99cb901eed8249fbec92f',
    ),
    'voku/portable-ascii' => 
    array (
      'pretty_version' => '1.6.1',
      'version' => '1.6.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '87337c91b9dfacee02452244ee14ab3c43bc485a',
    ),
    'webklex/laravel-pdfmerger' => 
    array (
      'pretty_version' => '1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '20111ef19f3951f58c9b9c3b0615cb0ebdb08d66',
    ),
    'webmozart/assert' => 
    array (
      'pretty_version' => '1.11.0',
      'version' => '1.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '11cb2199493b2f8a3b53e7f19068fc6aac760991',
    ),
  ),
);
private static $canGetVendors;
private static $installedByVendor = array();







public static function getInstalledPackages()
{
$packages = array();
foreach (self::getInstalled() as $installed) {
$packages[] = array_keys($installed['versions']);
}


if (1 === \count($packages)) {
return $packages[0];
}

return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
}









public static function isInstalled($packageName)
{
foreach (self::getInstalled() as $installed) {
if (isset($installed['versions'][$packageName])) {
return true;
}
}

return false;
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

$ranges = array();
if (isset($installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = $installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['version'])) {
return null;
}

return $installed['versions'][$packageName]['version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getPrettyVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return $installed['versions'][$packageName]['pretty_version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getReference($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['reference'])) {
return null;
}

return $installed['versions'][$packageName]['reference'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getRootPackage()
{
$installed = self::getInstalled();

return $installed[0]['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
self::$installedByVendor = array();
}




private static function getInstalled()
{
if (null === self::$canGetVendors) {
self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
}

$installed = array();

if (self::$canGetVendors) {
foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
if (isset(self::$installedByVendor[$vendorDir])) {
$installed[] = self::$installedByVendor[$vendorDir];
} elseif (is_file($vendorDir.'/composer/installed.php')) {
$installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
}
}
}

$installed[] = self::$installed;

return $installed;
}
}

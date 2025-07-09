<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => '1.0.0+no-version-set',
    'version' => '1.0.0.0',
    'aliases' => 
    array (
    ),
    'reference' => NULL,
    'name' => 'garex/wp-testing',
  ),
  'versions' => 
  array (
    'broofa/node-uuid' => 
    array (
      'pretty_version' => 'v1.4.7',
      'version' => '1.4.7.0',
      'aliases' => 
      array (
      ),
      'reference' => '309512573ec1c60143c257157479a20f7f1f51cd',
    ),
    'composer/installers' => 
    array (
      'pretty_version' => 'v1.0.21',
      'version' => '1.0.21.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd64e23fce42a4063d63262b19b8e7c0f3b5e4c45',
    ),
    'flourish/flourish' => 
    array (
      'pretty_version' => '0.9.x-dev',
      'version' => '0.9.9999999.9999999-dev',
      'aliases' => 
      array (
      ),
      'reference' => '74d2d6af476ffe34171e807fa9517b69eda7ab2e',
    ),
    'garex/wp-testing' => 
    array (
      'pretty_version' => '1.0.0+no-version-set',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'nikic/php-parser' => 
    array (
      'pretty_version' => 'v0.9.5',
      'version' => '0.9.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ef70767475434bdb3615b43c327e2cae17ef12eb',
    ),
    'phpunit/php-code-coverage' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '21d0f05b8127057159eec4be79f8f8a92bc90957',
    ),
    'phpunit/php-file-iterator' => 
    array (
      'pretty_version' => '1.3.2',
      'version' => '1.3.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '46b0610951db3a918ee7842bc0d471e72c1d0d46',
    ),
    'phpunit/php-text-template' => 
    array (
      'pretty_version' => '1.1.2',
      'version' => '1.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '1da672430d58dcbb21139a018febe038d8500fd8',
    ),
    'phpunit/php-timer' => 
    array (
      'pretty_version' => '1.0.3',
      'version' => '1.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '5175e9bb35fc9cc430973ed83a3d62531c3c8698',
    ),
    'phpunit/php-token-stream' => 
    array (
      'pretty_version' => '1.1.4',
      'version' => '1.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dd11f1b0c071dc46fe711a7dd331db1b2179b9be',
    ),
    'phpunit/phpunit-mock-objects-php52' => 
    array (
      'pretty_version' => 'dev-1.1.0-php52',
      'version' => 'dev-1.1.0-php52',
      'aliases' => 
      array (
        0 => '9999999-dev',
      ),
      'reference' => '625622b0678d53aa47c6dc7e232e0171e2623d75',
    ),
    'phpunit/phpunit-php52' => 
    array (
      'pretty_version' => 'dev-3.6.12-php52',
      'version' => 'dev-3.6.12-php52',
      'aliases' => 
      array (
        0 => '9999999-dev',
      ),
      'reference' => '96cd6cf307d82a4458f0c0bf8fb695d21b1a6072',
    ),
    'roundcube/plugin-installer' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'ruckusing/ruckusing-migrations' => 
    array (
      'pretty_version' => '1.1.0.1',
      'version' => '1.1.0.1',
      'aliases' => 
      array (
      ),
      'reference' => 'issue/avoid-schema-constant',
    ),
    'samyk/evercookie' => 
    array (
      'pretty_version' => 'dev-2014-10-21',
      'version' => 'dev-2014-10-21',
      'aliases' => 
      array (
      ),
      'reference' => '977db236367c509ce6b10fb565ed5a75c8d729d5',
    ),
    'shama/baton' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'symfony/deprecation-contracts' => 
    array (
      'pretty_version' => 'v2.4.0',
      'version' => '2.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5f38c8804a9e97d23e0c8d63341088cd8a22d627',
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'v1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c6c942b1ac76c82448322025e084cadc56048b4e',
    ),
    'symfony/yaml' => 
    array (
      'pretty_version' => 'v5.2.7',
      'version' => '5.2.7.0',
      'aliases' => 
      array (
      ),
      'reference' => '76546cbeddd0a9540b4e4e57eddeec3e9bb444a5',
    ),
    'xrstf/composer-php52' => 
    array (
      'pretty_version' => 'v1.0.20',
      'version' => '1.0.20.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bd41459d5e27df8d33057842b32377c39e97a5a8',
    ),
    'yahnis-elsts/plugin-update-checker' => 
    array (
      'pretty_version' => 'v2.2',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '155eff79642bb9996eeb6ef33ac06db8d5629847',
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

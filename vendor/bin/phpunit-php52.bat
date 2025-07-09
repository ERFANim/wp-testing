@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../phpunit/phpunit-php52/composer/bin/phpunit-php52
php "%BIN_TARGET%" %*

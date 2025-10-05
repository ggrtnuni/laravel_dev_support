@echo off

@setlocal

rem check php commands
where php
if %ERRORLEVEL% neq 0 goto END
for /f "usebackq delims=" %%A in (`php -r "echo PHP_VERSION;"`) do set PHP_VERSION=%%A
echo ok php %PHP_VERSION%

set AUTHOR=ggrtnuni
set BASEDIR=%~dp0
set PRJNAME=%~n0

rem install composer
rem https://getcomposer.org/download/

pushd %BASEDIR%
if NOT EXIST "%BASEDIR%src" mkdir "%BASEDIR%src"
if NOT EXIST "%BASEDIR%bin" mkdir "%BASEDIR%bin"

pushd %BASEDIR%bin
if NOT EXIST "%BASEDIR%composer.phar" (
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'ed0feb545ba87161262f2d45a633e34f591ebb3381f2e0063c345ebea4d228dd0043083717770234ec00c5a9f9593792') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
)
popd
if NOT EXIST "%BASEDIR%bin\composer.phar" goto END
echo ok composer.phar

rem composer init
if NOT EXIST "%BASEDIR%bin\composer.json" (
    php bin/composer.phar init -n --name %AUTHOR%/%PRJNAME% --description %PRJNAME% --author %AUTHOR% -l MIT
)

rem require packages
rem ext-gd, ext-zip required
@REM php bin/composer.phar require phpoffice/phpspreadsheet --prefer-source
php bin/composer.phar require phpmyadmin/sql-parser
php bin/composer.phar require laravel/framework:^10.0 --dev
php bin/composer.phar require phpstan/phpstan --dev

:END

popd

@endlocal


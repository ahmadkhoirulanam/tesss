<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2c40ca34936c10df2901c2e89143ea14
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2c40ca34936c10df2901c2e89143ea14::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2c40ca34936c10df2901c2e89143ea14::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2c40ca34936c10df2901c2e89143ea14::$classMap;

        }, null, ClassLoader::class);
    }
}
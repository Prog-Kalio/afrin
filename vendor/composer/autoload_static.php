<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb2c9c1955756458b96f91cfe053882ba
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb2c9c1955756458b96f91cfe053882ba::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb2c9c1955756458b96f91cfe053882ba::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb2c9c1955756458b96f91cfe053882ba::$classMap;

        }, null, ClassLoader::class);
    }
}

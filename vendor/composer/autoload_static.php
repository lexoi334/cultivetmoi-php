<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf4e3c805af4fd3e0beb882316f04c6a7
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf4e3c805af4fd3e0beb882316f04c6a7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf4e3c805af4fd3e0beb882316f04c6a7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf4e3c805af4fd3e0beb882316f04c6a7::$classMap;

        }, null, ClassLoader::class);
    }
}

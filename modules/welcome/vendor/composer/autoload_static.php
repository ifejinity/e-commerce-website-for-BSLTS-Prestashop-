<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb79b64710a3e6cccaa86937fab10e5b4
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'OnBoarding\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'OnBoarding\\' => 
        array (
            0 => __DIR__ . '/../..' . '/OnBoarding',
        ),
    );

    public static $classMap = array (
        'OnBoarding\\Configuration' => __DIR__ . '/../..' . '/OnBoarding/Configuration.php',
        'OnBoarding\\OnBoarding' => __DIR__ . '/../..' . '/OnBoarding/OnBoarding.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb79b64710a3e6cccaa86937fab10e5b4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb79b64710a3e6cccaa86937fab10e5b4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb79b64710a3e6cccaa86937fab10e5b4::$classMap;

        }, null, ClassLoader::class);
    }
}
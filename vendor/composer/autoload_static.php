<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit59b42f719c0334cd16ee5a34834d9bd8
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Core\\Connection' => __DIR__ . '/../..' . '/app/Core/Connection.php',
        'App\\Core\\Querybuilder' => __DIR__ . '/../..' . '/app/Core/Querybuilder.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit59b42f719c0334cd16ee5a34834d9bd8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit59b42f719c0334cd16ee5a34834d9bd8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit59b42f719c0334cd16ee5a34834d9bd8::$classMap;

        }, null, ClassLoader::class);
    }
}

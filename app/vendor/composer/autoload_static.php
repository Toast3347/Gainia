<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbb69d82ca335e0e3d9daa186a902ca1e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Views\\' => 10,
            'App\\Services\\' => 13,
            'App\\Repositories\\' => 17,
            'App\\Models\\' => 11,
            'App\\Controllers\\' => 16,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Views\\' => 
        array (
            0 => __DIR__ . '/../..' . '/views',
        ),
        'App\\Services\\' => 
        array (
            0 => __DIR__ . '/../..' . '/services',
        ),
        'App\\Repositories\\' => 
        array (
            0 => __DIR__ . '/../..' . '/repositories',
        ),
        'App\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbb69d82ca335e0e3d9daa186a902ca1e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbb69d82ca335e0e3d9daa186a902ca1e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbb69d82ca335e0e3d9daa186a902ca1e::$classMap;

        }, null, ClassLoader::class);
    }
}

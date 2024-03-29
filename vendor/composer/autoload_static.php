<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc4140440b8a70d6b2c83b368afde3e54
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Php\\Primeiroprojeto\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Php\\Primeiroprojeto\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc4140440b8a70d6b2c83b368afde3e54::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc4140440b8a70d6b2c83b368afde3e54::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc4140440b8a70d6b2c83b368afde3e54::$classMap;

        }, null, ClassLoader::class);
    }
}

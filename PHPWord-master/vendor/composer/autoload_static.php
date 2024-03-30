<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6374145f617a7a30ffb1e8db985785d5
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpOffice\\PhpWord\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpOffice\\PhpWord\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/PhpWord',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6374145f617a7a30ffb1e8db985785d5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6374145f617a7a30ffb1e8db985785d5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6374145f617a7a30ffb1e8db985785d5::$classMap;

        }, null, ClassLoader::class);
    }
}

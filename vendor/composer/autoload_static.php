<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitea45e4cd61a17e2a2b2e22d5775d028a
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitea45e4cd61a17e2a2b2e22d5775d028a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitea45e4cd61a17e2a2b2e22d5775d028a::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitea45e4cd61a17e2a2b2e22d5775d028a::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitea45e4cd61a17e2a2b2e22d5775d028a::$classMap;

        }, null, ClassLoader::class);
    }
}

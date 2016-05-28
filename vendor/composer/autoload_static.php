<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbd26d209d8fbb58f8659d96b65747ac2
{
    public static $files = array (
        '33568736504faf4bcb473b36e556048a' => __DIR__ . '/..' . '/mclkim/kaiser/src/Helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Katzgrau\\KLogger\\' => 17,
            'Kaiser\\' => 7,
        ),
        'A' => 
        array (
            'Aura\\Web\\_Config\\' => 17,
            'Aura\\Web\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Katzgrau\\KLogger\\' => 
        array (
            0 => __DIR__ . '/..' . '/katzgrau/klogger/src',
        ),
        'Kaiser\\' => 
        array (
            0 => __DIR__ . '/..' . '/mclkim/kaiser/src',
        ),
        'Aura\\Web\\_Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/web/config',
        ),
        'Aura\\Web\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/web/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'V' => 
        array (
            'Viocon' => 
            array (
                0 => __DIR__ . '/..' . '/usmanhalalit/viocon/src',
            ),
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 
            array (
                0 => __DIR__ . '/..' . '/psr/log',
            ),
            'Pixie' => 
            array (
                0 => __DIR__ . '/..' . '/usmanhalalit/pixie/src',
            ),
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
        'C' => 
        array (
            'Crypt' => 
            array (
                0 => __DIR__ . '/..' . '/lancerhe/php-crypt/src',
            ),
        ),
    );

    public static $classMap = array (
        'Katzgrau\\KLogger\\Logger' => __DIR__ . '/..' . '/katzgrau/klogger/src/Logger.php',
        'Template_' => __DIR__ . '/..' . '/mclkim/kaiser/src/Template_/Template_.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbd26d209d8fbb58f8659d96b65747ac2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbd26d209d8fbb58f8659d96b65747ac2::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitbd26d209d8fbb58f8659d96b65747ac2::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitbd26d209d8fbb58f8659d96b65747ac2::$classMap;

        }, null, ClassLoader::class);
    }
}

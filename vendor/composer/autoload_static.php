<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit642212764181baa6fa6df95ca334255e
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/Twilio',
        ),
    );

    public static $prefixesPsr0 = array (
        'R' => 
        array (
            'Requests' => 
            array (
                0 => __DIR__ . '/..' . '/rmccue/requests/library',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit642212764181baa6fa6df95ca334255e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit642212764181baa6fa6df95ca334255e::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit642212764181baa6fa6df95ca334255e::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
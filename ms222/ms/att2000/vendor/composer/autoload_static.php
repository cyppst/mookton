<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit053cffde1702ba296fa9405c0fccd298
{
    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PicoDb' => 
            array (
                0 => __DIR__ . '/..' . '/fguillot/picodb/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit053cffde1702ba296fa9405c0fccd298::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}

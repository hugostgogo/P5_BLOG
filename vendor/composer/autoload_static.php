<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit352930101c1dc3fb72305f7934017105
{
    public static $prefixesPsr0 = array (
        'd' => 
        array (
            'dflydev\\markdown' => 
            array (
                0 => __DIR__ . '/..' . '/dflydev/markdown/src',
            ),
        ),
        'S' => 
        array (
            'Suin\\RSSWriter' => 
            array (
                0 => __DIR__ . '/..' . '/suin/php-rss-writer/Source',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit352930101c1dc3fb72305f7934017105::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit352930101c1dc3fb72305f7934017105::$classMap;

        }, null, ClassLoader::class);
    }
}
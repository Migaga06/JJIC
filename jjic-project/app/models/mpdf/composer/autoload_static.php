<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit90dde23635164132d6cb3a8da290bcfd
{
    public static $files = array (
        '6124b4c8570aa390c21fafd04a26c69f' => __DIR__ . '/..' . '/myclabs/deep-copy/src/DeepCopy/deep_copy.php',
        'db356362850385d08a5381de2638b5fd' => __DIR__ . '/..' . '/mpdf/mpdf/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'setasign\\Fpdi\\' => 14,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Message\\' => 17,
        ),
        'M' => 
        array (
            'Mpdf\\PsrLogAwareTrait\\' => 22,
            'Mpdf\\PsrHttpMessageShim\\' => 24,
            'Mpdf\\' => 5,
        ),
        'J' => 
        array (
            'James\\JjicProject\\' => 18,
        ),
        'D' => 
        array (
            'DeepCopy\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'setasign\\Fpdi\\' => 
        array (
            0 => __DIR__ . '/..' . '/setasign/fpdi/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Mpdf\\PsrLogAwareTrait\\' => 
        array (
            0 => __DIR__ . '/..' . '/mpdf/psr-log-aware-trait/src',
        ),
        'Mpdf\\PsrHttpMessageShim\\' => 
        array (
            0 => __DIR__ . '/..' . '/mpdf/psr-http-message-shim/src',
        ),
        'Mpdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/mpdf/mpdf/src',
        ),
        'James\\JjicProject\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'DeepCopy\\' => 
        array (
            0 => __DIR__ . '/..' . '/myclabs/deep-copy/src/DeepCopy',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit90dde23635164132d6cb3a8da290bcfd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit90dde23635164132d6cb3a8da290bcfd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit90dde23635164132d6cb3a8da290bcfd::$classMap;

        }, null, ClassLoader::class);
    }
}

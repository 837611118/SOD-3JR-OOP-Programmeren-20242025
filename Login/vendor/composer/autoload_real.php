<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit8d3e1ca3c3f7b2b51fa4094152f2222e
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit8d3e1ca3c3f7b2b51fa4094152f2222e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit8d3e1ca3c3f7b2b51fa4094152f2222e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit8d3e1ca3c3f7b2b51fa4094152f2222e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}

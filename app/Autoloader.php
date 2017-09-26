<?php
/**
 * class Autoloader.php
 *
 * @project   vcv-trainings
 * @author    Sébastien RINGOT
 * @date      26/09/17
 */

declare(strict_types=1);

namespace App;

class Autoloader
{
    /**
     * Register the autoloader
     */
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    /**
     * Include the file corresponding to the classname
     *
     * @param string $className
     */
    public static function autoload(string $className)
    {
        if (strpos($className, __NAMESPACE__.'\\') === 0) {
            $className = str_replace(__NAMESPACE__.'\\', '', $className);
            $className = str_replace('\\', '/', $className);
            require __DIR__.'/'.$className.'.php';
        }
    }
}

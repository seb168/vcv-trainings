<?php
/**
 * class Config.php
 *
 * @project   vcv-trainings
 * @author    Sébastien RINGOT
 * @date      26/09/17
 */

declare(strict_types=1);

namespace App;

class Config
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @var array
     */
    private $settings = [];

    /**
     * Config constructor.
     */
    public function __construct()
    {
        require __DIR__.'/config/parameters.yml';
    }

    /**
     * Retrieve the instance of the config (singleton)
     *
     * @return mixed
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    /**
     * retrieve a value from the config by the key passed
     *
     * @param string $key
     *
     * @return mixed|null
     */
    public function get(string $key)
    {
        if (!isset($this->settings[$key])) {
            return null;
        }

        return $this->settings[$key];
    }
}

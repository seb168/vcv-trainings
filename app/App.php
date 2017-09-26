<?php
/**
 * class App.php
 *
 * @project   vcv-trainings
 * @author    Sébastien RINGOT
 * @date      26/09/17
 */

declare(strict_types=1);

namespace App;

use App\Database\MysqlDatabase;

class App
{
    /**
     * @var App
     */
    private static $instance;
    /**
     * @var string
     */
    public $title = "My website";
    /**
     * @var MysqlDatabase
     */
    private $dbInstance;

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new App();
        }

        return self::$instance;
    }

    public function getRepository($name)
    {
        $class_name = '\\src\\Repository\\'.ucfirst($name).'Repository';
        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        $config = Config::getInstance();
        if (is_null($this->dbInstance)) {
            $this->dbInstance = new MysqlDatabase(
                $config->get('db_name'),
                $config->get('db_user'),
                $config->get('db_pass'),
                $config->get('db_host')
            );
        }

        return $this->dbInstance;
    }


}

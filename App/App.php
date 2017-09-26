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

class App
{

    const DB_NAME     = 'database';
    const DB_USER     = 'root';
    const DB_PASSWORD = 'root';
    const DB_HOST     = 'localhost';

    /**
     * @var Database
     */
    private static $database;

    /**
     * @var string
     */
    private static $title = 'my site';

    public static function getDb(): Database
    {
        if (self::$database == null) {
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASSWORD, self::DB_HOST);
        }

        return self::$database;
    }

    public static function createNotFoundException(string $message = '')
    {
        // TODO: mieux que ça
        header("HTTP/1.0 404 not Found");
        header('Location:index.php?p=404');
    }

    /**
     * @return string
     */
    public static function getTitle(): string
    {
        return self::$title;
    }

    /**
     * @param string $title
     */
    public static function setTitle(string $title)
    {
        self::$title = self::$title.' | '.$title;
    }


}

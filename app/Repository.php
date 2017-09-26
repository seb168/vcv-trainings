<?php
/**
 * class Repository.php
 *
 * @project   vcv-trainings
 * @author    Sébastien RINGOT
 * @date      26/09/17
 */

declare(strict_types=1);

namespace App;

/**
 * Class Repository
 *
 * Extend this class to get base queries for your repositories, see example.php
 *
 * @package App\Repository
 */
class Repository implements RepositoryInterface
{

    protected static $table;

    /**
     * return all the data of the table
     *
     * @return array
     */
    public static function findAll()
    {
        return App::getDb()->query("SELECT * FROM ".static::$table, get_called_class());
    }

    /**
     * return a result for a given id
     *
     * @param $id
     *
     * @return array
     */
    public static function find(int $id)
    {
        return App::getDb()->prepare("
        SELECT * FROM ".static::$table."
        WHERE id = ?
        ", [$id], get_called_class(), true);
    }

    /**
     * return an array of results for the given query
     *
     * @param string $statement
     * @param array  $attributes
     * @param bool   $singleResults
     *
     * @return array
     */
    public static function query(string $statement, array $attributes = [], bool $singleResults = false): array
    {
        if (empty($attributes)) {
            return App::getDb()->query($statement, get_called_class(), $singleResults);
        } else {
            return App::getDb()->prepare($statement, $attributes, get_called_class(), $singleResults);
        }
    }
}

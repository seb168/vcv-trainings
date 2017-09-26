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

use App\Database\Database;

/**
 * Class Repository
 *
 * Extend this class to get base queries for your repositories, see example.php
 *
 * @package App\Repository
 */
class Repository implements RepositoryInterface
{
    /**
     * @var string
     */
    protected $table;
    /**
     * @var Database
     */
    protected $database;

    /**
     * Repository constructor.
     *
     * @param $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
        if (is_null($this->table)) {
            $folders     = explode('\\', get_class($this));
            $className   = end($folders);
            $this->table = strtolower(str_replace('Repository', '', $className));
        }
    }


    /**
     * return all the data of the table
     *
     * @return array
     */
    public function findAll(): array
    {
        return $this->database->query("SELECT * FROM ".$this->table, get_called_class());
    }

    /**
     * return a result for a given id
     *
     * @param $id
     *
     * @return array
     */
    public function find(int $id)
    {
        return $this->database->prepare("
        SELECT * FROM ".$this->table."
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
    public function query(string $statement, array $attributes = [], bool $singleResults = false): array
    {
        if (empty($attributes)) {
            return $this->database->query($statement, get_called_class(), $singleResults);
        } else {
            return $this->database->prepare($statement, $attributes, get_called_class(), $singleResults);
        }
    }
}

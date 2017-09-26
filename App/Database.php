<?php
/**
 * class Database.php
 *
 * @project   vcv-trainings
 * @author    Sébastien RINGOT
 * @date      26/09/17
 */

declare(strict_types=1);

namespace App;

use \PDO;

class Database
{
    /**
     * @var string
     */
    private $dbName;
    /**
     * @var string
     */
    private $dbUser;
    /**
     * @var string
     */
    private $dbPassword;
    /**
     * @var string
     */
    private $dbHost;
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * Database constructor.
     *
     * @param $dbName
     * @param $dbUser
     * @param $dbPassword
     * @param $dbHost
     */
    public function __construct(
        string $dbName,
        string $dbUser = 'root',
        string $dbPassword = 'root',
        string $dbHost = 'localhost'
    ) {
        $this->dbName     = $dbName;
        $this->dbUser     = $dbUser;
        $this->dbPassword = $dbPassword;
        $this->dbHost     = $dbHost;
    }

    /**
     * execute a query and return the result as an array containing object of class 'className'
     *
     * @param string $statement
     * @param string $className
     * @param bool   $singleResult
     *
     * @return array
     */
    public function query(string $statement, string $className, bool $singleResult = false): array
    {
        $request = $this->getPDO()->query($statement);
        $request->setFetchMode(PDO::FETCH_CLASS, $className);

        if ($singleResult) {
            $results = $request->fetch();
        } else {
            $results = $request->fetchAll();
        }

        return $results;
    }

    /**
     * execute a prepared query and return the result as an array containing object of class 'className'
     *
     * @param string $statement
     * @param array  $attributes
     * @param string $className
     * @param bool   $singleResult
     *
     * @return array
     */
    public function prepare(string $statement, array $attributes, string $className, bool $singleResult = false): array
    {
        $request = $this->getPDO()->prepare($statement);
        $request->execute($attributes);
        $request->setFetchMode(PDO::FETCH_CLASS, $className);

        if ($singleResult) {
            $results = $request->fetch();
        } else {
            $results = $request->fetchAll();
        }

        return $results;
    }

    /**
     *
     * @return PDO
     */
    private function getPDO(): PDO
    {
        if ($this->pdo === null) {
            $pdo = new PDO("mysql:dbname={$this->dbName};host={$this->dbHost}", $this->dbUser, $this->dbPassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }
}

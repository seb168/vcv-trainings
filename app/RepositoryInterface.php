<?php
/**
 * class RepositoryInterface.php
 *
 * @project   vcv-trainings
 *
 * @author    WebScrumTeam <scrumteam@skores.com>
 *
 * @date      26/09/17
 * @time      11:39
 * @copyright 2017 skores - All Rights Reserved
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
interface RepositoryInterface
{
    /**
     * return all the data of the table
     *
     * @return array
     */
    public static function findAll(): array;

    /**
     * return a result for a given id
     *
     * @param $id
     *
     * @return array
     */
    public static function find(int $id);

    /**
     * return an array of results for the given query
     *
     * @param string $statement
     * @param array  $attributes
     * @param bool   $singleResults
     *
     * @return array
     */
    public static function query(string $statement, array $attributes = [], bool $singleResults = false): array;
}

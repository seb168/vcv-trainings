<?php
/**
 * class DatabaseInterface.php
 *
 * @project   vcv-trainings
 *
 * @author    WebScrumTeam <scrumteam@skores.com>
 *
 * @date      26/09/17
 * @time      12:44
 * @copyright 2017 skores - All Rights Reserved
 */

namespace App;

interface DatabaseInterface
{
    /**
     * execute a query and return the result as an array containing object of class 'className'
     *
     * @param string $statement
     * @param string $className
     * @param bool   $singleResult
     *
     * @return array
     */
    public function query(string $statement, string $className, bool $singleResult = false): array;

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
    public function prepare(string $statement, array $attributes, string $className, bool $singleResult = false): array;
}

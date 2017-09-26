<?php
/**
 * class ExampleEntityInterface.php
 *
 * @project   vcv-trainings
 *
 * @author    WebScrumTeam <scrumteam@skores.com>
 *
 * @date      26/09/17
 * @time      11:45
 * @copyright 2017 skores - All Rights Reserved
 */

namespace VcvTrainings\Entity;

interface ExampleEntityInterface
{
    /**
     * @return string
     */
    public function getExample(): string;

    /**
     * @param string $example
     */
    public function setExample(string $example);
}

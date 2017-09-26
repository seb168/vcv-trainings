<?php
/**
 * class ExampleEntity.php
 *
 * @project   vcv-trainings
 * @author    Sébastien RINGOT
 * @date      26/09/17
 */

declare(strict_types=1);

namespace VcvTrainings\Entity;

class ExampleEntity implements ExampleEntityInterface
{
    /**
     * @var string
     */
    private $example;

    /**
     * ExampleEntity constructor.
     *
     * @param string $example
     */
    public function __construct(string $example)
    {
        $this->example = $example;
    }

    /**
     * @return string
     */
    public function getExample(): string
    {
        return $this->example;
    }

    /**
     * @param string $example
     */
    public function setExample(string $example)
    {
        $this->example = $example;
    }
}

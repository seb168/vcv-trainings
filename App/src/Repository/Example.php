<?php
/**
 * class Example.php
 *
 * @project   vcv-trainings
 * @author    Sébastien RINGOT
 * @date      26/09/17
 */

declare(strict_types=1);
namespace VcvTrainings\Repository;

use App\Repository;

class Example extends Repository
{

    protected static $table = 'example';


    public static function findByFoo(int $id){
        // some code
    }
}

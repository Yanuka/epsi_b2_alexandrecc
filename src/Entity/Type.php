<?php

namespace App\Entity;

class Type 
{

    const TYPE_FIRE = 1;
    const TYPE_WATER = 2;
    const TYPE_PLANT = 3;
    const TYPE_NORMAL = 4;

    public function strongAgainst($typeATK, $typeDEF)
    {
        if($typeATK === self::TYPE_WATER) {
            return (self::TYPE_FIRE === $typeDEF) ? true : false;
        }

        elseif($typeATK === self::TYPE_FIRE) {
            return (self::TYPE_PLANT === $typeDEF) ? true : false;
        }

        elseif($typeATK === self::TYPE_PLANT) {
            return (self::TYPE_WATER === $typeDEF) ? true : false;
        }
    }

    public function weakAgainst()
    {
        if($typeATK === self::TYPE_FIRE) {
            return (self::TYPE_WATER === $typeDEF) ? true : false;
        }

        elseif($typeATK === self::TYPE_PLANT) {
            return (self::TYPE_FIRE === $typeDEF) ? true : false;
        }

        elseif($typeATK === self::TYPE_WATER) {
            return (self::TYPE_PLANT === $typeDEF) ? true : false;
        }
    }
}





?>
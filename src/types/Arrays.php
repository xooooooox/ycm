<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/26 0026
 * Time: 18:16
 */

namespace xooooooox\ycm\types;


/**
 * Class Arrays
 * @package xooooooox\ycm\types
 */
class Arrays
{

    /**
     * @param array $array
     * @return bool
     */
    public static function IsIndexArray($array){
        if (!is_array($array)){
            return false;
        }
        $keys = array_keys($array);
        return $keys === array_keys($keys);
    }

}
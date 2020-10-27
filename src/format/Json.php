<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/26 0026
 * Time: 18:52
 */

namespace xooooooox\ycm\format;


/**
 * Class Json
 * @package xooooooox\ycm\format
 */
class Json
{

    /**
     * @param string $str
     * @return bool
     */
    public static function IsJson($str){
        $decode = json_decode($str,true);
        if (is_array($decode)){
            return true;
        }
        return false;
    }

}
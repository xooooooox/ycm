<?php
/**
 * Created by PhpStorm
 * User: xooooooox
 * Date: 2020/10/28 0028
 * Time: 11:33
 */

namespace xooooooox\ycm\helper;


/**
 * Class Integers
 * @package xooooooox\ycm\helper
 */
class Integers
{

    /**
     * 在整型值前面填充'0' PaddingZero(9,2) => '09'; PaddingZero(100,5) => '00100'
     * @param int $value
     * @param int $length
     * @return string
     */
    public static function PaddingZero($value = 0, $length = 2){
        return sprintf('%0'.(string)$length.'s', $value);
    }

}

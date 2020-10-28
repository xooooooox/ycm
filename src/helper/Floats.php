<?php
/**
 * Created by PhpStorm
 * User: xooooooox
 * Date: 2020/10/28 0028
 * Time: 17:28
 */

namespace xooooooox\ycm\helper;


/**
 * Class Floats
 * @package xooooooox\ycm\helper
 */
class Floats
{

    /**
     * 格式化浮点数(超出浮点数的范围无效)
     * return for example: 0, 0.01, 0.1, 1, 1.01, 1.1, 1234567890, 1234567890.01, 1234567890.1, 1234567890.001, 1234567890.01
     * @param float $number
     * @param int $decimals
     * @return float
     */
    public static function Format($number = 0.0, $decimals = 2){
        return (float)sprintf('%.'.$decimals.'f', $number);
        // return (float)number_format($number, $decimals,'.','');
    }

}
<?php
/**
 * Created by PhpStorm
 * User: xooooooox
 * Date: 2020/10/28 0028
 * Time: 17:13
 */

namespace xooooooox\ycm\helper;


/**
 * Class Distances
 * @package xooooooox\ycm\helper
 */
class Distances
{

    /**
     * 计算地球上两个位置之间的距离,返回结果(单位:米)
     * @param float $lng1
     * @param float $lat1
     * @param float $lng2
     * @param float $lat2
     * @return float
     */
    public static function Earth($lng1 = 0.0, $lat1 = 0.0, $lng2 = 0.0, $lat2 = 0.0){
        $radLat1 = deg2rad($lat1);
        $radLat2 = deg2rad($lat2);
        $radLng1 = deg2rad($lng1);
        $radLng2 = deg2rad($lng2);
        $a = $radLat1 - $radLat2;
        $b = $radLng1 - $radLng2;
        $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2))) * 6378.137 * 1000;
        return floatval($s);
    }

}
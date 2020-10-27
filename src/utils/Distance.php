<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/26 0026
 * Time: 18:51
 */

namespace xooooooox\ycm\utils;


/**
 * Class Distance
 * @package xooooooox\ycm\utils
 */
class Distance
{

    /**
     * settle the distance between two locations
     * unit: meters
     * @param float $lng1
     * @param float $lat1
     * @param float $lng2
     * @param float $lat2
     * @return float
     */
    public static function Count($lng1, $lat1, $lng2, $lat2){
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
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/26 0026
 * Time: 18:35
 */

namespace xooooooox\ycm\types;


/**
 * Class Strings
 * @package xooooooox\ycm\types
 */
class Strings
{

    /**
     * @param int $length
     * @param string $chars
     * @return string
     */
    public static function Random($length, $chars){
        $length = (int)$length < 1 ? 6 : (int)$length;
        $chars = strlen($chars) < 2 ? static::Number() : (string)$chars;
        $str = '';
        $len = strlen($chars);
        for($i=0;$i<$length;$i++){
            $str .= $chars[mt_rand(0,$len-1)];
        }
        return $str;
    }

    /**
     * @return string
     */
    public static function Letter(){
        return 'abcdefghijklmnopqrstuvwzyxABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    /**
     * @return string
     */
    public static function LetterLower(){
        return 'abcdefghijklmnopqrstuvwzyx';
    }

    /**
     * @return string
     */
    public static function LetterUpper(){
        return 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    /**
     * @return string
     */
    public static function Number(){
        return '0123456789';
    }

    /**
     * @param bool $punctuate
     * @return string
     */
    public static function Symbol($punctuate){
        $result = '!@#$%^&*()_+-=';
        if($punctuate){
            $result = $result.'[]{};:,./<>?\|';
        }
        return $result;
    }

}
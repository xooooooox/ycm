<?php
/**
 * Created by PhpStorm
 * User: xooooooox
 * Date: 2020/10/28 0028
 * Time: 10:58
 */

namespace xooooooox\ycm\helper;


/**
 * Class Strings
 * @package xooooooox\ycm\helper
 */
class Strings
{

    /**
     * 获取一个随机字符串
     * @param int $length
     * @param string $chars
     * @return string
     */
    public static function Random($length = 6, $chars = ''){
        $length = $length < 1 ? 6 : $length;
        $chars = strlen($chars) < 2 ? self::Number() : $chars;
        $result = '';
        $len = strlen($chars);
        for($i=0;$i<$length;$i++){
            $result .= $chars[mt_rand(0,$len-1)];
        }
        return $result;
    }

    /**
     * 字母字符串
     * @return string
     */
    public static function Letter(){
        return 'abcdefghijklmnopqrstuvwzyxABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    /**
     * 小写字母字符串
     * @return string
     */
    public static function LetterLower(){
        return 'abcdefghijklmnopqrstuvwzyx';
    }

    /**
     * 大写字母字符串
     * @return string
     */
    public static function LetterUpper(){
        return 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    /**
     * 数字字符串
     * @return string
     */
    public static function Number(){
        return '0123456789';
    }

    /**
     * 符号字符串 $punctuate:是否包含标点符号
     * @param bool $punctuate
     * @return string
     */
    public static function Symbol($punctuate = false){
        $result = '!@#$%^&*()_+-=';
        if($punctuate){
            $result .= '[]{};:,./<>?\|`~';
        }
        return $result;
    }

}
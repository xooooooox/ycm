<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/18
 * Time: 11:46
 */

namespace xooooooox\awe;


/**
 * Class Common
 * @package xooooooox\boxes
 */
class Common
{

    /**
     * @param int $length
     * @param string $chars
     * @return string
     */
    public static function Rand(int $length,string $chars) : string {
        if(!is_int($length) || $length < 1){
            $length = 6;
        }
        $str = '';
        if (strlen($chars) < 2){
            $chars = static::NumberString();
        }
        for($i=0;$i<$length;$i++){
            $str .= $chars[mt_rand(0,strlen($chars)-1)];
        }
        return $str;
    }

    /**
     * @return string
     */
    public static function LetterString() : string {
        return 'abcdefghijklmnopqrstuvwzyxABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    /**
     * @return string
     */
    public static function LetterLowerString() : string {
        return 'abcdefghijklmnopqrstuvwzyx';
    }

    /**
     * @return string
     */
    public static function LetterUpperString() : string {
        return 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    /**
     * @return string
     */
    public static function NumberString() : string {
        return '0123456789';
    }

    /**
     * @param bool $punctuate
     * @return string
     */
    public static function SymbolString(bool $punctuate) : string {
        if($punctuate){
            return '!@#$%^&*()_+-=,./;[]`<>?:\{}~';
        }
        return '!@#$%^&*()_+-=';
    }
    
    /**
     * settle the distance between two locations
     * unit: meters
     * @param float $lng1
     * @param float $lat1
     * @param float $lng2
     * @param float $lat2
     * @return float
     */
    public static function Distance(float $lng1,float $lat1,float $lng2,float $lat2) : float {
        $radLat1 = deg2rad($lat1);
        $radLat2 = deg2rad($lat2);
        $radLng1 = deg2rad($lng1);
        $radLng2 = deg2rad($lng2);
        $a = $radLat1 - $radLat2;
        $b = $radLng1 - $radLng2;
        $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2))) * 6378.137 * 1000;
        return floatval($s);
    }

    /**
     * @param string $str
     * @return bool
     */
    public static function IsJson(string $str) : bool {
        if(is_array(json_decode($str,true))){
            return true;
        }
        return false;
    }

    /**
     * @param string $str
     * @return bool
     */
    public static function IsXml(string $str) : bool {
        $xml_parser = xml_parser_create();
        if(xml_parse($xml_parser,$str,true)){
            xml_parser_free($xml_parser);
            return true;
        }
        return false;
    }

    /**
     * @param array $data
     * @param bool $isChild
     * @return string
     */
    public static function ArrayToXml(array $data,bool $isChild) : string {
        $str = '';
        if(!$isChild) {
            $str .= '<xml>';
        }
        foreach($data as $key => $val) {
            if(is_array($val)) {
                $str .= '<'.$key.'>'.static::ArrayToXml($val, true).'</'.$key.'>';
            } elseif(is_numeric($val)) {
                $str .= '<'.$key.'>'.$val.'</'.$key.'>';
            }else{
                $str .= '<'.$key.'><![CDATA['.$val.']]></'.$key.'>';
            }
        }
        if(!$isChild) {
            $str .= '</xml>';
        }
        return $str;
    }

    /**
     * @param string $xml
     * @return array
     */
    public static function XmlToArray(string $xml) : array {
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        if (!is_array($values)){
            return [];
        }
        return (array)$values;
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/26 0026
 * Time: 18:54
 */

namespace xooooooox\ycm\format;


/**
 * Class Xml
 * @package xooooooox\ycm\format
 */
class Xml
{

    /**
     * @param string $str
     * @return bool
     */
    public static function IsXml($str){
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
    public static function ArrayToXml($data,$isChild){
        $str = '';
        if(!$isChild){
            $str .= '<xml>';
        }
        foreach($data as $key => $val){
            if(is_array($val)){
                $str .= '<'.$key.'>'.static::ArrayToXml($val, true).'</'.$key.'>';
            } elseif(is_numeric($val)){
                $str .= '<'.$key.'>'.$val.'</'.$key.'>';
            }else{
                $str .= '<'.$key.'><![CDATA['.$val.']]></'.$key.'>';
            }
        }
        if(!$isChild){
            $str .= '</xml>';
        }
        return $str;
    }

    /**
     * @param string $xml
     * @return array
     */
    public static function XmlToArray($xml){
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        if (!is_array($values)){
            return [];
        }
        return (array)$values;
    }

}
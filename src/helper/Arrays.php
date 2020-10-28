<?php
/**
 * Created by PhpStorm
 * User: xooooooox
 * Date: 2020/10/28 0028
 * Time: 10:55
 */

namespace xooooooox\ycm\helper;


/**
 * Class Arrays
 * @package xooooooox\ycm\helper
 */
class Arrays
{

    /**
     * 判断数组是否是索引数组, 如果是多维数组则判断最外层
     * @param $array
     * @return bool
     */
    public static function IsIndexArray($array = []){
        if ($array === [] || is_null($array)){
            return false;
        }
        $keys = array_keys($array);
        return $keys === array_keys($keys);
    }

    /**
     * 无限极分类(树状图); $data 如: [['id'=>1,'pid'=>0,'name'=>'Jack'], ...]
     * 1. $data must be a index array
     * 2. <id> and <pid> key name must exist in every assoc array object of $data[$i]
     * @param array $data
     * @return array
     */
    public static function Tree($data = []){
        list($id, $pid, $children) = ['id', 'pid', 'children'];
        if (!self::IsIndexArray($data) || !isset($data[0][$id]) || !isset($data[0][$pid])){
            return $data;
        }
        $items = [];
        foreach($data as $v){
            $items[$v[$id]] = $v;
        }
        $tree = [];
        foreach($items as $k => $v){
            if(isset($items[$v[$pid]])){
                $items[$v[$pid]][$children][] = &$items[$k];
            }else{
                $tree[] = &$items[$k];
            }
        }
        return $tree;
    }

}

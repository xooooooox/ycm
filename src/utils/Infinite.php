<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/26 0026
 * Time: 18:45
 */

namespace xooooooox\ycm\utils;

use xooooooox\ycm\types\Arrays;


/**
 * Class Infinite
 * @package xooooooox\ycm\utils
 */
class Infinite
{

    /**
     * @param array $data
     * @param string $id
     * @param string $pid
     * @param string $sons
     * @return array
     */
    public static function Tree($data, $id, $pid, $sons){
        $id = $id === '' ? 'id' : (string)$id;
        $pid = $pid === '' ? 'pid' : (string)$pid;
        if (!Arrays::IsIndexArray($data) || !isset($data[0][$id]) || !isset($data[0][$pid])){
            return [];
        }
        $sons = $sons === '' ? 'sons' : (string)$sons;
        $items = [];
        foreach($data as $v){
            $items[$v[$id]] = $v;
        }
        $tree = [];
        foreach($items as $k => $v){
            if(isset($items[$v[$pid]])){
                $items[$v[$pid]][$sons][] = &$items[$k];
            }else{
                $tree[] = &$items[$k];
            }
        }
        return $tree;
    }

}
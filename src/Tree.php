<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/18
 * Time: 9:59
 */

namespace xooooooox\awe;


/**
 * Class Tree
 * @package xooooooox\boxes
 */
class Tree
{

    /**
     * flat data structure to tree structure
     * @param array $array [["id"=>1,"name"=>"","parent"=>0],["id"=>2,"name"=>"","parent"=>1],["id"=>3,"name"=>"","parent"=>2]...]
     * @param string $id id
     * @param string $parent parent
     * @param string $children children
     * @return array [["id"=>1,"name"=>"","parent"=>0,"children"=>[["id"=>2,"name"=>"","parent"=>1,"children"=>[["id"=>3,"name"=>"","parent"=>2],...]],...]],...]
     */
    public static function Infinite(array $array,string $id,string $parent,string $children) : array {
        if ($array == []){
            return $array;
        }
        if ($id == ''){
            $id = 'id';
        }
        if ($parent == ''){
            $parent = 'parent';
        }
        if ($children == ''){
            $children = 'children';
        }
        $items = [];
        foreach($array as $v){
            $items[$v[$id]] = $v;
        }
        $tree = [];
        foreach($items as $k => $v){
            if(isset($items[$v[$parent]])) {
                $items[$v[$parent]][$children][] = &$items[$k];
            } else {
                $tree[] = &$items[$k];
            }
        }
        return $tree;
    }

}

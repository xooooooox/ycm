<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/19
 * Time: 13:28
 */

namespace xooooooox\awe;


/**
 * Class ApiDocument
 * @package xooooooox\boxes
 */
class ApiDocument
{

    /**
     * [["id":1,"name":"register","title":"register"],["id":2,"name":"login","title":"login"],["id":3,"name":"retrieve_password","title":"retrieve password"]]
     * |id|name|title|
     * |:---|:---|:---|
     * |1|register|register|
     * |2|login|login|
     * |3|retrieve_password|retrieve password|
     * @param array $result
     * @return string
     */
    public static function MarkdownTableString(array $result) : string {
        $rows = count($result);
        if ($rows < 1){
            return '';
        }
        // markdown table need symbol
        $vl = '|';
        $ts = ':---';
        $pe = PHP_EOL;
        // head
        $head = $vl.implode($vl,array_keys($result[0])).$vl.$pe;
        // title
        $title = '';
        $columns = count($result[0]);
        while($columns > 0){
            $title .= $vl.$ts;
            $columns--;
        }
        $title .= $vl.$pe;
        // body
        $body = '';
        for ($i=0;$i<$rows;$i++){
            foreach ($result[$i] as $k => $v){
                $body .= $vl;
                if (!is_string($v)){
                    $v = (string)$v;
                }
                // empty string, using space placeholders to prevent markdown syntax from causing the next column of data in the table to move left to the current column
                if ($v == ''){
                    $v = ' ';
                }
                $body .= $v;
            }
            $body .= $vl.$pe;
        }
        return $head.$title.$body.$pe;
    }

}
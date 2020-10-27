<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/26 0026
 * Time: 18:44
 */

namespace xooooooox\ycm\time;


/**
 * Class Time
 * @package xooooooox\ycm\time
 */
class Time
{

    /**
     * @return float
     */
    public static function MilliSecondUnix(){
        list($t1,$t2) = explode(' ', microtime());
        return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
    }

    /**
     * @param int $timestamp
     * @param string $format
     * @return string
     */
    public static function IntToString($timestamp,$format){
        $timestamp = $timestamp < 0 ? time() : (int)$timestamp;
        $format = strlen($format) < 1 ? 'Y-m-d H:i:s' : (string)$format;
        $result = date($format,$timestamp);
        if (is_bool($result)){
            return '';
        }
        return (string)$result;
    }

    /**
     * @param string $str
     * @return int
     */
    public static function StringToInt($str){
        $result = strtotime($str);
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function TodayStartUnix(){
        $result = mktime(0,0,0, date('m'), date('d'), date('Y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function TodayEndUnix(){
        $result = mktime(23,59,59, date('m'), date('d'), date('Y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function YesterdayStartUnix(){
        return static::TodayStartUnix() - 86400;
    }

    /**
     * @return int
     */
    public static function LastWeekStartUnix(){
        $result = mktime(0,0,0, date('m'),date('d') - date('w') + 1 - 7, date('Y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function LastWeekEndUnix(){
        $result = mktime(23,59,59, date('m'),date('d') - date('w') + 7 - 7, date('Y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisWeekStartUnix(){
        $result = mktime(0,0,0, date('m'),date('d') - date('w') + 1, date('y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisWeekEndUnix(){
        return static::ThisWeekStartUnix() + 604800 - 1;
    }

    /**
     * @return int
     */
    public static function LastMonthStartUnix(){
        $result = mktime(0, 0 , 0,date('m') - 1,1, date('Y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisMonthStartUnix(){
        $result = mktime(0,0,0, date('m'),1, date('Y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisMonthEndUnix(){
        $result = mktime(23,59,59, date('m'), date('t'), date('Y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function LastQuarterStartUnix(){
        $quarter = ceil((date('n')) / 3) - 1;
        $result = mktime(0, 0, 0,$quarter * 3 - 3 + 1,1, date('Y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function LastQuarterEndUnix(){
        $quarter = ceil((date('n')) / 3) - 1;
        $result = mktime(23,59,59,$quarter * 3, date('t', mktime(0, 0 , 0,$quarter * 3,1, date('Y'))), date('Y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisQuarterStartUnix(){
        $quarter = ceil((date('n')) / 3);
        $result = mktime(0, 0, 0,$quarter * 3 - 3 + 1,1, date('Y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisQuarterEndUnix(){
        $quarter = ceil((date('n')) / 3);
        $result = mktime(23,59,59,$quarter * 3, date('t', mktime(0, 0 , 0,$quarter * 3,1, date('Y'))), date('Y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function NextQuarterStartUnix(){
        $quarter = ceil((date('n')) / 3) + 1;
        $result = mktime(0, 0, 0,$quarter * 3 - 3 + 1,1, date('Y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function NextQuarterEndUnix(){
        $quarter = ceil((date('n')) / 3) + 1;
        $result = mktime(23,59,59,$quarter * 3, date('t', mktime(0, 0 , 0,$quarter * 3,1, date('Y'))), date('Y'));
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisYearStartUnix(){
        $result = strtotime(date('Y', time()).'-1'.'-1');
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisYearEndUnix(){
        $result = strtotime(date('Y', time()).'-12-31 23:59:59');
        if (is_bool($result)){
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function NowUntilTomorrowStartSeconds(){
        return (int)(strtotime(date('Y-m-d')) + 86400) - time();
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public static function Year($timestamp){
        return (string)date('Y',0 === $timestamp ? time() : $timestamp);
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public static function Month($timestamp){
        $v = intval(date('m',0 === $timestamp ? time() : $timestamp));
        return $v < 10 ? '0'.$v : (string)$v;
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public static function Day($timestamp){
        $v = intval(date('d',0 === $timestamp ? time() : $timestamp));
        return $v < 10 ? '0'.$v : (string)$v;
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public static function Hour($timestamp){
        $v = intval(date('H',0 === $timestamp ? time() : $timestamp));
        return $v < 10 ? '0'.$v : (string)$v;
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public static function Minute($timestamp){
        $v = intval(date('i',0 === $timestamp ? time() : $timestamp));
        return $v < 10 ? '0'.$v : (string)$v;
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public static function Second($timestamp){
        $v = intval(date('s',0 === $timestamp ? time() : $timestamp));
        return $v < 10 ? '0'.$v : (string)$v;
    }

}
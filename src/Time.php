<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/18
 * Time: 11:53
 */

namespace xooooooox\awe;


/**
 * Class Time
 * @package xooooooox\awe
 */
class Time
{

    /**
     * @return float
     */
    public static function MilliSecondUnix() : float {
        list($t1,$t2) = explode(' ', microtime());
        return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
    }

    /**
     * @param int $timestamp
     * @param string $format
     * @return string
     */
    public static function IntToString(int $timestamp,string $format) : string {
        if($timestamp < 0) {
            $timestamp = time();
        }
        if (strlen($format) < 1){
            $format = 'Y-m-d H:i:s';
        }
        $result = date($format,$timestamp);
        if (is_bool($result)) {
            return '';
        }
        return (string)$result;
    }

    /**
     * @param string $str
     * @return int
     */
    public static function StringToInt(string $str) : int {
        $result = strtotime($str);
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function TodayStartUnix() : int {
        $result = mktime(0,0,0,date('m'),date('d'),date('Y'));
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function TodayEndUnix() : int {
        return self::TodayStartUnix() + 86400;
    }

    /**
     * @return int
     */
    public static function YesterdayStartUnix() : int {
        return self::TodayStartUnix() - 86400;
    }

    /**
     * @return int
     */
    public static function LastWeekStartUnix() : int {
        $result = mktime(0,0,0,date('m'),date('d')-date('w')+1-7,date('Y'));
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function LastWeekEndUnix() : int {
        $result = mktime(23,59,59,date('m'),date('d')-date('w')+7-7,date('Y')) + 1;
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisWeekStartUnix() : int {
        $result = mktime(0,0,0,date('m'),date('d')-date('w')+1,date('y'));
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisWeekEndUnix() : int {
        return self::ThisWeekStartUnix() + 604800;
    }

    /**
     * @return int
     */
    public static function LastMonthStartUnix() : int {
        $result = mktime(0, 0 , 0,date('m') - 1,1,date('Y'));
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisMonthStartUnix() : int {
        $result = mktime(0,0,0,date('m'),1,date('Y'));
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisMonthEndUnix() : int {
        $result = mktime(23,59,59,date('m'),date('t'),date('Y')) + 1;
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function LastQuarterStartUnix() : int {
        $quarter = ceil((date('n')) / 3) - 1;
        $result = mktime(0, 0, 0,$quarter * 3 - 3 + 1,1,date('Y'));
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function LastQuarterEndUnix() : int {
        $quarter = ceil((date('n')) / 3) - 1;
        $result = mktime(23,59,59,$quarter * 3,date('t',mktime(0, 0 , 0,$quarter * 3,1,date('Y'))),date('Y')) + 1;
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisQuarterStartUnix() : int {
        $quarter = ceil((date('n')) / 3);
        $result = mktime(0, 0, 0,$quarter * 3 - 3 + 1,1,date('Y'));
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisQuarterEndUnix() : int {
        $quarter = ceil((date('n')) / 3);
        $result = mktime(23,59,59,$quarter * 3,date('t',mktime(0, 0 , 0,$quarter * 3,1,date('Y'))),date('Y')) + 1;
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function NextQuarterStartUnix() : int {
        $quarter = ceil((date('n')) / 3) + 1;
        $result = mktime(0, 0, 0,$quarter * 3 - 3 + 1,1,date('Y'));
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function NextQuarterEndUnix() : int {
        $quarter = ceil((date('n')) / 3) + 1;
        $result = mktime(23,59,59,$quarter * 3,date('t',mktime(0, 0 , 0,$quarter * 3,1,date('Y'))),date('Y')) + 1;
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisYearStartUnix() : int {
        $result = strtotime(date('Y',time()).'-1'.'-1');
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function ThisYearEndUnix() : int {
        $result = strtotime(date('Y',time()).'-12'.'-31');
        if (is_bool($result)) {
            return 0;
        }
        return (int)$result;
    }

    /**
     * @return int
     */
    public static function NowUntilTomorrowStartSeconds() : int {
        return (int)(strtotime(date('Y-m-d')) + 86400) - time();
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public static function Year(int $timestamp) : string {
        return (string)date('Y',0 === $timestamp ? time() : $timestamp);
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public static function Month(int $timestamp) : string {
        $v = intval(date('m',0 === $timestamp ? time() : $timestamp));
        return $v < 10 ? '0'.$v : (string)$v;
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public static function Day(int $timestamp) : string {
        $v = intval(date('d',0 === $timestamp ? time() : $timestamp));
        return $v < 10 ? '0'.$v : (string)$v;
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public static function Hour(int $timestamp) : string {
        $v = intval(date('H',0 === $timestamp ? time() : $timestamp));
        return $v < 10 ? '0'.$v : (string)$v;
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public static function Minute(int $timestamp) : string {
        $v = intval(date('i',0 === $timestamp ? time() : $timestamp));
        return $v < 10 ? '0'.$v : (string)$v;
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public static function Second(int $timestamp) : string {
        $v = intval(date('s',0 === $timestamp ? time() : $timestamp));
        return $v < 10 ? '0'.$v : (string)$v;
    }

}

<?php
/**
 * Created by PhpStorm
 * User: xooooooox
 * Date: 2020/10/28 0028
 * Time: 11:06
 */

namespace xooooooox\ycm\helper;


/**
 * Class Times
 * @package xooooooox\ycm\helper
 */
class Times
{

    /**
     * 标准时间格式
     */
    const StandardFormat = 'Y-m-d H:i:s';

    /**
     * 当前时间戳
     * @return int
     */
    public static function NowUnix(){
        return time();
    }

    /**
     * 当前毫秒时间戳
     * @return float
     */
    public static function NowUnixMilli(){
        list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f',(floatval($t1) + floatval($t2)) * 1000);
    }
	
	/**
	 * 替换date函数,返回字符串
	 * @param string $format
	 * @param int $unix
	 * @return string
	 */
	public static function Date($format = '', $unix = 0){
		return (string)date($format, $unix);
	}
	
	/**
	 * 当前时间
	 * @return string
	 */
    public static function NowTime(){
        return self::Date(self::StandardFormat, self::NowUnix());
    }

    /**
     * 时间戳转时间
     * @param int $unix
     * @return string
     */
    public static function ToTime($unix = 0){
        return self::Date(self::StandardFormat, $unix);
    }

    /**
     * 时间转时间戳
     * @param string $time
     * @return int
     */
    public static function ToUnix($time = '1970-01-01 00:00:00'){
        return (int)strtotime($time);
    }

    /**
     * 年
     * @param int $time
     * @return int
     */
    public static function Year($time = 0){
        return (int)self::Date('Y', $time);
    }

    /**
     * 月
     * @param int $time
     * @return int
     */
    public static function Month($time = 0){
        return (int)self::Date('m', $time);
    }

    /**
     * 日
     * @param int $time
     * @return int
     */
    public static function Day($time = 0){
        return (int)self::Date('d', $time);
    }

    /**
     * 时
     * @param int $time
     * @return int
     */
    public static function Hour($time = 0){
        return (int)self::Date('H', $time);
    }

    /**
     * 分
     * @param int $time
     * @return int
     */
    public static function Minute($time = 0){
        return (int)self::Date('i', $time);
    }

    /**
     * 秒
     * @param int $time
     * @return int
     */
    public static function Second($time = 0){
        return (int)self::Date('s', $time);
    }

    /**
     * 现在-年
     * @return int
     */
    public static function NowYear(){
        return self::Year(self::NowUnix());
    }

    /**
     * 现在-月
     * @return int
     */
    public static function NowMonth(){
        return self::Month(self::NowUnix());
    }

    /**
     * 现在-日
     * @return int
     */
    public static function NowDay(){
        return self::Day(self::NowUnix());
    }

    /**
     * 现在-时
     * @return int
     */
    public static function NowHour(){
        return self::Hour(self::NowUnix());
    }

    /**
     * 现在-分
     * @return int
     */
    public static function NowMinute(){
        return self::Minute(self::NowUnix());
    }

    /**
     * 现在-秒
     * @return int
     */
    public static function NowSecond(){
        return self::Second(self::NowUnix());
    }

}

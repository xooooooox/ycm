<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/18
 * Time: 13:31
 */

namespace xooooooox\awe;


/**
 * Class ApiStatusCode
 * @package xooooooox\awe
 */
class ApiStatusCode
{

    /**
     * @var array
     */
    public static $Success = ['code'=>0,'msg'=>'success'];

    /**
     * @var array
     */
    public static $Failure = ['code'=>1,'msg'=>'failure'];

    /**
     * @var array
     */
    public static $Unusual = ['code'=>3,'msg'=>'unusual'];

    /**
     * @var array
     */
    public static $Warning = ['code'=>4,'msg'=>'warning'];

    /**
     * @var array
     */
    public static $Waiting = ['code'=>5,'msg'=>'waiting'];

    /**
     * @var array
     */
    public static $Expired = ['code'=>6,'msg'=>'expired'];

    /**
     * @var array
     */
    public static $Resting = ['code'=>8,'msg'=>'resting'];

    /**
     * @var array
     */
    public static $Reserve = ['code'=>9,'msg'=>'reserve'];

    /**
     * @param string $msg
     * @return array
     */
    public static function Success(string $msg) : array {
        $data = static::$Success;
        if ($msg != ''){
            $data['msg'] = $msg;
        }
        return $data;
    }

    /**
     * @param string $msg
     * @return array
     */
    public static function Failure(string $msg) : array {
        $data = static::$Failure;
        if ($msg != ''){
            $data['msg'] = $msg;
        }
        return $data;
    }

    /**
     * @param string $msg
     * @return array
     */
    public static function Unusual(string $msg) : array {
        $data = static::$Unusual;
        if ($msg != ''){
            $data['msg'] = $msg;
        }
        return $data;
    }

    /**
     * @param string $msg
     * @return array
     */
    public static function Warning(string $msg) : array {
        $data = static::$Warning;
        if ($msg != ''){
            $data['msg'] = $msg;
        }
        return $data;
    }

    /**
     * @param string $msg
     * @return array
     */
    public static function Waiting(string $msg) : array {
        $data = static::$Waiting;
        if ($msg != ''){
            $data['msg'] = $msg;
        }
        return $data;
    }

    /**
     * @param string $msg
     * @return array
     */
    public static function Expired(string $msg) : array {
        $data = static::$Expired;
        if ($msg != ''){
            $data['msg'] = $msg;
        }
        return $data;
    }

    /**
     * @param string $msg
     * @return array
     */
    public static function Resting(string $msg) : array {
        $data = static::$Resting;
        if ($msg != ''){
            $data['msg'] = $msg;
        }
        return $data;
    }

    /**
     * @param string $msg
     * @return array
     */
    public static function Reserve(string $msg) : array {
        $data = static::$Reserve;
        if ($msg != ''){
            $data['msg'] = $msg;
        }
        return $data;
    }

    /**
     * @return array
     */
    public static function AllCodes() : array {
        return get_class_vars(__CLASS__);
    }

    /**
     * @return string
     */
    public static function AllCodesMarkdownTableString() : string {
        return ApiDocument::MarkdownTableString(array_values(static::AllCodes()));
    }

}

<?php
/**
 ************************************
 *           Author: sunqiaoyu      *
 *         Date: 2020-04-27 14:02   *
 * **********************************
 **/

/**
 * 单例模式：主要用于 MYSQL的操作，确保一个PHP生命周期只产生一个实例
 * 三私一公
 * 私有构造方法，防止外部程序实例化对象
 * 私有__clone()方法，防止克隆对象
 * Date: 2020-04-27 14:11
 * Author: sunqiaoyu
 * Class: Demo
 */

class Demo{

    private static $instance;

    public $a = 11;

    private function __construct()
    {
        $this->a--;
        echo $this->a;
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof Demo){
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone()
    {

    }
}

Demo::getInstance();
Demo::getInstance();



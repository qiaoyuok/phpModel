<?php
/**
 ************************************
 *           Author: sunqiaoyu      *
 *         Date: 2020-04-27 15:14   *
 * **********************************
 **/

/**注册模式
 * 解决全局共享和对象交换，将已经创建好的对象挂在到
 * 某个全局可以使用的数组上，在需要使用的时候可以直接去取
 * Date: 2020-04-27 15:18
 * Author: sunqiaoyu
 * Class: Register
 */
class Register{
    protected static $objects;

    //挂载
    public function set($alias,$object){
        self::$objects[$alias] = $object;
    }

    //获取
    public function get($name){
        return self::$objects[$name];
    }

    //删除
    public function _unset($name){
        unset(self::$objects[$name]);
    }
}
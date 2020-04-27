<?php
/**
 ************************************
 *           Author: sunqiaoyu      *
 *         Date: 2020-04-27 15:02   *
 * **********************************
 **/

/**
 * 使用场景：通过传递类名和参数 来实现类的实例化，避免在所有使用到该类的地方都做修改
 */

/**定义一个  支付接口
 * Date: 2020-04-27 15:05
 * Author: sunqiaoyu
 * Interface: Pay
 */
interface Pay{
    public function payPlatform();
}

/**阿里支付方式的实现
 * Date: 2020-04-27 15:06
 * Author: sunqiaoyu
 * Class: AliPay
 */
class AliPay implements Pay{
    public function payPlatform()
    {
        echo "阿里支付";
    }
}

/**微信支付方式的实现
 * Date: 2020-04-27 15:07
 * Author: sunqiaoyu
 * Class: WeixinPay
 */
class WeixinPay implements Pay{
    public function payPlatform()
    {
        echo "微信支付";
    }
}

/**工厂类
 * Date: 2020-04-27 15:08
 * Author: sunqiaoyu
 * Class: Factory
 */
class Factory{

    public static function create($class){
        return new $class();
    }
}

$pay = Factory::create("WeixinPay");
$pay->payPlatform();
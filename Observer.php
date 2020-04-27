<?php
/**
 ************************************
 *           Author: sunqiaoyu      *
 *         Date: 2020-04-27 15:31   *
 * **********************************
 **/

/**定义一个事件触发抽象类
 * Date: 2020-04-27 15:44
 * Author: sunqiaoyu
 * Class: EventGenerator
 */

/**
 * 1：观察者模式(Observer)，当一个对象状态发生变化时，依赖它的对象全部会收到通知，并自动更新。
 * 2：场景:一个事件发生后，要执行一连串更新操作。传统的编程方式，就是在事件的代码之后直接加入处理的逻辑。
 *    当更新的逻辑增多之后，代码会变得难以维护。这种方式是耦合的，侵入式的，增加新的逻辑需要修改事件的主体代码。
 * 3：观察者模式实现了低耦合，非侵入式的通知与更新机制。
 * Date: 2020-04-27 15:51
 * Author: sunqiaoyu
 * Class: EventGenerator
 */
abstract class EventGenerator
{
    private $observers = array ();

    public function addObserver($observer)
    {
        $this->observers[] = $observer;
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}

/**定义一个观察者接口
 * Date: 2020-04-27 15:45
 * Author: sunqiaoyu
 * Interface: Observer
 */
interface Observer
{
    public function update();
}

//观察者搜集和触发
class Event extends EventGenerator
{
    function trigger()
    {
        echo "Event" . PHP_EOL;
    }
}

//被观察者1号
class beObserver1 implements Observer
{
    public function update()
    {
        echo "被观察者1号" . PHP_EOL;
    }
}

//被观察者2号
class beObserver2 implements Observer
{
    public function update()
    {
        echo "被观察者2号" . PHP_EOL;
    }
}

$event = new Event();
$event->addObserver(new beObserver1());
$event->addObserver(new beObserver2());

$event->trigger();

$event->notify();
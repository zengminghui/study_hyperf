<?php

declare(strict_types=1);

namespace App\Listener;

use App\Event\UserRegistered;
use Hyperf\Event\Annotation\Listener;
use Psr\Container\ContainerInterface;
use Hyperf\Event\Contract\ListenerInterface;

/**
 * priority 可以设置监听器执行的优先级
 * @Listener(priority=8)
 */
class SendEmailListener implements ListenerInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    //此处监听事件
    public function listen(): array
    {
        // 返回一个该监听器要监听的事件数组，可以同时监听多个事件
        return [
            UserRegistered::class,
            //其他事件
        ];
    }

    /**
     * @param UserRegistered $event
     */
    public function process(object $event)
    {
        // 事件触发后该监听器要执行的代码写在这里，比如该示例下的发送用户注册成功短信等
        // 直接访问 $event 的 user 属性获得事件触发时传递的参数值
        // $event->user;
        echo '发送email给' . $event->userId . PHP_EOL;
        //如果监听多个事件
        if($event instanceof UserRegistered)
        {
            //执行这个事件的逻辑
        }
//        if($event instanceof xxxx事件)
//        {
//            //执行这个事件的逻辑
//        }
    }
}

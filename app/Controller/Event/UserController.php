<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/8
 * Time: 12:57
 */

namespace App\Controller\Event;

use App\Event\UserRegistered;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * 事件机制测试
 * Class UserController
 * @AutoController()
 */
class UserController
{
    /**
     * 注入事件调度器
     * @Inject()
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function register()
    {
        //模拟用户注册
        $userId = rand(1,9999);
        if($userId)
        {
            //进行事件调度
            $this->eventDispatcher->dispatch(new UserRegistered($userId));
        }
        return $userId;
    }

}
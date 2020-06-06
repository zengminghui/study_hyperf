<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/6
 * Time: 20:12
 */

namespace App\Controller\Co;

use Hyperf\Di\Annotation\Inject;
use Hyperf\Guzzle\ClientFactory;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Utils\Context;
use Hyperf\Utils\Coroutine;
use Swoole\Coroutine\Channel;

/**
 * 协程例子
 * Class CoController
 * @AutoController()
 */
class TestController
{
    /**
     * @Inject()
     * @var ClientFactory
     */
    private  $clientFactory;

    public function index()
    {
        //协程处理IO 并发处理
        $channel = new Channel();
        go(function() use ($channel){
            $client = $this->clientFactory->create();
            $client->get('127.0.0.1:9501/co/test/sleep?seconds=2');
            $channel->push(1234);
        });
        go(function() use ($channel){
            $client = $this->clientFactory->create();
            $client->get('127.0.0.1:9501/co/test/sleep?seconds=2');
            $channel->push(5678);
        });
        $result[] = $channel->pop();
        $result[] = $channel->pop();
        return $result; //[1234,5678]
        //其他实现方式 参考官方文档
        // WaitGroup 特性 https://doc.hyperf.io/#/zh-cn/coroutine?id=waitgroup-%E7%89%B9%E6%80%A7
        //Parallel 特性 https://doc.hyperf.io/#/zh-cn/coroutine?id=parallel-%E7%89%B9%E6%80%A7
    }
    public function sleep(RequestInterface $request)
    {
        $seconds = $request->query('seconds', 1);
        sleep($seconds);
        return $seconds;
    }

}
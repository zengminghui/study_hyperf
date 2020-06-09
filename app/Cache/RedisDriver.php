<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/9
 * Time: 15:52
 */

namespace App\Cache;

//自定义redis驱动
use Hyperf\Redis\RedisProxy;
use Psr\Container\ContainerInterface;

class RedisDriver extends \Hyperf\Cache\Driver\RedisDriver
{
    public function __construct(ContainerInterface $container, array $config)
    {
        parent::__construct($container, $config);
        //返回redis代理对象 此处 test值 表示是配置文件redis.php里的 test键
        $this->redis = make(RedisProxy::class,['pool' => 'test']);
    }

}
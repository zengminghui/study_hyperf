<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/9
 * Time: 13:34
 */

namespace App\Cache;


use Hyperf\Cache\Annotation\Cacheable;
use Hyperf\Cache\Annotation\CachePut;

//使用了cache 会在runtime目录生成缓存文件 更改后需删除缓存文件
class CacheService
{

    public function get(string $name = 'Hyperf')
    {
        sleep(1);
        return 'Hello ' . $name . '-' . uniqid();
    }

    public function test(string $name = 'aaa')
    {
        return $name . '-' . uniqid();
    }

    /**
     * 注解方式注入cache
     * @Cacheable(prefix="test")
     */
    public function getCache(string $name = 'Hyperf')
    {
        //使用Cacheable只会调用一次下面的方法 直到缓存过期
        return $this->get($name);
    }

    /**
     * @CachePut(prefix="test")
     */
    //CachePut 不同于 Cacheable，它每次调用都会执行函数体，然后再对缓存进行重写。所以当我们想更新缓存时，可以调用相关方法
    public function cacheput(string $name = 'Hyperf')
    {
        //使用Cacheput 每次都会调用下面的方法
        return $this->get($name);
    }

    /**
     * @Cacheable(prefix="Memeoy", group="co")
     */
    //协程 内存驱动
    public function getFromMemory()
    {
        sleep(1);
        return 'Hello ' . uniqid();
    }

    //调用重写redis驱动的缓存驱动

    /**
     * @Cacheable(prefix="redriver", group="testdriver")
     */
    public function redriver(string $name = 'rewrite')
    {
        return $this->get($name);
    }



}
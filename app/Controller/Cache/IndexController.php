<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/9
 * Time: 12:15
 */

namespace App\Controller\Cache;

use App\Cache\CacheService;
use App\Controller\AbstractController;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Utils\Coroutine;
use Psr\Container\ContainerInterface;
use Psr\SimpleCache\CacheInterface;

/**
 * 测试缓存类
 * @AutoController(prefix="cache")
 */
class IndexController extends AbstractController
{

    /**
     * 容器
     * @Inject()
     * @var ContainerInterface
     */
    protected $container;
    /**
     * 注入cache类
     * @Inject()
     * @var CacheService
     */
    protected $cahceService;
    /**
     * @Inject()
     * @var CacheInterface
     */
    protected $simpleCache;
    public function index(RequestInterface $request, ResponseInterface $response)
    {
//        $cache = $this->container->get(\Psr\SimpleCache\CacheInterface::class);
//        $cache->set('c',123);

        $result = $this->cahceService->getCache();

        return $response->json([
            $result,
            Coroutine::inCoroutine()
        ]);

    }

    //更新缓存使用Cacheput
    public function put(RequestInterface $request, ResponseInterface $response)
    {
        $result = $this->cahceService->cacheput();
        return $response->json($result);
    }

    //调用协程内存驱动
    public function getCo(RequestInterface $request, ResponseInterface $response)
    {
        $ms = microtime(true);
        //调用2次看看是否耗时2秒
        $result1 = $this->cahceService->getFromMemory();
        $result2 = $this->cahceService->getFromMemory();
        $time = microtime(true)-$ms;
        //实际耗时["Hello 5edf36782ecc4","Hello 5edf36782ecc4",1.0028090476989746,true]
        return $response->json([
            $result1,
            $result2,
            $time,
            Coroutine::inCoroutine() //是否为协程环境
        ]);
    }
    //Simple Cache 方式
    public function simple(RequestInterface $request, ResponseInterface $response)
    {
        $this->simpleCache->set('simple', 'cahce');
        $result = $this->simpleCache->get('simple', 'cahce');
        return $response->json($result);
    }

    public function newdriver(RequestInterface $request, ResponseInterface $response)
    {
        $result = $this->cahceService->redriver();
        return $response->json($result);
    }
}
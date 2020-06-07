<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/7
 * Time: 13:12
 */

namespace App\Controller\Mdw;

use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Annotation\Middlewares;
use App\Middleware\FooMiddleware;
use App\Middleware\BarMiddleware;
use App\Middleware\BazMiddleware;
use Hyperf\HttpServer\Contract\RequestInterface;


/**
 * 通过注解定义中间件
 * Class IndexController
 * @AutoController()
 * //按照此处顺序执行
 * @Middlewares({
 *     @Middleware(FooMiddleware::class),
 *     @Middleware(BazMiddleware::class),
 *     @Middleware(BarMiddleware::class)
 *     })
 */
//总共有 3 种级别的中间件，分别为 全局中间件、类级别中间件、方法级别中间件，如果都定义了这些中间件，执行顺序为：全局中间件 -> 类级别中间件 -> 方法级别中间件。
class IndexController
{
    public function wdm(RequestInterface $request)
    {
        $foo = $request->getAttribute('foo');
        return $foo.'11';
    }

}
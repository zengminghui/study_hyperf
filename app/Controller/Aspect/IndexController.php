<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/6
 * Time: 17:26
 */

namespace App\Controller\Aspect;

use App\Annotation\Foo;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class IndexController
 * @AutoController()
 * @Foo(bar="testaop")
 */
class IndexController
{
    public function index()
    {
        //注意运行之后会生成缓存，需删除runtime/proxy 目录下的文件再次启动服务才会更新
        return 'test aop1';
    }

}
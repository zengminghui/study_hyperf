<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/8
 * Time: 11:28
 */

namespace App\Controller\Exception;

use App\Exception\FooException;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * 测试异常处理
 * Class TestController
 * @AutoController()
 */
class TestController
{
    public function co()
    {
        co(function(){
            while (true)
            {
                echo 1;
                sleep(1);
            }
        });
        return 1;
    }

    public function exception()
    {
        //调用自定义的异常类
        throw new FooException('test');
    }
}
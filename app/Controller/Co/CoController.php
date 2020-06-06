<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/6
 * Time: 20:12
 */

namespace App\Controller\Co;

use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Utils\Context;

/**
 * Class CoController
 * @AutoController()
 * 消除ide对未定义属性的提示 property
 * @property int $foo
 */
class CoController
{

    public function get()
    {
        return $this->foo;
    }

    public function update(RequestInterface $request)
    {
        $foo = $request->input('foo');
        $this->foo = $foo;
        return $this->foo;
    }

    public function __get($name)
    {
        return Context::get(__CLASS__ . ':' . $name);
    }

    public function __set($name, $value)
    {
//        var_dump($name, $value);
        //以当前类名或者其他标识符作为标识加冒号作为分隔符
        //务必将需要保存的值存储在协程上下文中，否则会变成全局变量导致脏数据
        Context::set(__CLASS__ . ':' . $name, $value);
    }


}
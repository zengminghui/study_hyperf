<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/7
 * Time: 11:17
 */

namespace App\Controller\Config;

use Hyperf\Config\Annotation\Value;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * 依赖注入获取配置项
 * Class IndexController
 * @AutoController()
 */
class IndexController
{
    /**
     * 通过 `@Inject` 注解注入由 `@var` 注解声明的属性类型对象
     * @Inject()
     * 通过 Config 对象获取配置
     * @var ConfigInterface
     */
    private $config;
    /**
     * 通过 value 注解获取配置
     * @Value("demo.demo2.username")
     */
    private $demo;


    /**
     * 通过 Config 对象获取配置
     */
    public function demo()
    {
        // 直接使用
        $host = $this->config->get('databases.default.host', '127.0.0.1');
        return $this->config->get('demo.demo2');
//        return $host;
    }

    /**
     * 通过 value 注解获取配置
     */
    public function value()
    {
        return $this->demo;
    }

    /**
     * 通过 全局config(string $key, $default) 函数获取
     */
    public function config()
    {
        return config('demo.demo1', 123);
    }
}
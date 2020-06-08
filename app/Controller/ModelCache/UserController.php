<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/8
 * Time: 16:23
 */

namespace App\Controller\ModelCache;


use App\Dao\UserDao;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * 模型缓存测试
 * @AutoController(prefix="model")
 */
class UserController
{
    /**
     * @Inject()
     * @var UserDao
     */
    protected $UserDao;
    public function first()
    {
        echo 1;
        return $this->UserDao->first(1);
    }

    public function firstCache()
    {
        return $this->UserDao->firstCache(1);
    }
}
<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller\User;

use App\Controller\AbstractController;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\RequestMapping;

/**
 * @Controller(prefix="user")
 */
class IndexController extends AbstractController
{
    /**
     * @RequestMapping(path="index", methods={"get", "post"})
     */
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.1",
        ];
    }
    /**
     * path里添加了斜杠开头“/” 即表示忽略 prefix的定义
     * 请求地址 http://127.0.0.1:9501/test/demo
     * @RequestMapping(path="/test/demo", methods={"get", "post"})
     * 单独定义post
     * //PostMapping(path="/test/demo")
     */
    public function demo()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.1",
        ];
    }
}

<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/8
 * Time: 22:18
 */

namespace App\Controller\Task;

use App\Controller\AbstractController;
use App\Task\TaskService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Utils\Coroutine;

/**
 * 调用Task任务类
 * Class IndexController
 * @AutoController()
 */
class IndexController extends AbstractController
{
    /**
     * @Inject()
     * @var TaskService
     */
    protected $task;
    public function task()
    {
        microtime()
        $result = $this->task->handle(Coroutine::id());
        return $this->response->json($result);
    }
}
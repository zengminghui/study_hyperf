<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/8
 * Time: 22:14
 */

namespace App\Task;


use Hyperf\Task\Annotation\Task;
use Hyperf\Utils\Coroutine;

/**
 * Task任务
 * @package App\Task
 */
class TaskService
{
    /**
     * 通过注解方式注入task任务
     * @Task()
     */
    public function handle($cid)
    {
        return [
            'worker.cid' => $cid,
            // task_enable_coroutine 为 false 时返回 -1，反之 返回对应的协程 ID
            'task.cid' => Coroutine::id(),
        ];
    }
}
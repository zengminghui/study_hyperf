<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/8
 * Time: 12:00
 */

namespace App\Exception\Handler;


use App\Exception\FooException;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class FooExceptionHandler extends ExceptionHandler
{

    /**
     * @inheritDoc
     */
    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        //异常处理在此处停止 然后返回响应内容
        $this->stopPropagation();
        //返回响应内容
        return $response->withStatus(500)->withBody(new SwooleStream('这里是自定义FooException异常类在处理'));
    }

    /**
     * @inheritDoc
     */
    public function isValid(Throwable $throwable): bool
    {
        //如果抛出异常的是自定义异常类 返回true 将由自定义FooException开始处理 返回false FooException不会处理
        return $throwable instanceof FooException;
    }
}
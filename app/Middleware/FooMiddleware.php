<?php

declare(strict_types=1);

namespace App\Middleware;

use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Utils\Context;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FooMiddleware implements MiddlewareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {

        echo 1;
        //全局更改请求和响应对象
        $request = $request->withAttribute('foo', 'request');
        //存入协程上下文
        $request = Context::set(ServerRequestInterface::class, $request);
        $response = $handler->handle($request);

        echo 4;
        $body = $response->getBody()->getContents();
        $response = $response->withBody(new SwooleStream($body . 'response'));
        $response = \Hyperf\Utils\Context::set(ResponseInterface::class, $response);
        return $response;
    }
}


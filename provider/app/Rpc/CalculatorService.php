<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/7
 * Time: 16:48
 */

namespace App\Rpc;

use Hyperf\RpcServer\Annotation\RpcService;

/**
 * rpc 服务提供者
 * 注意，如希望通过服务中心来管理服务，需在注解内增加 publishTo 属性
 * name 该服务的名称 protocol 定义协议 server 该服务的承载server 该属性对应 config/autoload/server.php 文件内 servers 下所对应的 name
 * Class CalculatorService
 * @RpcService(name="CalculatorService", protocol="jsonrpc-http", server="jsonrpc-http", publishTo="consul")
 * 设置了 publishTo=consul 需要用到的组件 hyperf/service-governance hyperf/consul 使用如下composer命令加载
 * composer require hyperf/service-governance  composer require hyperf/consul
 * 生成对应的配置文件在 config/autoload/consul.php 命令 php ./bin/hyperf.php vendor:publish hyperf/consul
 * 需要安装consul服务 可集群或者单机 consul 官网https://learn.hashicorp.com/consul
 */
class CalculatorService implements CalculatorServiceInterface
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }
    public function minus(int $a, int $b): int
    {
        return $a - $b;
    }
}
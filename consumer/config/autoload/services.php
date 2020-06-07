<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/7
 * Time: 17:17
 */
return [
    'consumers' => [
        [
            // 对应消费者类的 $serviceName
            'name' => 'CalculatorService',
            // 服务接口名，可选，默认值等于 name 配置的值，如果 name 直接定义为接口类则可忽略此行配置，如 name 为字符串则需要配置 service 对应到接口类
            'service' => \App\Rpc\CalculatorServiceInterface::class,
            'protocol' => 'jsonrpc-http',
            //这个消费者要从哪个服务中心获取节点信息，如不配置则不会从服务中心获取节点信息
            'registry' => [
                'protocol' => 'consul',
                'address' => 'http://127.0.0.1:8500',
            ],
            // 如果没有指定上面的 registry 配置，即为直接对指定的节点进行消费，通过下面的 nodes 参数来配置服务提供者的节点信息
//            'nodes' => [
//                ['host' => '127.0.0.1', 'port' => 9502],
//            ],
        ]
    ],
];
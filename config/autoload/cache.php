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

return [
    'default' => [
        'driver' => Hyperf\Cache\Driver\RedisDriver::class,
        'packer' => Hyperf\Utils\Packer\PhpSerializerPacker::class,
        'prefix' => 'c:',
    ],
    //重新redsi驱动 重新定义
    'testdriver' => [
        'driver' => \App\Cache\RedisDriver::class,
        'packer' => Hyperf\Utils\Packer\PhpSerializerPacker::class,
        'prefix' => 'c:t:',
    ],
    'co' => [
        'driver' => Hyperf\Cache\Driver\CoroutineMemoryDriver::class,
        'packer' => Hyperf\Utils\Packer\PhpSerializerPacker::class,
        'prefix' => 'c:',
    ],
];

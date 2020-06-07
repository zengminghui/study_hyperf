<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/7
 * Time: 16:52
 */

namespace App\Rpc;

interface CalculatorServiceInterface
{
    public function add(int $a, int $b): int;

    public function minus(int $a, int $b): int;
}
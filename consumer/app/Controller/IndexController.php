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

namespace App\Controller;
use App\Rpc\CalculatorServiceInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * rpc 服务消费者
 * Class IndexController
 * @AutoController()
 */
class IndexController extends AbstractController
{
    /**
     * @Inject()
     * @var CalculatorServiceInterface
     */
    private $CalculatorService;
    public function index()
    {
        return $this->CalculatorService->minus(15,2);
    }
}

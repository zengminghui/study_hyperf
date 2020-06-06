<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/6
 * Time: 17:29
 */

namespace App\Aspect;


use App\Annotation\Foo;
use App\Controller\Aspect\IndexController;
use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;

/**
 * aop切面编程 测试
 * Class AopController
 * @Aspect()
 */
class AopController extends AbstractAspect
{
    // 要切入的类，可以多个，亦可通过 :: 标识到具体的某个方法，通过 * 可以模糊匹配
    public $classes = [
        IndexController::class  //切入整个类的方法
        //IndexController::class . '::' . 'index' //切入某个方法的写法
    ];

    // 要切入的注解，具体切入的还是使用了这些注解的类，仅可切入类注解和类方法注解
    public $annotations = [
        Foo::class,
    ];

    /**
     * @inheritDoc
     */
    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        // 切面切入后，执行对应的方法会由此来负责
        // $proceedingJoinPoint 为连接点，通过该类的 process() 方法调用原方法并获得结果
        // 在调用前进行某些处理
//        var_dump('befor');
        $result = $proceedingJoinPoint->process();
//        var_dump('after');
        //对注解进行切入
        /** @var Foo $foo */
        $foo = $proceedingJoinPoint->getAnnotationMetadata()->class[Foo::class];
        $bar = $foo->bar;
        // 在调用后进行某些处理
        return $result.$bar;
    }
}
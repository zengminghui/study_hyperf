<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/6
 * Time: 16:11
 */

namespace App\Controller\User;

use App\Annotation\Foo;
use Hyperf\Di\Annotation\AnnotationCollector;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class TestAnnotationController
 * @AutoController()
 * //调用自定义注解
 * //Foo(bar="123")Foo(bar="1231", baz="321")
 * @Foo("123")
 */
class TestAnnotationController
{
    public function index()
    {
        var_dump(AnnotationCollector::getClassByAnnotation(Foo::class));
        return 1;
    }
}
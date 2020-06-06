<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/6
 * Time: 15:59
 */
namespace App\Annotation;
use Hyperf\Di\Annotation\AbstractAnnotation;
use Hyperf\Di\Annotation\AnnotationInterface;

/**
 * Class Foo
 * 自定义注解类
 * @Annotation
 * @Target({"CLASS", "METHOD"})
 */
class Foo extends AbstractAnnotation
{
    /**
     * @var string
     */
    public $bar;

    /**
     * @var string
     */
    public $baz;

    public function __construct($value = null)
    {
        parent::__construct($value);
        $this->bindMainProperty('bar', $value);
    }

}
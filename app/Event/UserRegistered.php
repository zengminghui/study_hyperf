<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/8
 * Time: 13:10
 */

namespace App\Event;

//事件类
//快捷生成监听类 命令 php bin/hyperf.php gen:listener SendEmailListener
class UserRegistered
{
    // 建议这里定义成 public 属性，以便监听器对该属性的直接使用，或者你提供该属性的 Getter
    public $userId;
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

}
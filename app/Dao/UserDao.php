<?php
/**
 * Created by: phpstorm
 * Author: danny
 * Date: 2020/6/8
 * Time: 16:04
 */

namespace App\Dao;


use App\Model\User;

class UserDao
{
    public function first(int $id)
    {
        return User::query()->find($id);
    }

    public function firstCache(int $id)
    {
        return User::findFromCache($id);
    }

}
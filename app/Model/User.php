<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    /**************** 用户操作 ********************/
    protected $table = 'users'; //表名
    protected $primaryKey = 'uid'; //表的主键名
    public $timestamps = false; //默认情况下，Eloquent 期望数据表中存在 created_at 和 updated_at 字段，设置false可以取消
    protected $guarded = ['uid']; //定义不允许更新的字段黑名单
    protected $fillable = ['name', 'password', 'created_at', 'updated_at']; //定义允许添加、更新的字段白名单
}

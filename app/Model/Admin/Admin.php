<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

class Admin extends Authenticatable
{
    /**************** 后台管理者相关model ********************/
    //
    protected $rememberTokenName = '';

    protected $table = 'admins'; //表名
    protected $primaryKey = 'aid'; //表的主键名
    public $timestamps = true; //默认情况下，Eloquent 期望数据表中存在 created_at 和 updated_at 字段，设置false可以取消
    protected $guarded = ['aid']; //定义不允许更新的字段黑名单
    protected $fillable = ['admin_name', 'tellphone', 'password', 'updated_at']; //定义允许添加、更新的字段白名单

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

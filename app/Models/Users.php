<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model {

    /**
     * 软删除
     */
    use SoftDeletes;

    /**
     * 需要被转换成日期的属性。
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * 数据表
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * 关联岗位
     */
    public function professions()
    {
        return $this->belongsToMany(Professions::class);
    }

}
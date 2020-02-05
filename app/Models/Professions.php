<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Professions extends Model {

    /**
     * 数据表
     *
     * @var string
     */
    protected $table = 'professions';

    /**
     * 关联用户
     */
    public function users()
    {
        return $this->belongsToMany(Users::class);
    }

}
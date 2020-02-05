<?php

namespace App\Http\Controllers\Api\UserManage;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Services\IUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class UserManageController extends Controller
{
    protected $service;

    public function __construct(IUserService $service)
    {
        $this->service = $service;
    }

    /**
     * 测试路由
     */
    public function test(){
        echo "hello";
    }

    /**
     * 查询用户
     */
    public function select(){
        $users = $this->service->selectUsers();
        return response()->json([
            'user' => $users,
        ]);
    }

    /**
     * 新增用户
     * @param Request $request
     */
    public function insert(Request $request){
        $rows = $this->service->insertUsers($request);
        return $rows > 0 ? "Success!" : "Failure!";
    }

    /**
     * 修改用户
     * @param Request $request
     */
    public function update(Request $request){
        $rows = $this->service->updateUsers($request);
        return $rows > 0 ? "Success!" : "Failure!";
    }

    /**
     * 删除用户
     * @param Request $request
     */
    public function delete(Request $request){
        $rows = $this->service->deleteUsers($request);
        return $rows > 0 ? "Success!" : "Failure!";
    }
}

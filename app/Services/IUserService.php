<?php
namespace App\Services;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IUserService{

    /**
     * 新增用户
     * @param Request $request
     */
    public function insertUsers(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $professions = $request->input("professions");
//        if (!preg_match('/^[0-9_a-zA-Z]/', $username)){
////            '/^[_0-9a-z]{6,16}$/i'
//            return -1;
//        }
        $user = new Users();
        $user -> username = $username;
        $user -> password = $password;
        $user -> save();
//        $user = Users::insert([
//            'username' => $username,
//            'password' => $password,
//            'created_at' => date("y/m/d h:i:s",time()),
//            'updated_at' => date("y/m/d h:i:s",time()),
//            'created_by' => '1',
//            'updated_by' => '1',
//        ]);
        $id = $user -> id;
        $user = Users::find($id);
        $user->professions()->attach($professions);
        return 1;
    }

    /**
     * 查询用户
     * @return \Illuminate\Http\JsonResponse
     */
    public function selectUsers(){
        return Users::with("professions")->get();
    }

    /**
     * 修改用户
     * @param Request $request
     */
    public function updateUsers(Request $request){
        $id  = $request -> input("id");
        $password = $request -> input("password");
        $professions = $request->input("professions");
//        return Users::where('id', $id) -> update(['password', $password]);
        $user = Users::find($id);
        $user->professions()->detach(); //先删除所有关联关系
        $user->professions()->attach($professions); // 再新增关联关系
        $user->password = $password;
        $user->timestamps = false;
        $user->save();
        return 1;
    }

    /**
     * 删除用户
     * @param Request $request
     */
    public function deleteUsers(Request $request){
        $id  = $request -> input("id");
        $user = Users::find($id);
        // empty($user)
        if($user != null){
            $user->delete();
            return 1;
        }else{
            return 0;
        }
//        $user->roles()->detach($roleId);
//        $user->roles()->detach();
//        Schema::table('users', function ($table) {
//            $table->softDeletes();
//        });
    }

}
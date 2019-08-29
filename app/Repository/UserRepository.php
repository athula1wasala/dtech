<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use App\User;

class UserRepository {

    /**
     * add user
     * @param type $data
     */
    public function userAdd($data) {

        try {
            $objUser = new User();
            $objUser->email = $data['email'];
            $objUser->password = bcrypt($data['password']);
            $objUser->save();
            \DB::commit();
        } catch (Exception $ex) {
            exit($ex->getMessage());
        } catch (\PDOException $ex) {

            exit($ex->getMessage());
        }
    }
    /**
     * add user
     * @param type $data
     */
    public function userUpdate($data) {

        try {
            $objUser = User::find($data['user_id']);
            $objUser->password = bcrypt($data['password']);
            $objUser->type = ($data['role_id']);
            
            $objUser->save();
            \DB::commit();
        } catch (Exception $ex) {
            exit($ex->getMessage());
        } catch (\PDOException $ex) {

            exit($ex->getMessage());
        }
    }
    

    public function getUserRole() {

        $data = Config::get('custom_config.user_role');
        return $data;
    }

    public function getAllUser($logged_user, $selUser = '') {

        $objUser = User::select('id', 'type', 'email', DB::raw("(case  when type = '1' then 'Admin'   else 'User'  end) AS role")
        );


        if (!empty($selUser)) {

            $objUser = $objUser->where("id", $selUser)
                    ->first();
            ;
        } else {

            if ($logged_user->type == Config::get('custom_config.user_admin')) {
                $objUser = $objUser->get();
            } else {
                $objUser = $objUser->where("id", $logged_user->id)
                        ->get();
            }
        }


        return $objUser;
    }

    /**
     * destory user
     * @param type $id
     */
    public function destroyUser($id) {

        try {

            $user = User::find($id);
            $user->delete();
        } catch (Exception $ex) {
            exit($ex->getMessage());
        } catch (\PDOException $ex) {

            exit($ex->getMessage());
        }
        return true;
    }

}

<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use App\Department;

class DepartmentRepository {

    /**
     * add depertment
     * @param type $data
     */
    public function departmentAdd($data) {

        try {
            $objDepertment = new Department();
            $objDepertment->name = $data['name'];
            $objDepertment->location = ($data['location']);
            $objDepertment->save();
            \DB::commit();
        } catch (Exception $ex) {
            exit($ex->getMessage());
        } catch (\PDOException $ex) {

            exit($ex->getMessage());
        }
    }
    
    /**
     * get all department info
     * @return type
     */    
    public function getAllDepartment() {

        $objDepartment = Department::select("*")
                       ->get();

        return $objDepartment;
    }
    
    /**
     * get all department info
     * @return type
     */    
    public function getSelDepartment() {

        $objDepartment = Department::pluck('name','dep_id');
        return $objDepartment;
    }
   
}

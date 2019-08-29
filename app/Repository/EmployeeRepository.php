<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use App\Employee;

class EmployeeRepository {

    /**
     * add employee
     * @param type $data
     */
    public function employeeAdd($data) {

        try {
            $objEmployee = new Employee();
            $objEmployee->epf_no = $data['epf_no'];
            $objEmployee->name = $data['name'];
            $objEmployee->address = $data['address'];
            $objEmployee->id_no = $data['id_no'];
            $objEmployee->birth_date = $data['birth_date'];
            $objEmployee->join_date = $data['join_date'];
            $objEmployee->gender = $data['gender'];
             $objEmployee->dep_id = $data['dep_id'];
            $objEmployee->save();
            \DB::commit();
        } catch (Exception $ex) {
            exit($ex->getMessage());
        } catch (\PDOException $ex) {

            exit($ex->getMessage());
        }
    }
    
    /**
     * get all employee info
     * @return type
     */    
    public function getAllEmployee() {

        $objEmployee = Employee::select("tbl_employee.*",'tbl_department.name as department')
                      ->join('tbl_department', 'tbl_employee.dep_id', '=', 'tbl_department.dep_id')
                       ->get();

        return $objEmployee;
    }
    
      /**
     * get all employee info
     * @return type
     */    
    public function getSelEmployee() {

        $objEmployee = Employee::pluck('name','emp_id');
        return $objEmployee;
    }

}

<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use App\Salary;
use App\Employee;

class SalaryRepository {

    /**
     * add salary
     * @param type $data
     */
    public function saalryAdd($data) {
  
        try {
            $objSalary = new Salary();
            $objSalary->emp_id = $data['emp_id'];
            $objSalary->month = $data['month'];
            $objSalary->salary =  ($data['working_day'])  * 1000;
            $objSalary->save();
            \DB::commit();
        } catch (Exception $ex) {
            exit($ex->getMessage());
        } catch (\PDOException $ex) {

            exit($ex->getMessage());
        }
    }
    
    /**
     * get all salary
     */
    public function getAllSalary(){
        
        $objEmployeeSal = Salary::select("tbl_salary.*",'tbl_employee.name as employee','tbl_department.name as deprtment')
                  ->join('tbl_employee', 'tbl_employee.emp_id', '=', 'tbl_salary.emp_id')
                      ->join('tbl_department', 'tbl_employee.dep_id', '=', 'tbl_department.dep_id')
                       ->get();

        return $objEmployeeSal;
    }
   
    public function getEmployeeDepId($emp_id){
        
        $objEmplooyee = Employee::select('dep_id')->where('emp_id',$emp_id)->first();
        return $objEmplooyee->dep_id;
        
    }
}

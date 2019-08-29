<?php

namespace App\Services;

use App\Repository;
use DB;
use Illuminate\Support\Facades\Auth;

class EmpService {

    private $empRepository;
    private $deptRepository;
    private $salaryRepository;
    
    /**
     * 
     * @param \App\Repository\EmployeeRepository $empRepository
     * @param \App\Repository\DepartmentRepository $deptRepository
     * @param \App\Repository\SalaryRepository $salaryRepository
     */
    public function __construct(Repository\EmployeeRepository $empRepository,
                                Repository\DepartmentRepository $deptRepository,
                                Repository\SalaryRepository $salaryRepository) {
        
       $this->empRepository = $empRepository;
       $this->deptRepository = $deptRepository;
       $this->salaryRepository = $salaryRepository;
    }
    
    /**
     * add employee data
     * @param type $data
     * @return type
     */
    public function employeeAdd($data) {
        return $this->empRepository->employeeAdd($data);
    }
   
    /**
     * add department data
     * @param type $data
     * @return type
     */
    public function departmentAdd($data) {
        return $this->deptRepository->departmentAdd($data);
    }
    
    /**
     * add salary data
     * @param type $data
     * @return type
     */
    public function salaryAdd($data) {
        return $this->salaryRepository->saalryAdd($data);
    }
    
     /**
     * get all empoloyee details
     * @return type
     */
    public function getAllEmployee(){
      
     return $this->empRepository->getAllEmployee();
        
    }
    
    /**
     * get all Department details
     * @return type
     */
    public function getAllDepartment(){
      
     return $this->deptRepository->getAllDepartment();
        
    }
    
    /**
     * get all Department details
     * @return type
     */
    public function getPopulateDepartment(){
      
     return $this->deptRepository->getSelDepartment();
        
    }
   
    
    /**
     * add salary data
     * @param type $data
     * @return type
     */
    public function salarytAdd($data) {
        return $this->salaryRepository->saalryAdd($data);
    }
    
     /**
     * get all emp salary details
     * @return type
     */
    public function getAllSalary(){
      
     return $this->salaryRepository->getAllSalary();
        
    }
    
     /**
     * get all employee details
     * @return type
     */
    public function getPopulateEmployee(){
      
     return $this->empRepository->getSelEmployee();
        
    }
    
    
    
}

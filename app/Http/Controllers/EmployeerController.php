<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\EmployeeValidators;
use App\Services\EmpService;

class EmployeerController extends Controller {

    private $empService;

    use EmployeeValidators;

    public function __construct(EmpService $empService) {

        $this->empService = $empService;
    }
   
    /**
     * create employee
     */
    public function postCreateEmployee(\Illuminate\Http\Request $request) {

       if ($request->method() == "POST") {

            $validator = $validator = $this->employeeValidate(Input::all());

            if ($validator->passes()) {

                $objUser = $this->empService->employeeAdd(Input::all());

                return Redirect::to("add-employee/")
                                ->with("message", "Successfully Added.");
            } else {

                return Redirect::to("add-employee/")
                                ->withErrors($validator)
                                ->withInput();
            }
        }
        
        $employee_all = $this->empService->getAllEmployee();
        $deprtment_all = $this->empService->getPopulateDepartment();
        return view('employee/add_employee')->with(['employee_all'=>$employee_all,'deprtment_all'=>$deprtment_all]);
    }
        
    
    
}

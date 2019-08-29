<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\SalaryValidators;
use App\Services\EmpService;

class SalaryrController extends Controller {

    private $empService;

    use SalaryValidators;

    public function __construct(EmpService $empService) {

        $this->empService = $empService;
    }
   
    /**
     * create employee
     */
    public function postCreateSalary(\Illuminate\Http\Request $request) {

       if ($request->method() == "POST") {

            $validator = $validator = $this->salaryValidate(Input::all());

            if ($validator->passes()) {

                $objUser = $this->empService->salaryAdd(Input::all());

                return Redirect::to("add-saalry/")
                                ->with("message", "Successfully Added.");
            } else {

                return Redirect::to("add-saalry/")
                                ->withErrors($validator)
                                ->withInput();
            }
        }
        
        $salary_all = $this->empService->getAllSalary();
        $employee_all = $this->empService->getPopulateEmployee();
        
        return view('salary/add_salary')->with(['salary_all'=>$salary_all,'employee_all'=>$employee_all]);
    }
        
    
    
}

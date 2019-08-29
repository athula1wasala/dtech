<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\DepartmentValidators;
use App\Services\EmpService;

class DepartmentrController extends Controller {

    private $empService;

    use DepartmentValidators;

    public function __construct(EmpService $empService) {

        $this->empService = $empService;
    }
   
    /**
     * create employee
     */
    public function postCreateDepartment(\Illuminate\Http\Request $request) {

       if ($request->method() == "POST") {

            $validator = $validator = $this->departmentValidate(Input::all());

            if ($validator->passes()) {

                $objUser = $this->empService->departmentAdd(Input::all());

                return Redirect::to("add-department/")
                                ->with("message", "Successfully Added.");
            } else {

                return Redirect::to("add-department/")
                                ->withErrors($validator)
                                ->withInput();
            }
        }
        
        $deprtment_all = $this->empService->getAllDepartment();
        return view('department/add_department')->with(['department_all'=>$deprtment_all]);
    }
        
    
    
}

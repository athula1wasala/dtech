<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait EmployeeValidators {

    protected function rule($method, $data) {

        switch ($method) {
            case 'GET':

            case 'POST': {
                    return [
                        'epf_no' => 'required|unique:tbl_employee',
                        'name' => 'required|unique:tbl_employee',
                        'id_no' => 'required|unique:tbl_employee',
                        'birth_date' => 'required',
                        'join_date' => 'required',
                        'gender' => 'required|not_in:0',
                        'dep_id' => 'required|not_in:0'
                    ];
                }
            default:
                break;
        }
    }

    protected function employeeValidate(array $data, $method = "POST") {

        $messages = [

            'epf_no.required' => 'Please add Epf No',
            'name.required' => 'Please add Employee Name',
            'id_no.required' => 'Please add Identity Card',
            'birth_date.required' => 'Please add Birth Date',
            'join_date.required' => 'Please add Join Date',
            'gender.not_in' => 'Please add Gender',
            'dep_id.not_in' => 'Please add Department',
        ];
        $validator = Validator::make($data, $this->rule($method, $data), $messages);

        return $validator;
    }

}

<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait DepartmentValidators {

    protected function rule($method, $data) {

        switch ($method) {
            case 'GET':

            case 'POST': {
                    return [
                        'name' => 'required|unique:tbl_employee',
                        'location' => 'required',
                      
                    ];
                }
            default:
                break;
        }
    }

    protected function departmentValidate(array $data, $method = "POST") {

        $messages = [

            'name.required' => 'Please add Department',
            'location.required' => 'Please add Location',
          
        ];
        $validator = Validator::make($data, $this->rule($method, $data), $messages);

        return $validator;
    }

}

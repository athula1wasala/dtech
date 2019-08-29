<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait SalaryValidators {

    protected function rule($method, $data) {

        switch ($method) {
            case 'GET':

            case 'POST': {
                    return [
                        'emp_id' => 'required|not_in:0',
                        'month' => 'required',
                        'working_day' => 'required',
                    ];
                }
            default:
                break;
        }
    }

    protected function salaryValidate(array $data, $method = "POST") {

        $messages = [

            'emp_id.required' => 'Please add Employee',
            'month.required' => 'Please add Month',
            'working_day.required' => 'Please add Working Days',
        ];
        $validator = Validator::make($data, $this->rule($method, $data), $messages);

        return $validator;
    }

}

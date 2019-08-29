@include('layouts/header')
&nbsp;&nbsp;<h3>Add Salary</h3>

<div id="login-row" class="row justify-content-center align-items-center">

    <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
            {!! Form::open(array("add-add-saalry",  "method"=>"POST",'class'=>'login-form' )) !!}

            <div class="form-group">
                <label for="username" class="text-info">Employee:</label><br>
                   {{ Form::select('emp_id', $employee_all, '',['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Month:</label><br>
                <input type="month" name="month" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Work Days:</label><br>
                <input type="number" name="working_day" id="password" class="form-control">
            </div>
             <div class="form-group">
                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@isset($salary_all)
<div class="row">
    <!--Striped Rows-->
    <div class="col-md-12">
        <div class="panel panel-orange margin-bottom-40">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-globe"></i> Employee Salary Information</h3>
            </div>
            <div class="panel-body">

                <table id="example" class="table table-bordered datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Employee</th>
                            <th>Salary</th>
                              <th>Month</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salary_all as $rows)
                        <tr>
                            <td>{{$rows->deprtment }}</td>
                            <td>{{$rows->employee    }}</td>
                            <td>{{$rows->salary }}</td>
                            <td>{{$rows->month }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
@endif  

</div>
@include('layouts/footer')




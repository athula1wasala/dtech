@include('layouts/header')
&nbsp;&nbsp;<h3>Add Employee</h3>

<div id="login-row" class="row justify-content-center align-items-center">

    <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
            {!! Form::open(array("add-employee",  "method"=>"POST",'class'=>'login-form' )) !!}

            <div class="form-group">
                <label for="username" class="text-info">Name:</label><br>
                <input type="text" name="name" value=""  id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Epf No:</label><br>
                <input type="text" name="epf_no" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Address:</label><br>
                <input type="text" name="address" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Identity No:</label><br>
                <input type="text" name="id_no" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="text-info">DOB:</label><br>
                <input type="date" name="birth_date" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Join Date:</label><br>
                <input type="date" name="join_date" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Gender:</label><br>
                {{ Form::select('gender',[0=>'Select Gender', 'Male'=>'Male','Female'=>'Female'],'',['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Department:</label><br>
                {{ Form::select('dep_id', $deprtment_all, '',['class'=>'form-control']) }}
            </div>
             <div class="form-group">
                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@isset($employee_all)
<div class="row">
    <!--Striped Rows-->
    <div class="col-md-12">
        <div class="panel panel-orange margin-bottom-40">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-globe"></i> Employee Information</h3>
            </div>
            <div class="panel-body">

                <table id="example" class="table table-bordered datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Emp Id</th>
                            <th>Name</th>
                            <th>Epf No</th>
                            <th>Address</th>
                            <th>Identity No</th>
                            <th>Join Date</th>
                            <th>Gender</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employee_all as $rows)
                        <tr>
                            <td>{{$rows->emp_id }}</td>
                            <td>{{$rows->name    }}</td>
                            <td>{{$rows->epf_no }}</td>
                            <td>{{$rows->address }}</td>
                            <td>{{$rows->id_no }}</td>
                            <td>{{$rows->join_date }}</td>
                            <td>{{$rows->gender }}</td>
                                <td>{{$rows->department }}</td>
                            

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




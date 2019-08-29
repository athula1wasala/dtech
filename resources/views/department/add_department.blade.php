@include('layouts/header')
&nbsp;&nbsp;<h3>Add Department</h3>

<div id="login-row" class="row justify-content-center align-items-center">

    <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
            {!! Form::open(array("add-department",  "method"=>"POST",'class'=>'login-form' )) !!}

            <div class="form-group">
                <label for="username" class="text-info">Name:</label><br>
                <input type="text" name="name" value=""  id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Location:</label><br>
                <input type="text" name="location" id="password" class="form-control">
            </div>
             <div class="form-group">
                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@isset($department_all)
<div class="row">
    <!--Striped Rows-->
    <div class="col-md-12">
        <div class="panel panel-orange margin-bottom-40">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-globe"></i> Department Information</h3>
            </div>
            <div class="panel-body">

                <table id="example" class="table table-bordered datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Department Id</th>
                            <th>Name</th>
                            <th>Location</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($department_all as $rows)
                        <tr>
                            <td>{{$rows->dep_id }}</td>
                            <td>{{$rows->name    }}</td>
                            <td>{{$rows->location }}</td>
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




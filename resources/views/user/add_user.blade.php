@include('layouts/header')
&nbsp;&nbsp;<h3>Add User</h3>

<div id="login-row" class="row justify-content-center align-items-center">

    <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
            {!! Form::open(array("url"=> !empty($select_user)? "/update-user" : "/add-user",  "method"=>"POST",'class'=>'login-form' )) !!}

            <div class="form-group">
                <label for="username" class="text-info">Email:</label><br>
                <input type="email" name="email" value="{{ !empty($select_user)? $select_user->email : ''  }}"  id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Password:</label><br>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Role:</label><br>
                {{ Form::select('role_id', $role,!empty($select_user)? $select_user->type : '',['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
            </div>
             <?php if (!empty($select_user) ) { ?>
            {!! Form::hidden("user_id",!empty($select_user->id)? $select_user->id : '') !!}
              <?php } else { ?>
                {!! Form::hidden("user_id", '') !!}
                {!! Form::hidden("request",!empty($select_user->id)? 'edit' : 'save') !!}
            <?php } ?>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@isset($user_all)
<div class="row">
    <!--Striped Rows-->
    <div class="col-md-12">
        <div class="panel panel-orange margin-bottom-40">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-globe"></i> User Information</h3>
            </div>
            <div class="panel-body">

                <table id="example" class="table table-bordered datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user_all as $rows)
                        <tr>
                            <td>{{$rows->id }}</td>
                            <td>{{$rows->email }}</td>
                            <td>{{$rows->role }}</td>
                           <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href='{{ URL::to('user-show/' . $rows->id)}}' class="btn btn-primary btn-xs" data-title="Edit" ><span class="glyphicon glyphicon-pencil"></span></a></p></td> 
                           @if(Auth::user()->id == $rows->id ||  Auth::user()->type == 1 )
                           <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a  href='{{ URL::to('user-delete/' . $rows->id)}}' class="btn btn-danger btn-xs" data-title="Delete"  ><span class="glyphicon glyphicon-trash"></span></a></p></td>
                           @else
                           <td></td>
                           @endif
                           
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




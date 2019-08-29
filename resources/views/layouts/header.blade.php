<!DOCTYPE html>
<html lang="en">
<head>
  <title>D-tech</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
         <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">D-tech</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="{{URL::to("/add-employee")}}">Add Employee</a></li>
      <li><a href="{{URL::to("/add-department")}}">Add Department</a></li>
      <li><a href="{{URL::to("/add-saalry")}}">Add Salary</a></li>
    </ul>
       <ul class="nav navbar-nav navbar-right">
      <li><a href="{{URL::to("/add-user")}}"><span class="glyphicon glyphicon-user"></span>{{ Auth::user()->email }}</a></li>
      <li><a href="{{URL::to("/logout")}}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">

       @if ( count( $errors ) > 0 )
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {!! $error !!}<br>
        @endforeach
    </div>
    @endif

    @if (Session::has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

      @if (Session::has('messageWarning'))
  <div class="alert alert-danger">
        {{ session('messageWarning') }}
    </div>
    @endif

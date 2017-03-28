@extends('head')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Edit Employee's data</h1>
    </div>
  </div>
  <div class="row">
    <form class="" action="{{route('employees.update', $employee->id)}}" method="post">
      <input name="_method" type="hidden" value="PATCH">
      {{csrf_field()}}
      <div class="form-group{{ ($errors->has('name')) ? $errors->first('name') : '' }}">
        <input type="text" name="name" class="form-control" placeholder="Enter Name of Employee" value="{{$employee->name}}">
        {!! $errors->first('name','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group{{ ($errors->has('email')) ? $errors->first('name') : '' }}">
        <input type="text" name="email" class="form-control" placeholder="Enter Email of Employee" value="{{$employee->email}}">
        {!! $errors->first('email','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group{{ ($errors->has('address')) ? $errors->first('name') : '' }}">
        <input type="text" name="address" class="form-control" placeholder="Enter Address of Employee" value="{{$employee->address}}">
        {!! $errors->first('address','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group{{ ($errors->has('birthday')) ? $errors->first('name') : '' }}">
        <input type="text" name="birthday" class="form-control" placeholder="Enter Birthday of Employee (AAAA-MM-DD)" value="{{$employee->birthday}}">
        {!! $errors->first('birthday','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="save">
      </div>
    </form>
  </div>
  @stop

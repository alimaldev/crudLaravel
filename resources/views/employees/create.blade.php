@extends('head')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Create Data</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form class="" action="{{route('employees.store')}}" method="post">
            {{csrf_field()}}
              <div class="form-group{{ ($errors->has('name')) ? $errors->first('name') : '' }}">
               <input type="text" name="name" class="form-control" placeholder="Enter Name of Employee">
               {!! $errors->first('name','<p class="help-block">:message</p>') !!}
              </div>
              <div class="form-group{{ ($errors->has('email')) ? $errors->first('name') : '' }}">
               <input type="text" name="email" class="form-control" placeholder="Enter Email of Employee">
               {!! $errors->first('email','<p class="help-block">:message</p>') !!}
              </div>
              <div class="form-group{{ ($errors->has('birthday')) ? $errors->first('name') : '' }}">
               <input type="text" name="birthday" class="form-control" placeholder="Enter Birthday of Employee (AAAA-MM-DD)">
               {!! $errors->first('birthday','<p class="help-block">:message</p>') !!}
              </div>
              <div class="form-group{{ ($errors->has('address')) ? $errors->first('name') : '' }}">
                  <input type="text" name="address" class="form-control" placeholder="Enter Address of Employee">
                  {!! $errors->first('address','<p class="help-block">:message</p>') !!}
              </div>
              <div class="form-group{{ ($errors->has('latitude')) ? $errors->first('name') : '' }}">
                  <input type="text" name="latitude" class="form-control" placeholder="Enter Latitude">
                  {!! $errors->first('latitude','<p class="help-block">:message</p>') !!}
              </div>
              <div class="form-group{{ ($errors->has('longitude')) ? $errors->first('name') : '' }}">
                  <input type="text" name="longitude" class="form-control" placeholder="Enter Longitude">
                  {!! $errors->first('longitude','<p class="help-block">:message</p>') !!}
              </div>
            <div class="form-group">
          <input type="submit" class="btn btn-primary" value="save">
        </div>
      </form>
    </div>
  </div>














  @stop

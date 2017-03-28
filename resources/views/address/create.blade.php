@extends('head')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Edit Address of Employee</h1>
    </div>
  </div>
  <div class="row">
      <form class="" action="{{route('address.store')}}" method="post">
        <input name="_method" type="hidden" value="PATCH">
        <input name="idEmployee" type="hidden" value="{{$id}}">
        {{csrf_field()}}
        <div class="form-group{{ ($errors->has('address')) ? $errors->first('address') : '' }}">
          <input type="text" name="address" class="form-control" placeholder="Enter address of Employee">
          {!! $errors->first('address','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group{{ ($errors->has('latitude')) ? $errors->first('name') : '' }}">
          <input type="text" name="email" class="form-control" placeholder="Enter latitude of Employee">
          {!! $errors->first('latitude','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group{{ ($errors->has('longitude')) ? $errors->first('name') : '' }}">
          <input type="text" name="longitude" class="form-control" placeholder="Enter longitude of Employee">
          {!! $errors->first('longitude','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="save">
        </div>
      </form>

  </div>
  @stop

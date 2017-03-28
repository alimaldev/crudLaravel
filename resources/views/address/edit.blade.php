@extends('head')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Edit Address of Employee</h1>
    </div>
  </div>
  <a href="{{route('address.create', ['id' => $addresses[0]->idEmployee])}}" class="btn btn-info pull-right">New Address</a><br><br>
  <div class="row">

    @foreach($addresses as $address)

      <form class="" action="{{route('address.update', $address->id)}}" method="post">
        <input type="hidden" name="idEmployee" value="{{$address->idEmployee}}">
        <input name="_method" type="hidden" value="PATCH">
        {{csrf_field()}}
        <div class="form-group{{ ($errors->has('address')) ? $errors->first('address') : '' }}">
          <input type="text" name="address" class="form-control" placeholder="Enter address of Employee" value="{{$address->address}}">
          {!! $errors->first('address','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group{{ ($errors->has('latitude')) ? $errors->first('name') : '' }}">
          <input type="text" name="latitude" class="form-control" placeholder="Enter latitude of Employee" value="{{$address->latitude}}">
          {!! $errors->first('latitude','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group{{ ($errors->has('longitude')) ? $errors->first('name') : '' }}">
          <input type="text" name="longitude" class="form-control" placeholder="Enter longitude of Employee" value="{{$address->longitude}}">
          {!! $errors->first('longitude','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="save">
        </div>
      </form>


    @endforeach

  </div>
  @stop

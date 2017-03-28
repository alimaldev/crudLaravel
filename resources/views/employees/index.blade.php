@extends('head')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Administrator Employees</h1>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            <a href="{{route('employees.create')}}" class="btn btn-info pull-right">New Employee</a><br><br>
          <?php $no=1; ?>
            @foreach($employees as $employee)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->birthday}}</td>
                    <td><a href="{{route('address.edit', $employee->id)}}" class="btn btn-primary">Edit Address</a></td>
                    <td>
                        <form class="" action="{{route('employees.destroy',$employee->id)}}" method="post">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-primary">Edit</a>
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');" name="name" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@stop
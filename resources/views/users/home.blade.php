@extends('templates/base')
@section('content')
 <h1>Users</h1>
 <p>Hello! {{$user->firstname}} {{$user->lastname}}</p>
 <a href="{{url('/user/create')}}" class="btn btn-success">Create User</a>
 <a href="{{url('/logout')}}" class="btn btn-danger">Logout</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>Firstname</th>
         <th>Lastname</th>
         <th>Email</th>
         <th>Password</th>
         <th>Secret</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($users as $user)
         <tr>
             <td>{{ $user->id }}</td>
             <td>{{ $user->firstname }}</td>
             <td>{{ $user->lastname }}</td>
             <td>{{ $user->email }}</td>
             <td>{{ $user->password }}</td>
             <td>{{ $user->secret }}</td>
             <td><a href="{{url('user',$user->id)}}" class="btn btn-primary">Read</a></td>
             <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['user.destroy', $user->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
@stop
@extends('templates/base')
@section('content')
<h1>Update User</h1>
    {!! Form::model($user,['method' => 'PATCH','route'=>['user.update',$user->id]]) !!}
    <div class="form-group">
        {!! Form::label('Firstname', 'Firstname:') !!}
        {!! Form::text('firstname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Lastname', 'Lastname:') !!}
        {!! Form::text('lastname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Email', 'Email:') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop
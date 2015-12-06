@extends('templates/base')
@section('content')
<h1>Login</h1>
@if (Session::has('flash_error'))
     <div id="flash_error" class="alert alert-danger">{{ Session::get('flash_error') }}</div>
 @endif
{!! Form::open(['url' => 'login', 'method' => 'POST']) !!}
<div class="form-group">
    {!! Form::label('Email', 'Email:') !!}
    {!! Form::text('email',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Password', 'Password:') !!}
    {!! Form::text('password',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('OTP', 'OTP:') !!}
    {!! Form::text('otp',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}
@stop
@extends('templates/base')
@section('content')
 <h1>Users</h1>
 <a href="{{url('home')}}" class="btn btn-success">Home</a>
 <hr>
 <img src="{{$qrcode}}" alt="QRCODE">

@stop
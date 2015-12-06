@extends('templates/base')
@section('content')
    <h1>User Show</h1>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">firstname</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$user->firstname}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">lastname</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$user->lastname}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder={{$user->email}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="author" class="col-sm-2 control-label">password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" placeholder={{$user->password}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="publisher" class="col-sm-2 control-label">secret</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="publisher" placeholder={{$user->secret}} readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('home')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
@stop
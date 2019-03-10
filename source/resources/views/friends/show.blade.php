@extends('layout')
@section('header')
<div class="page-header">
        <h1>Friends / Show #{{$friend->id}}</h1>
        <form action="{{ route('friends.destroy', $friend->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('friends.edit', $friend->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="request_user_id">REQUEST_USER_ID</label>
                     <p class="form-control-static">{{$friend->request_user_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="accept_user_id">ACCEPT_USER_ID</label>
                     <p class="form-control-static">{{$friend->accept_user_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="flg_request">FLG_REQUEST</label>
                     <p class="form-control-static">{{$friend->flg_request}}</p>
                </div>
                    <div class="form-group">
                     <label for="flg_block">FLG_BLOCK</label>
                     <p class="form-control-static">{{$friend->flg_block}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('friends.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection
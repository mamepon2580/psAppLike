@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Friends / Edit #{{$friend->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('friends.update', $friend->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('request_user_id')) has-error @endif">
                       <label for="request_user_id-field">Request_user_id</label>
                    <input type="text" id="request_user_id-field" name="request_user_id" class="form-control" value="{{ is_null(old("request_user_id")) ? $friend->request_user_id : old("request_user_id") }}"/>
                       @if($errors->has("request_user_id"))
                        <span class="help-block">{{ $errors->first("request_user_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('accept_user_id')) has-error @endif">
                       <label for="accept_user_id-field">Accept_user_id</label>
                    <input type="text" id="accept_user_id-field" name="accept_user_id" class="form-control" value="{{ is_null(old("accept_user_id")) ? $friend->accept_user_id : old("accept_user_id") }}"/>
                       @if($errors->has("accept_user_id"))
                        <span class="help-block">{{ $errors->first("accept_user_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('flg_request')) has-error @endif">
                       <label for="flg_request-field">Flg_request</label>
                    <input type="text" id="flg_request-field" name="flg_request" class="form-control" value="{{ is_null(old("flg_request")) ? $friend->flg_request : old("flg_request") }}"/>
                       @if($errors->has("flg_request"))
                        <span class="help-block">{{ $errors->first("flg_request") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('flg_block')) has-error @endif">
                       <label for="flg_block-field">Flg_block</label>
                    <input type="text" id="flg_block-field" name="flg_block" class="form-control" value="{{ is_null(old("flg_block")) ? $friend->flg_block : old("flg_block") }}"/>
                       @if($errors->has("flg_block"))
                        <span class="help-block">{{ $errors->first("flg_block") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('friends.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection

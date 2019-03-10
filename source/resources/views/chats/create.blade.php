@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Chats / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('chats.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('send_user_id')) has-error @endif">
                       <label for="send_user_id-field">Send_user_id</label>
                    <input type="text" id="send_user_id-field" name="send_user_id" class="form-control" value="{{ old("send_user_id") }}"/>
                       @if($errors->has("send_user_id"))
                        <span class="help-block">{{ $errors->first("send_user_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('receive_user_id')) has-error @endif">
                       <label for="receive_user_id-field">Receive_user_id</label>
                    <input type="text" id="receive_user_id-field" name="receive_user_id" class="form-control" value="{{ old("receive_user_id") }}"/>
                       @if($errors->has("receive_user_id"))
                        <span class="help-block">{{ $errors->first("receive_user_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('text')) has-error @endif">
                       <label for="text-field">Text</label>
                    <input type="text" id="text-field" name="text" class="form-control" value="{{ old("text") }}"/>
                       @if($errors->has("text"))
                        <span class="help-block">{{ $errors->first("text") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('chats.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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

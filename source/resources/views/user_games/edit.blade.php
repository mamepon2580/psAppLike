@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> User_games / Edit #{{$user_game->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('user_games.update', $user_game->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('user_id')) has-error @endif">
                       <label for="user_id-field">User_id</label>
                    <input type="text" id="user_id-field" name="user_id" class="form-control" value="{{ is_null(old("user_id")) ? $user_game->user_id : old("user_id") }}"/>
                       @if($errors->has("user_id"))
                        <span class="help-block">{{ $errors->first("user_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('game_id')) has-error @endif">
                       <label for="game_id-field">Game_id</label>
                    <input type="text" id="game_id-field" name="game_id" class="form-control" value="{{ is_null(old("game_id")) ? $user_game->game_id : old("game_id") }}"/>
                       @if($errors->has("game_id"))
                        <span class="help-block">{{ $errors->first("game_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('game_rank')) has-error @endif">
                       <label for="game_rank-field">Game_rank</label>
                    <input type="text" id="game_rank-field" name="game_rank" class="form-control" value="{{ is_null(old("game_rank")) ? $user_game->game_rank : old("game_rank") }}"/>
                       @if($errors->has("game_rank"))
                        <span class="help-block">{{ $errors->first("game_rank") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('user_games.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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

@extends('layout')
@section('header')
<div class="page-header">
        <h1>User_games / Show #{{$user_game->id}}</h1>
        <form action="{{ route('user_games.destroy', $user_game->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('user_games.edit', $user_game->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="user_id">USER_ID</label>
                     <p class="form-control-static">{{$user_game->user_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="game_id">GAME_ID</label>
                     <p class="form-control-static">{{$user_game->game_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="game_rank">GAME_RANK</label>
                     <p class="form-control-static">{{$user_game->game_rank}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('user_games.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection
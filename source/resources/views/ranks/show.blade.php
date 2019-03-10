@extends('layout')
@section('header')
<div class="page-header">
        <h1>Ranks / Show #{{$rank->id}}</h1>
        <form action="{{ route('ranks.destroy', $rank->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('ranks.edit', $rank->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="game_id">GAME_ID</label>
                     <p class="form-control-static">{{$rank->game_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="rank_int">RANK_INT</label>
                     <p class="form-control-static">{{$rank->rank_int}}</p>
                </div>
                    <div class="form-group">
                     <label for="rank_str">RANK_STR</label>
                     <p class="form-control-static">{{$rank->rank_str}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('ranks.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection
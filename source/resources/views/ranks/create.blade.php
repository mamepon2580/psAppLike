@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Ranks / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('ranks.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('game_id')) has-error @endif">
                       <label for="game_id-field">Game_id</label>
                    <input type="text" id="game_id-field" name="game_id" class="form-control" value="{{ old("game_id") }}"/>
                       @if($errors->has("game_id"))
                        <span class="help-block">{{ $errors->first("game_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('rank_int')) has-error @endif">
                       <label for="rank_int-field">Rank_int</label>
                    <input type="text" id="rank_int-field" name="rank_int" class="form-control" value="{{ old("rank_int") }}"/>
                       @if($errors->has("rank_int"))
                        <span class="help-block">{{ $errors->first("rank_int") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('rank_str')) has-error @endif">
                       <label for="rank_str-field">Rank_str</label>
                    <input type="text" id="rank_str-field" name="rank_str" class="form-control" value="{{ old("rank_str") }}"/>
                       @if($errors->has("rank_str"))
                        <span class="help-block">{{ $errors->first("rank_str") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('ranks.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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

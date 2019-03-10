@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Friends
            <a class="btn btn-success pull-right" href="{{ route('friends.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($friends->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>REQUEST_USER_ID</th>
                        <th>ACCEPT_USER_ID</th>
                        <th>FLG_REQUEST</th>
                        <th>FLG_BLOCK</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($friends as $friend)
                            <tr>
                                <td>{{$friend->id}}</td>
                                <td>{{$friend->request_user_id}}</td>
                    <td>{{$friend->accept_user_id}}</td>
                    <td>{{$friend->flg_request}}</td>
                    <td>{{$friend->flg_block}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('friends.show', $friend->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('friends.edit', $friend->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('friends.destroy', $friend->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $friends->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
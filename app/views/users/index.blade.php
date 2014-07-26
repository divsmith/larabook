@extends('layouts.default')

@section('content')
    <h1>All Users</h1>

    @foreach( $users as $user )
        <div class="col-md-3">
            @include('layouts.partials.avatar')
            {{ $user->username }}
        </div>
    @endforeach
@stop
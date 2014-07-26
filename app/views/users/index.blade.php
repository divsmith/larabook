@extends('layouts.default')

@section('content')
    <h1>All Users</h1>

    @foreach( $users as $user )
        <li>
            {{ $user->username }}
        </li>
    @endforeach
@stop
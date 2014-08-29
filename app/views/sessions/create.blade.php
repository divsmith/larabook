@extends('layouts.default')

@section('content')
    <h1>Sign In!</h1>

    <div class="row">
        <div class="col-md-6">

        {{ Form::open(['route' => 'login_path']) }}
            <!-- Email Form Input -->
            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
            </div>

            <!-- Password Form Input -->
            <div class="form-group">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Sign In', ['class' => 'btn btn-primary']) }}
                {{ link_to('/password/remind', 'Forgot your password?') }}
            </div>
        {{ Form::close() }}

        </div>
    </div>
@stop
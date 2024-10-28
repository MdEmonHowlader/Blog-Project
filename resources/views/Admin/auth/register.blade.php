@extends('Admin.auth.layouts.master')
@section('page1_title', 'Register')
@section('content')
        {!! Form::open(['method'=>'post', 'route'=>'register']) !!}
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class'=>'form-control form-control-sm']) !!}
        {!! Form::label('email', 'Email', ['class'=>'mt-2']) !!}
        {!! Form::email('email', null, ['class'=>'form-control form-control-sm']) !!}
        {!! Form::label('password', 'Password',['class'=>'mt-3']) !!}
        {!! Form::password('password', ['class'=>'form-control form-control-sm']) !!}
        {!! Form::label('password_confirmation', 'Confirmation',['class'=>'mt-3']) !!}
        {!! Form::password('password_confirmation', ['class'=>'form-control form-control-sm']) !!}
        <div class="d-grid">
            {!! Form::button('Login', ['type'=>'submit', 'class'=>'btn btn-info btn-sm mt-3']) !!}
        </div>
        {!! Form::close() !!}
        <p class="mt-2">
            Forgot Password
            <a href="{{ route('password.request') }}">Register Here</a>
        </p>
        <p>
            Not Registered
            <a href="{{ route('register') }}">Register Here</a>
        </p>
@endsection
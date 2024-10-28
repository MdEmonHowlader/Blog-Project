@extends('Admin.auth.layouts.master')
@section('page1_title', 'Login')
@section('content')
    {!! Form::open([]) !!}
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, [
        'class' => $errors->has('email') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm',
    ]) !!}
    @error('email')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <div class="d-grid">
        {!! Form::button('Reset', ['type' => 'submit', 'class' => 'btn btn-info btn-sm mt-3']) !!}
    </div>
    {!! Form::close() !!}
    <p class="mt-2">
        Already login
        <a href="{{ route('login') }}">Login Here</a>
    </p>
    <p>
        Not Registered
        <a href="{{ route('register') }}">Register Here</a>
    </p>
@endsection
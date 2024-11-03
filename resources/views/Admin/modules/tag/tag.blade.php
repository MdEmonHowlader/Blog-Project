@extends('Admin.layouts.master')
@section('page_title', 'Tag')
@section('sub_title', 'Create')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Create Tag</h4>
                        <a href="{{ route('tag.index') }}"><button class="btn btn-success btn-sm mt-1">
                            Back</button></a>
                    </div
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
                    {!! Form::open(['method' => 'post', 'route' => 'tag.store']) !!}
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, [
                        'id' => 'name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter tag name',
                    ]) !!}
                    {!! Form::label('slug', 'Slug:') !!}
                    {!! Form::text('slug', null, [
                        'id' => 'slug',
                        'class' => 'form-control',
                        'placeholder' => 'Enter tag slug',
                    ]) !!}
                    {!! Form::label('order_by', 'tag Serial', ['class' => 'mt-2']) !!}
                    {!! Form::number('order_by', null, ['class' => 'form-control', 'placeholder' => 'Enter tag serial']) !!}
                    {!! Form::label('status', 'Category Status', ['class' => 'mt-2']) !!}
                    {!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, [
                        'class' => 'form-control',
                        'placeholder' => 'Select category status',
                    ]) !!}
                    {!! Form::button('Create tag', ['type' => 'submit', 'class' => 'btn btn-success mt-2']) !!}
                    {!! Form::close() !!}
                 
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $('#name').on('input', function() {
                let name = $(this).val()
                let slug = name.replaceAll(' ', '-')
                $('#slug').val(slug.toLowerCase());
            })
        </script>
    @endpush


@endsection

@extends('Admin.layouts.master')
@section('page_title', 'Sub Category')
@section('sub_title', 'Create')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Create Sub Categroy</h4>
                        <a href="{{ route('subCategory.index') }}"><button class="btn btn-success btn-sm mt-1">
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
                
                    {!! Form::open(['method' => 'post', 'route' => 'subCategory.store']) !!}
                   @include('Admin.modules.subCategory.form')
                    {!! Form::button('Create Sub Categroy', ['type' => 'submit', 'class' => 'btn btn-success mt-2']) !!}
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

@extends('Admin.layouts.master')
@section('page_title', ' Category')
@section('sub_title', 'Create')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Create Categroy</h4>
                        <a href="{{ route('categroy.index') }}"><button class="btn btn-success btn-sm mt-1">
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
                
                    {!! Form::open(['method' => 'post', 'route' => 'categroy.store']) !!}
                    @include('Admin.modules.categroy.form')
                    {!! Form::button('Create Categroy', ['type' => 'submit', 'class' => 'btn btn-success mt-2']) !!}
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

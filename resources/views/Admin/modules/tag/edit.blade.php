@extends('Admin.layouts.master')
@section('page_title', 'Tag')
@section('sub_title', 'Edit')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Tag Update</h4>
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
                    {!! Form::model($tag,['method' => 'put', 'route' => ['tag.update', $tag->id]]) !!}
                    @include('Admin.modules.tag.form')
                
                    {!! Form::button('Update Tag', ['type' => 'submit', 'class' => 'btn btn-success mt-2']) !!}
                    {!! Form::close() !!}
                    <a href="{{ route('tag.index') }}"><button class="btn btn-success btn-sm mt-1">
                        Back</button></a>
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
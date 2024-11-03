@extends('Admin.layouts.master')
@section('page_title', 'Categroy')
@section('sub_title', 'List')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Categroy List</h4>
                        <a href="{{ route('categroy.create') }}"><button class="btn btn-success btn-sm">Add</button></a>

                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Order By</th>
                                <th>Create At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sl = 1;
                            @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $category->order_by }}</td>
                                    <td>{{ $category->created_at->toDayDateTimeString() }}</td>
                                    <td>{{ $category->created_at != $category->updated_at ? $category->updated_at->toDayDateTimeString() : 'Not Updated' }}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('categroy.show', $category->id) }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button></a>
                                                <a href="{{ route('categroy.edit', $category->id) }}">
                                                    <button class="btn btn-warning btn-sm">
                                                        <i class="fa-solid fa-edit"></i>
                                                    </button></a>
    
                                                {!! Form::open(['method'=>'delete', 'route'=>['categroy.destroy', $category->id]]) !!}
                                                {!! Form::button('<i class="fa-solid fa-trash"></i>', ['type'=>'submit', 'class'=>'btn btn-danger btn-sm ']) !!}
                                                {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
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

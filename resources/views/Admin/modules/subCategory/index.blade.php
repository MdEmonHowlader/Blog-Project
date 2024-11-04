@extends('Admin.layouts.master')
@section('page_title', 'Sub Category')
@section('sub_title', 'List')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Sub Categroy List</h4>
                        <a href="{{ route('subCategory.create') }}"><button class="btn btn-success btn-sm">Add</button></a>

                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Categroy</th>
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
                            @foreach ($subCategorys as $subCategory)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $subCategory->name }}</td>
                                    <td>{{ $subCategory->category->name}}</td>
                                    <td>{{ $subCategory->slug }}</td>
                                    <td>{{ $subCategory->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $subCategory->order_by }}</td>
                                    <td>{{ $subCategory->created_at->toDayDateTimeString() }}</td>
                                    <td>{{ $subCategory->created_at != $subCategory->updated_at ? $subCategory->updated_at->toDayDateTimeString() : 'Not Updated' }}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('subCategory.show', $subCategory->id) }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button></a>
                                                <a href="{{ route('subCategory.edit', $subCategory->id) }}">
                                                    <button class="btn btn-warning btn-sm">
                                                        <i class="fa-solid fa-edit"></i>
                                                    </button></a>
    
                                                {!! Form::open(['method'=>'delete', 'route'=>['subCategory.destroy', $subCategory->id]]) !!}
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

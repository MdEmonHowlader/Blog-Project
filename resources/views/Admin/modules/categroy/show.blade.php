@extends('Admin.layouts.master')
@section('page_title', 'Categroy')
@section('sub_title', 'Details')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Categroy Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>
                                    {{ $category->id }}
                                </td>

                            </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>
                                        {{ $category->name }}
                                    </td>

                                </tr>
                                <tr><th>Slug</th>
                                    <td>
                                        {{ $category->slug }}
                                    </td>

                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        {{ $category->status == 1 ? 'Active' : 'Inactive' }}
                                    </td>

                                </tr>
                                <tr>
                                    <th>Order By</th>
                                    <td>{{ $category->order_by }}</td>
                                </tr>
                                
                                <tr>
                                    <th>Create At</th>
                                    <td>
                                        {{ $category->created_at->toDayDateTimeString() }}
                                    </td>
                                </tr>
                               <tr>
                                <th>Updated At</th>
                                <td>
                                    {{ $category->created_at != $category->updated_at ? $category->updated_at->toDayDateTimeString() : 'Not Updated' }}
                                </td>
                               </tr>
                                
                                
                            
                        </tbody>
                    </table>
                    <a href="{{ route('categroy.index') }}"><button class="btn btn-success btn-sm mt-1">
                        Back</button></a>
                </div>
            </div>
        </div>
    </div>

@endsection

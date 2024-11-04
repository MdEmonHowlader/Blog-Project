@extends('Admin.layouts.master')
@section('page_title', 'Sub Categroy')
@section('sub_title', 'Details')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Sub Categroy Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>
                                    {{ $subCategroy->id }}
                                </td>

                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>
                                    {{ $subCategroy->name }}
                                </td>

                            </tr>
                         
                            <tr>
                                <th>Slug</th>
                                <td>
                                    {{ $subCategroy->slug }}
                                </td>

                            </tr>
                            <tr>
                                <th>Category Name</th>
                                <td>
                                    {{ $subCategroy->category?->name }}
                                </td>

                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    {{ $subCategroy->status == 1 ? 'Active' : 'Inactive' }}
                                </td>

                            </tr>
                            <tr>
                                <th>Order By</th>
                                <td>{{ $subCategroy->order_by }}</td>
                            </tr>

                            <tr>
                                <th>Create At</th>
                                <td>
                                    {{ $subCategroy->created_at->toDayDateTimeString() }}
                                </td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>
                                    {{ $subCategroy->created_at != $subCategroy->updated_at ? $subCategroy->updated_at->toDayDateTimeString() : 'Not Updated' }}
                                </td>
                            </tr>



                        </tbody>
                    </table>
                    <a href="{{ route('subCategory.index') }}"><button class="btn btn-success btn-sm mt-1">
                            Back</button></a>
                </div>
            </div>
        </div>
    </div>

@endsection

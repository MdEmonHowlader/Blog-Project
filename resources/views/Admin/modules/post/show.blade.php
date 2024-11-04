@extends('Admin.layouts.master')
@section('page_title', 'post')
@section('sub_title', 'Details')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>post Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>
                                    {{ $post->id }}
                                </td>

                            </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>
                                        {{ $post->name }}
                                    </td>

                                </tr>
                                <tr><th>Slug</th>
                                    <td>
                                        {{ $post->slug }}
                                    </td>

                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        {{ $post->status == 1 ? 'Active' : 'Inactive' }}
                                    </td>

                                </tr>
                                <tr>
                                    <th>Order By</th>
                                    <td>{{ $post->order_by }}</td>
                                </tr>
                                
                                <tr>
                                    <th>Create At</th>
                                    <td>
                                        {{ $post->created_at->toDayDateTimeString() }}
                                    </td>
                                </tr>
                               <tr>
                                <th>Updated At</th>
                                <td>
                                    {{ $post->created_at != $post->updated_at ? $post->updated_at->toDayDateTimeString() : 'Not Updated' }}
                                </td>
                               </tr>
                                
                                
                            
                        </tbody>
                    </table>
                    <a href="{{ route('post.index') }}"><button class="btn btn-success btn-sm mt-1">
                        Back</button></a>
                </div>
            </div>
        </div>
    </div>

@endsection

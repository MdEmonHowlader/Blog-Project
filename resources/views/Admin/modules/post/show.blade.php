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
                                    {{ $posts->id }}
                                </td>

                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>
                                    {{ $posts->title }}
                                </td>

                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>
                                    {{ $posts->slug }}
                                </td>

                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    {{ $posts->status == 1 ? 'Active' : 'Inactive' }}
                                </td>

                            </tr>
                            <tr>
                                <th>Create At</th>
                                <td>
                                    {{ $posts->created_at->toDayDateTimeString() }}
                                </td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>
                                    {{ $posts->created_at != $posts->updated_at ? $posts->updated_at->toDayDateTimeString() : 'Not Updated' }}
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

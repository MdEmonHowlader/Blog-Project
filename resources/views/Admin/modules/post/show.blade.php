@extends('Admin.layouts.master')
@section('page_title', 'Post')
@section('sub_title', 'Details')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Post Details</h4>
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
                                <th>Category</th>
                                <td>
                                    {{ optional($posts->category)->name ?? 'Not Available' }}
                                </td>
                            <tr>
                                <tr>
                                    <th>Sub Category</th>
                                    <td>
                                        {{ optional($posts->subCategory)->name ?? 'Not Available' }}
                                    </td>
                                </tr>

                                <th>Status</th>
                                <td>
                                    {{ $posts->status == 1 ? 'Published' : 'Not Published' }}
                                </td>

                            </tr>
                            <tr>
                                <th>Is Approved</th>
                                <td>
                                    {{ $posts->is_approved == 1 ? 'Approved' : 'Not Approved' }}
                                </td>
                            <tr>
                                <tr>
                                    <th>
                                        Description
                                    </th>
                                    <td>
                                        {!! $posts->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Admin</th>
                                    <td>
                                        {{ optional($posts->admin)->name ?? 'Not Available' }}

                                    </td>
                                </tr>
                             
                           
                                <th>Create At</th>
                                    <td>
                                        {{ optional($posts->created_at)->toDayDateTimeString() ?? 'Not Available' }}
                                    </td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>
                                    {{-- {{ $posts->created_at != $posts->updated_at ? $posts->updated_at->toDayDateTimeString() : 'Not Updated' }} --}}
                                    {{ $posts->created_at != $posts->updated_at 
                                        ? optional($posts->updated_at)->toDayDateTimeString() 
                                        : 'Not Updated' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Deleted At
                                </th>
                                <td>
                                    {{ optional($posts->deleted_at)->toDayDateTimeString() ?? 'Not Available' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td>
                                    <img id="post_image" src="{{ url('image/post/thumbnail/'.$posts->photo) }}" alt="{{ $posts->title }}" width="100" height="100" >
                                </td>
                            </tr>
                            <tr>
                                <th>Tag</th>
                                <td>
                                    @foreach ($posts->tag as $tag)
                                        <span class="btn btn-warning" >{{ $tag->name }}</span>
                                    @endforeach
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

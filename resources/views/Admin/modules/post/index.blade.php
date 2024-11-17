@extends('Admin.layouts.master')

@section('page_title', 'Post')
@section('sub_title', 'List')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Post List</h4>
                        <a href="{{ route('post.create') }}">
                            <button class="btn btn-success btn-sm">Add</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th >
                                    <p>Title</p>
                                  
                                    <p>Slug</p>
                                </th>
                                <th>
                                    <p>Category</p>
                                 
                                    <p>Sub Category</p>
                                </th>
                                <th>
                                    <p>Status</p>
                                  
                                    <p>Is Approved</p>
                                </th>
                                <th>Photo</th>
                                <th>Tage</th>
                                <th>
                                    <p>Create At</p>
                                    
                                    <p>Updated At</p>
                                </th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sl = 1;
                            @endphp
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>
                                        <p>{{ $post->title }}</p>

                                        <p>{{ $post->slug }}</p>
                                    </td>
                                    <td>
                                        <p>                                           
                                                {{ $post->category->slug }}

                                            
                                        </p>

                                        <p>{{ $post->subcategory->slug ?? ''}}</p>
                                    </td>
                                    <td>
                                        <p>{{ $post->status == 1 ? 'Published' : 'Not Published' }}</p>

                                        <p>{{ $post->is_approved == 1 ? 'Approved' : 'Not Approved' }}</p>
                                    </td>
                                    <td>
                                        <img id="post_image" src="{{ url('image/post/thumbnail/'.$post->photo) }}" alt="{{ $post->title }}" width="80" height="100">
                                    </td>
                                    <td>
                                        @foreach ($post->tag as $tag)
                                            <span class="btn btn-success md-1">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                               
                                    <td>
                                        <p>{{ $post->created_at->toDayDateTimeString() }}</p>

                                        <p>

                                            {{-- {{ $post->created_at != $post->updated_at ? $post->updated_at->toDayDateTimeString() : 'Not Updated' }}  --}}
                                            {{ $post->created_at != $post->updated_at 
                                                ? optional($post->updated_at)->toDayDateTimeString() 
                                                : 'Not Updated' }}
                                        </p>
                                        <p>{{ $post->user?->name }}</p>
                                    </td>
                                         
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('post.show', $post->id) }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('post.edit', $post->id) }}">
                                                <button class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-edit"></i>
                                                </button>
                                            </a>
                                            {!! Form::open(['method' => 'delete', 'route' => ['post.destroy', $post->id]]) !!}
                                            {!! Form::button('<i class="fa-solid fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $posts->links() }}

                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('js')
        {{-- <script>
            $('#name').on('input', _.debounce(function() {
                let name = $(this).val();
                let slug = name.replaceAll(' ', '-');
                $('#slug').val(slug.toLowerCase());
            }, 300)); // Adjust debounce delay as needed
        </script> --}}
    @endpush
@endsection

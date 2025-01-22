@extends('Frontend.layouts.master')
@section('page_title', 'Welcome')
@section('banner')
@include('Frontend.includes.banner')
@endsection
@section('content')
    @foreach ($posts as $post)
    <div class="col-lg-12">
        <div class="blog-post">
            <div class="blog-thumb">
                <img src="{{$post->photo}}" alt="{{ $post->title }}">
            </div>
            <div class="down-content">
                <span>{{ $post->category?->name }}</span>
                <a href="{{ route('single.post', $post->slug) }}">
                    <h4>{{ $post->title }}</h4>
                </a>
                <ul class="post-info">
                    <li><a href="#">{{ $post->user?->name }}</a></li>
                    <li><a href="#">{{ $post->created_at->format('M d, Y') }}</a></li>
                    {{-- <li><a href="#">12 Comments</a></li> --}}
                </ul>
                <p>Stand Blog is a free HTML CSS template for your CMS theme. You can easily
                    adapt or customize it for any kind of CMS or website builder. You are
                    allowed to use it for your business. You are NOT allowed to re-distribute
                    the template ZIP file on any template collection site for the download
                    purpose. <a rel="nofollow" href="https://templatemo.com/contact" target="_parent">Contact TemplateMo</a>
                    for more info. Thank you.</p>
                <div class="post-options">
                    <div class="row">
                        <div class="col-6">
                            <ul class="post-tags">
                                <li><i class="fa fa-tags"></i></li>
                                @foreach ($tags as $tag)
                                <li><a href="">{{ $tag->name }}</a>,</li>
                                    
                                @endforeach
                                
                               
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="post-share">
                                <li><i class="fa fa-share-alt"></i></li>
                                <li><a href="#">Facebook</a>,</li>
                                <li><a href="#"> Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    @endforeach

  
    <div class="col-lg-12">
        <div class="main-button">
            <a href="blog.html">View All Posts</a>
        </div>
    </div>
@endsection

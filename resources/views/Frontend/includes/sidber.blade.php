<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">
            <div class="col-lg-12">
                <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="#">
                        <input type="text" name="q" class="searchText"
                            placeholder="type to search..." autocomplete="on">
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                        <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach ( $recent_posts as  $post)
                            <li><a href="{{ route('emon.post', $post->slug) }}">
                                    <h5>{{ $post->title }}</h5>
                                    <span>{{ $post->created_at->format('M d, Y') }}</span>
                                </a></li>
                                
                            @endforeach
                           
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                        <h2>Categories</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach ($categories as $category)
                            <li><a href="{{ route('emon.category',$category->slug) }}">{{ $category->name }}</a>
                                <ul class="sidebar-sub-categories">
                                    @foreach ($category->sub_categories as $subcategory)
                                    <li><a href="{{ route('emon.subCategory', [$category->slug, $subcategory->slug]) }}">{{ $subcategory->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                            
                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                        <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach ($tags as $tag)
                            <li><a href="{{ route('emon.tag', $tag->slug) }}">{{ $tag->name }}</a></li>
                                
                            @endforeach
                            
                  
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
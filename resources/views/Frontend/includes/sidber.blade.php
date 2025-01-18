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
                            <li><a href="post-details.html">
                                    <h5>Vestibulum id turpis porttitor sapien facilisis scelerisque</h5>
                                    <span>May 31, 2020</span>
                                </a></li>
                            <li><a href="post-details.html">
                                    <h5>Suspendisse et metus nec libero ultrices varius eget in risus
                                    </h5>
                                    <span>May 28, 2020</span>
                                </a></li>
                            <li><a href="post-details.html">
                                    <h5>Swag hella echo park leggings, shaman cornhole ethical coloring
                                    </h5>
                                    <span>May 14, 2020</span>
                                </a></li>
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
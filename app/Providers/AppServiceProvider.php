<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Categroy;
use App\Models\Tag;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        $categories = Categroy::with('sub_categories')->where('status', 1)->orderBy('order_by', 'asc')->get();
        $tags= Tag::where('status', 1)->orderBy('order_by', 'asc')->get();
        $recent_posts = Post::where('is_approved', 1)->where('status', 1)->limit(5)->get();
        view()->share(['categories'=>$categories, 'tags'=>$tags, 'recent_posts'=>$recent_posts]);
    }
    
}

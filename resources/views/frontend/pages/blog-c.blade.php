@extends('frontend.layouts.master-c')

@section('title','E-SHOP || Blog Page')

@section('main-content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog-section row">
                    @foreach($posts as $post)
                        {{-- {{$post}} --}}
                        <div class="col-md-6 col-lg-4">
                            <article class="post">
                                <div class="post-media">
                                    <a href="{{route('blog.detail',$post->slug)}}">
                                        <img src="{{$post->photo}}" alt="{{$post->photo}}" width="225"
                                            height="280">
                                    </a>
                                    <div class="post-date">
                                        <span class="day">{{$post->created_at->format('d')}}</span>
                                        <span class="month">{{$post->created_at->format('D')}}</span>
                                    </div>
                                </div><!-- End .post-media -->

                                <div class="post-body">
                                    <h2 class="post-title">
                                        <a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a>
                                    </h2>
                                    <div class="post-content">
                                        <p>{!! html_entity_decode($post->summary) !!}</p>
                                        <a href="{{route('blog.detail',$post->slug)}}" class="more-btn">Continue Reading</a>
                                    </div><!-- End .post-content -->
                                    <a href="{{route('blog.detail',$post->slug)}}" class="post-comment">0 Comments</a>
                                </div><!-- End .post-body -->
                            </article><!-- End .post -->
                        </div>
                    @endforeach
                    <div class="col-12">
                        <!-- Pagination -->
                        {{-- {{$posts->appends($_GET)->links()}} --}}
                        <!--/ End Pagination -->
                    </div>
                    </div>
                </div><!-- End .col-lg-9 -->

                <div class="sidebar-toggle custom-sidebar-toggle">
                    <i class="fas fa-sliders-h"></i>
                </div>
                <div class="sidebar-overlay"></div>
                <aside class="sidebar mobile-sidebar col-lg-3">
                    <div class="sidebar-wrapper" data-sticky-sidebar-options='{"offsetTop": 72}'>
                        <div class="widget widget-categories">
                            <h4 class="widget-title">Blog Categories</h4>

                            <ul class="list">
                                @if(!empty($_GET['category']))
                                    @php
                                        $filter_cats=explode(',',$_GET['category']);
                                    @endphp
                                @endif
                                <form action="{{route('blog.filter')}}" method="POST">
                                    @csrf
                                    {{-- {{count(Helper::postCategoryList())}} --}}
                                    @foreach(Helper::postCategoryList('posts') as $cat)
                                
                                    <li>
                                        <a href="{{route('blog.category',$cat->slug)}}">{{$cat->title}}</a>
                                    </li>
                                    @endforeach
                            </ul>
                        </div><!-- End .widget -->

                        <div class="widget widget-post">
                            <h4 class="widget-title">Recent Posts</h4>

                            <ul class="simple-post-list">
                            @foreach($recent_posts as $post) 
                                <li>
                                    <div class="post-media">
                                        <a href="#">
                                            <img src="{{$post->photo}}" alt="{{$post->photo}}">
                                        </a>
                                    </div><!-- End .post-media -->
                                    <div class="post-info">
                                        <a href="#">{{substr($post->title,-25)}}...</a>
                                        <div class="post-meta">{{$post->created_at->format('d M, y')}}</div>
                                        <!-- End .post-meta -->
                                    </div><!-- End .post-info -->
                                </li>
                            @endforeach
                            </ul>
                        </div><!-- End .widget -->

                        <div class="widget">
                            <h4 class="widget-title">Tags</h4>

                            <div class="tagcloud">
                            @if(!empty($_GET['tag']))
                                    @php
                                        $filter_tags=explode(',',$_GET['tag']);
                                    @endphp
                                @endif
                                <form action="{{route('blog.filter')}}" method="POST">
                                    @csrf
                                    @foreach(Helper::postTagList('posts') as $tag)
                                    <a href="{{route('blog.tag',$tag->title)}}">{{$tag->title}}</a>
                                    @endforeach
                            </div><!-- End .tagcloud -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar-wrapper -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </main><!-- End .main -->
@endsection
@push('styles')
    <style>
        .pagination{
            display:inline-flex;
        }
    </style>

@endpush

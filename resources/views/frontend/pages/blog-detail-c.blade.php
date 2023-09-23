@extends('frontend.layouts.master-c')

@section('title','E-TECH || Blog Detail page')

@section('main-content')
    <!-- Start Blog Single -->
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog Single</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article class="post single">
                        <div class="post-media">
                            <img src="{{$post->photo}}" alt="{{$post->photo}}">
                        </div><!-- End .post-media -->

                        <div class="post-body">
                            <div class="post-date">
                                <span class="day">{{$post->created_at->format('d')}}</span>
                                <span class="month">{{$post->created_at->format('D')}}</span>
                            </div><!-- End .post-date -->

                            <h2 class="post-title">{{$post->title}}</h2>

                            <div class="post-meta">
                                <a href="#" class="hash-scroll">{{$post->allComments->count()}} Comments</a>
                            </div><!-- End .post-meta -->

                            <div class="post-content">
                                <p>{!! ($post->description) !!}</p>
                            </div><!-- End .post-content -->

                            <div class="post-share">
                                <h3 class="d-flex align-items-center">
                                    <i class="fas fa-share"></i>
                                    Share this post
                                </h3>

                                <div class="social-icons">
                                    <a href="#" class="social-icon social-facebook" target="_blank"
                                        title="Facebook">
                                        <i class="icon-facebook"></i>
                                    </a>
                                    <a href="#" class="social-icon social-twitter" target="_blank" title="Twitter">
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <a href="#" class="social-icon social-linkedin" target="_blank"
                                        title="Linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#" class="social-icon social-gplus" target="_blank" title="Google +">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                    <a href="#" class="social-icon social-mail" target="_blank" title="Email">
                                        <i class="icon-mail-alt"></i>
                                    </a>
                                </div><!-- End .social-icons -->
                            </div><!-- End .post-share -->

                            <div class="post-author">
                                <h3><i class="far fa-user"></i>Author</h3>

                                <figure>
                                    <a href="#">
                                        <img src="assets/images/blog/author.jpg" alt="author">
                                    </a>
                                </figure>

                                <div class="author-content">
                                    <h4><a href="#">{{$post->author_info['name']}}</a></h4>
                                    @if($post->quote)
                                        <blockquote> <i class="fa fa-quote-left"></i> {!! ($post->quote) !!}</blockquote>
                                    @endif
                                </div><!-- End .author.content -->
                            </div><!-- End .post-author -->
                            @auth
                            <div class="comment-respond">
                                <h3>Leave a Reply</h3>

                                <form id="commentForm" action="{{route('post-comment.store',$post->slug)}}" method="POST">
                                @csrf

                                    <div class="form-group">
                                        <label>Comment</label>
                                        <textarea cols="30" rows="1" class="form-control" required></textarea>
                                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                        <input type="hidden" name="parent_id" id="parent_id" value="" />
                                    </div><!-- End .form-group -->

                                    <div class="form-footer my-0">
                                        <button type="submit" class="btn btn-sm btn-primary">Post
                                            Comment</button>
                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- End .comment-respond -->
                            @else
                            <p class="text-center p-5">
                                You need to <a href="{{route('login.form')}}" style="color:rgb(54, 54, 204)">Login</a> OR <a style="color:blue" href="{{route('register.form')}}">Register</a> for comment.
                            @endauth
                        </div><!-- End .post-body -->
                    </article><!-- End .post -->

                    <hr class="mt-2 mb-1">

                    <div class="related-posts">
                        <h4>Related <strong>Posts</strong></h4>

                        <div class="owl-carousel owl-theme related-posts-carousel" data-owl-options="{
                            'dots': false
                        }">
                        @foreach($recent_posts as $post)
                            <article class="post">
                                <div class="post-media zoom-effect">
                                    <a href="{{route('blog.detail',$post->slug)}}">
                                        <img src="{{$post->photo}}" alt="{{$post->photo}}">
                                    </a>
                                </div><!-- End .post-media -->

                                <div class="post-body">
                                    <div class="post-date">
                                        <span class="day">{{$post->created_at->format('d')}}</span>
                                        <span class="month">{{$post->created_at->format('D')}}</span>
                                    </div><!-- End .post-date -->

                                    <h2 class="post-title">
                                        <a href="#">{{$post->title}}</a>
                                    </h2>

                                    <div class="post-content">

                                        <a href="{{route('blog.detail',$post->slug)}}" class="read-more">read more <i
                                                class="fas fa-angle-right"></i></a>
                                    </div><!-- End .post-content -->
                                </div><!-- End .post-body -->
                            </article>
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- End .related-posts -->
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
                            {{-- {{count(Helper::postCategoryList())}} --}}
                                @foreach(Helper::postCategoryList('posts') as $cat)
                                    <li><a href="#">{{$cat->title}} </a></li>
                                @endforeach
                            </ul>
                        </div><!-- End .widget -->

                        <div class="widget">
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
                                        <a href="#">{{substr($post->title,-25)}}</a>
                                        <div class="post-meta">
                                        {{$post->created_at->format('d M, y')}}
                                        </div><!-- End .post-meta -->
                                    </div><!-- End .post-info -->
                                </li>
                            @endforeach
                            </ul>
                        </div><!-- End .widget -->

                        <div class="widget">
                            <h4 class="widget-title">Tags</h4>

                            <div class="tagcloud">
                            @foreach(Helper::postTagList('posts') as $tag)
                                <a href="">{{$tag->title}}</a>
                            @endforeach
                            </div><!-- End .tagcloud -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar-wrapper -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </main>
    <!--/ End Blog Single -->
@endsection
@push('styles')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
@endpush
@push('scripts')
<script>
$(document).ready(function(){

    (function($) {
        "use strict";

        $('.btn-reply.reply').click(function(e){
            e.preventDefault();
            $('.btn-reply.reply').show();

            $('.comment_btn.comment').hide();
            $('.comment_btn.reply').show();

            $(this).hide();
            $('.btn-reply.cancel').hide();
            $(this).siblings('.btn-reply.cancel').show();

            var parent_id = $(this).data('id');
            var html = $('#commentForm');
            $( html).find('#parent_id').val(parent_id);
            $('#commentFormContainer').hide();
            $(this).parents('.comment-list').append(html).fadeIn('slow').addClass('appended');
          });

        $('.comment-list').on('click','.btn-reply.cancel',function(e){
            e.preventDefault();
            $(this).hide();
            $('.btn-reply.reply').show();

            $('.comment_btn.reply').hide();
            $('.comment_btn.comment').show();

            $('#commentFormContainer').show();
            var html = $('#commentForm');
            $( html).find('#parent_id').val('');

            $('#commentFormContainer').append(html);
        });

 })(jQuery)
})
</script>
@endpush

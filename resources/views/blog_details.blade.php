@extends('layouts.nsseb')
@section('title', 'Blog Details')
@section('body')
    <!-- breadcumb part  -->
    <div id="breadcump" class="breadcump">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="breadcump-menu">
                        <ul>
                            <li>
                                <a href="{{ route('index') }}">Home </a> <span><i class="fas fa-angle-right"></i></span>
                            </li>
                            <li>
                                <a href="">Blog </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ml-auto">
                    <div class="search-bar">
                        <div class="name-input">
                            <input class="custom-input" type="text" placeholder="@lang('home.all_blog_here')">
                            <a type="submit" name="submit" href=""><i class="fas fa-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details part -->
    <div id="blog-details" class="blog-details">
        <div class="container">
            <div class="blog-details-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="blog-details-left-part">
                            <img src="{{ asset('nsseb_assets/media/images/blog_img') }}/{{ $blog_details->image }}" alt="blog details img">
                            <div class="story-btn">
                                <a href="#">Stories</a>
                            </div>
                            <h3>{{ $blog_details->title }}</h3>
                            <div class="blog-profile-img">
                                <img src="{{ asset('nsseb_assets/media/images/profile_img') }}/{{ App\Models\User::where('id', $blog_details->user_id)->first()->profile_photo }}" alt="">
                            </div>
                            <h6><a href="">{{ App\Models\User::where('id', $blog_details->user_id)->first()->name }}</a> > {{ $blog_details->created_at->format('d M Y') }}</h6>
                            
                            {!! $blog_details->description !!}
                            
                        </div>
                    </div>
                
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="blog-details-right-part">
                            <h4>@lang('home.top_category')</h4>
                            <div class="top-category">
                                <ul>
                                    @foreach ($blog_categories as $blog_category)
                                        <li>
                                            <i class="fas fa-circle list-pointer"></i>
                                            <a href="">{{ $blog_category->name }}</a>
                                            <span class="right-text">{{ App\Models\Blog::where('category_id', $blog_category->id)->count() }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="recent-blog-wrapper">
                                <div class="recent-blog">
                                    <h4>@lang('home.recent_post')</h4>
                                    @foreach ($latest_blog as $blog)
                                        <a href="{{ route('blogdetails', $blog->slug) }}">
                                            <img src="{{ asset('nsseb_assets/media/images/blog_img') }}/{{ $blog->image }}" alt="">
                                        </a>
                                        <h3>{{ Str::limit($blog->title, 22, $end='..') }}</h3>
                                        <p class="name">{{ $blog->user->name }}</p>
                                        <p>{!! Str::limit($blog->description, 160, $end='..') !!}</p>
                                        <div class="more-btn">
                                            <a href="{{ route('blogdetails', $blog->slug) }}">Read More >> </a>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <div class="post-tag">
                                    <h3>@lang('home.post_tag')</h3>
                                    <span>Love,</span> &nbsp;
                                    <span>Pair,</span> &nbsp;
                                    <span>Care,</span> &nbsp;
                                    <span>Like,</span> &nbsp;
                                    <span>Wife,</span> &nbsp;
                                    <span>Husband,</span> &nbsp;
                                    <span>Family,</span> &nbsp;
                                    <span>Funny,</span> &nbsp;
                                    <span>Lovely</span> &nbsp;
                                </div>
                                <div class="share-post">
                                    <h3>@lang('home.share_post')</h3>
                                    <div class="facebook">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </div>
                                    <div class="twitter">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </div>
                                    <div class="insta">
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <div class="linkedin">
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Blog part -->
    <div id="blog" class="blog blog-details-page">
        <div class="container">
            <h3>@lang('home.more_post')</h3>
            {{-- blog part here --}}
            @include('nsseb_components.blogpart')

        </div>
    </div>
    <div class="divider-div"></div>

    <!-- Subscribe / get email part -->
    @include('nsseb_components.subscriber')

    <div class="divider-div"></div>
@endsection
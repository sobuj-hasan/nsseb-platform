<div class="blog-wrapper">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="left-content">
                <img class="img-blog" src="{{ asset('nsseb_assets/media/images/blog_img/blog-img1.jpg') }}" alt="">
                <div class="blog-article">
                    <h4>Take Care Your Life Partner</h4>
                    <div class="social-icon">
                        <a target="blank" href="https://www.facebook.com">
                            <img class="icon" src="{{ asset('nsseb_assets/media/icon/black-facebook.svg') }}" alt="">
                        </a>
                        <a target="blank" href="https://www.instagram.com">
                            <img class="icon" src="{{ asset('nsseb_assets/media/icon/insta.svg') }}" alt="">
                        </a>
                        <a target="blank" href="https://www.twitter.com">
                            <img class="icon" src="{{ asset('nsseb_assets/media/icon/black-twitter.svg') }}" alt="">
                        </a>
                        <a target="blank" href="https://www.printarest.com">
                            <img class="icon" src="{{ asset('nsseb_assets/media/icon/black-print.svg') }}" alt="">
                        </a>
                    </div>
                    <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit
                        officia consequat
                        duis enim velit
                        mollit. Exercitation veniam consequat sunt nostrud amet.
                        </br></br>
                        Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit
                        officia consequat
                        duis enim velit
                        mollit.</p>
                    <a class="readmore" href="">Read More >></a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            @foreach ($blogs as $blog)
                <div class="right-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="more-blog">
                                <a href="{{ route('blogdetails', $blog->slug) }}">
                                    <img class="more-blog-img" src="{{ asset('nsseb_assets/media/images/blog_img') }}/{{ $blog->image }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="more-blog-article">
                                <h4>{{ Str::limit($blog->title, 20, $end='..') }}</h4>
                                <h6>{{ $blog->user->name }}</h6>
                                <p>Amet minim mollit non add per to more deserunt ullamco est sit aliqua..</p>
                                <a class="readmore" href="{{ route('blogdetails', $blog->slug) }}">
                                    Read More >>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @empty($blog)
                <div class="text-danger">Nothig to show any Blogs...</div>
            @endempty
        </div>

    </div>
</div>
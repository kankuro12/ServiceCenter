@php
$basic_info = \App\Homeinfo::where('id', 1)->first();
$footer_info = \App\Footerinfo::where('id', 1)->first();
@endphp
<div id="concat-us-section" class="contact-us section" style="background: #FF3449;padding:60px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <div class="section-heading">
                    <h2>Contact Us</h2>
                    <div class="phone-info mt-1">
                        <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a
                                    href="tel:{{ $basic_info->phone }}">{{ $basic_info->phone }}</a></span></h4>
                    </div>
                    <div style="
            position: relative;
            background-color: #fff;
            padding: 60px 30px;
            border-radius: 20px;margin-top:20px;min-height:225px;">
                        <div class="widget widget-about">
                            <img src="{{ asset($basic_info->logo) }}" class="footer-logo"
                                alt="Footer Logo" height="50">
                            <p style="color: black;">{{ $basic_info->short_detail }}</p>
                            <hr>
                            <div class="widget-about-info">
                                <div class="">
                                    <span class="widget-about-title">Got Question? </span>
                                    <div class="d-block d-md-flex justify-content-between">
                                        <a class="d-block d-md-inline "
                                            href="tel:{{ $basic_info->phone }}">{{ $basic_info->phone }}</a>
                                        <a class="d-block d-md-inline "
                                            href="mailto:{{ $basic_info->email }}">{{ $basic_info->email }}</a>
                                    </div>
                                </div><!-- End .col-sm-6 -->

                            </div><!-- End .widget-about-info -->
                        </div><!-- End .widget about-widget -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <form id="contact" class="h-100">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset>
                                <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="phone" id="phone" placeholder="phone" autocomplete="on"
                                    required>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                    placeholder="Your Email">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <textarea maxlength="160" name="message" type="text" class="form-control" id="message"
                                    placeholder="Message" required></textarea>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" id="form-submit btn btn-primary" class="main-button ">Send
                                    Message</button>
                            </fieldset>
                        </div>
                    </div>
                    <div class="contact-dec">
                        <img src="assets/images/contact-decoration.png" alt="">
                    </div>
                </form>
            </div>
        </div>
        <hr class="my-5" style="color: white;">
        <div class="row">
            <div class="col-lg-7">

                <div class="row">
                    @foreach (\App\Footerheader::all() as $head)
                        <div class="col-sm-12 col-lg-4">
                            <div class="widget">
                                <h4 class="widget-title">{{ $head->title }}</h4><!-- End .widget-title -->
                                <hr class="my-1">
                                <ul class="widget-list">
                                    @foreach ($head->links as $link)
                                        <li><a href="{{ $link->link }}">{{ $link->title }}</a></li>
                                    @endforeach
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-4 col-lg-3 -->
                    @endforeach

                </div><!-- End .row -->
            </div>
            <div class="col-lg-5 ">
                @include('Need.map')
            </div>
        </div>
        <hr class="my-5" style="color: white;">
        @php
            $link = \App\Social::where('id', 1)->first();
        @endphp
        <div class="social-icons social-icons-color">
            <a href="{{ $link->facebook }}" class="social-icon social-facebook" title="Facebook" target="_blank"><i
                    class="fa fa-facebook"></i></a>
            <a href="{{ $link->twiter }}" class="social-icon social-twitter" title="Twitter" target="_blank"><i
                    class=" fa fa-twitter"></i></a>
            <a href="{{ $link->instagram }}" class="social-icon social-instagram" title="Instagram" target="_blank"><i
                    class="fa fa-instagram"></i></a>
            <a href="{{ $link->youtube }}" class="social-icon social-youtube" title="Youtube" target="_blank"><i
                    class="fa fa-youtube"></i></a>
        </div><!-- End .soial-icons -->
    </div>
</div>

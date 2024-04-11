@extends('layouts.admin.master')
@section('title', 'Website Settings')
@section('content')
    @include('admin.includes.message')
    <div class="content">
        <div class="container-fluid">
            <div class="">
                <div class="card-body p-0">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card card-primary shadow br-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 col-sm-2 nav flex-column gap-2 nav-pills" id="v-pills-tab"
                                        role="tablist" aria-orientation="vertical">
                                        <button class="nav-link text-start active" id="v-pills-global-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-global" type="button"
                                            role="tab" aria-controls="v-pills-global"
                                            aria-selected="true">Global</button>

                                        <button class="nav-link text-start" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="false">Homepage</button>

                                        <button class="nav-link text-start" id="v-pills-about-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-about" type="button" role="tab"
                                            aria-controls="v-pills-about" aria-selected="false">About</button>

                                        {{-- <button class="nav-link text-start" id="v-pills-feature-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-feature" type="button" role="tab"
                                            aria-controls="v-pills-feature" aria-selected="false">Feature</button> --}}

                                        <button class="nav-link text-start" id="v-pills-banner-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-banner" type="button" role="tab"
                                            aria-controls="v-pills-banner" aria-selected="false">Banner</button>

                                        {{-- <button class="nav-link text-start" id="v-pills-video-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-video" type="button" role="tab"
                                            aria-controls="v-pills-video" aria-selected="false">Video</button> --}}

                                        <button class="nav-link text-start" id="v-pills-contacts-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-contacts" type="button" role="tab"
                                            aria-controls="v-pills-contacts" aria-selected="false">Contact</button>

                                        <button class="nav-link text-start" id="v-pills-seo-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-seo" type="button" role="tab"
                                            aria-controls="v-pills-seo" aria-selected="false">Seo</button>
                                    </div>
                                    <div class="col-9 col-sm-10 tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-global" role="tabpanel"
                                            aria-labelledby="v-pills-global-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_main_logo">Site Main Logo</label>
                                                        <div class="custom-file">
                                                            <input class="mainlogo" id="site_logo"
                                                                data-default-file="{{ $settings['site_main_logo'] != null ? asset('admin/images/setting') . '/' . $settings['site_main_logo'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="site_main_logo">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_footer_logo">Site Footer Logo</label>
                                                        <div class="custom-file">
                                                            <input class="mainlogo" id="sitefooter_logo"
                                                                data-default-file="{{ $settings['site_footer_logo'] != null ? asset('admin/images/setting') . '/' . $settings['site_footer_logo'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="site_footer_logo">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="fav_icon">Fav Icon</label>
                                                        <div class="custom-file">
                                                            <input class="fav_icon" id="fav_icon"
                                                                data-default-file="{{ $settings['fav_icon'] != null ? asset('admin/images/setting') . '/' . $settings['fav_icon'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="fav_icon">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="site_information">Site Information</label>
                                                            <textarea class="form-control br-8" name="site_information" rows="4" placeholder="Enter Site Information">{{ $settings['site_information'] ?? '' }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="apply_now_link">Apply Now Link</label>
                                                            <input class="form-control br-8" type="text"
                                                                name="apply_now_link"
                                                                value="{{ $settings['apply_now_link'] ?? '' }}"
                                                                placeholder="link">
                                                        </div>

                                                        {{-- <div class="form-group mb-3">
                                                            <label for="office_hour">Office Hours</label>
                                                            <input class="form-control br-8" type="text"
                                                                name="office_hour"
                                                                value="{{ $settings['office_hour'] ?? '' }}"
                                                                placeholder="Office Hours">
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="site_copyright">Site Copyright</label>
                                                        <textarea class="form-control br-8" name="site_copyright" rows="4" placeholder="Enter Site Copyright">{{ $settings['site_copyright'] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="service_section_title">Service Section Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="service_section_title"
                                                            value="{{ $settings['service_section_title'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="service_section_slogan">Service Section Slogan</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="service_section_slogan"
                                                            value="{{ $settings['service_section_slogan'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="service_section_image">Service Section
                                                            Image </label>
                                                        <div class="custom-file">
                                                            <input class="service_section_image"
                                                                id="service_section_image"
                                                                data-default-file="{{ $settings['service_section_image'] != null ? asset('admin/images/setting') . '/' . $settings['service_section_image'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="service_section_image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="service_section_description">Service Section
                                                            Description</label>
                                                        <textarea class="form-control br-8" name="service_section_description" rows="4"
                                                            placeholder="Enter Something ...">{{ $settings['service_section_description'] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="country_section_title">Country Section Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="country_section_title"
                                                            value="{{ $settings['country_section_title'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="country_section_slogan">Country Section Slogan</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="country_section_slogan"
                                                            value="{{ $settings['country_section_slogan'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="country_section_description">Country Section
                                                            Description</label>
                                                        <textarea class="form-control br-8" name="country_section_description" rows="4"
                                                            placeholder="Enter Something ...">{{ $settings['country_section_description'] ?? '' }}</textarea>
                                                    </div>
                                                </div> --}}
                                                {{-- 
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="faq_section_title">Faq Section
                                                            Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="faq_section_title"
                                                            value="{{ $settings['faq_section_title'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="faq_section_slogan">Faq Section
                                                            Slogan</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="faq_section_slogan"
                                                            value="{{ $settings['faq_section_slogan'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div> --}}

                                                {{-- <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="faq_section_description">Faq Section
                                                            Description</label>
                                                        <textarea class="form-control br-8" name="faq_section_description" rows="4" placeholder="Enter Something ...">{{ $settings['faq_section_description'] ?? '' }}</textarea>
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="testimonial_section_title">Testimonial Section
                                                            Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="testimonial_section_title"
                                                            value="{{ $settings['testimonial_section_title'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="testimonial_section_slogan">Testimonial Section
                                                            Slogan</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="testimonial_section_slogan"
                                                            value="{{ $settings['testimonial_section_slogan'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="team_section_title">Team Section Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="team_section_title"
                                                            value="{{ $settings['team_section_title'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="team_section_slogan">Team Section Slogan</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="team_section_slogan"
                                                            value="{{ $settings['team_section_slogan'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="course_section_title">Demands Section Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="course_section_title"
                                                            value="{{ $settings['course_section_title'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="course_section_slogan">Demands Section Slogan</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="course_section_slogan"
                                                            value="{{ $settings['course_section_slogan'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="blog_section_title">Blog Section Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="blog_section_title"
                                                            value="{{ $settings['blog_section_title'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="blog_section_slogan">Blog Section Slogan</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="blog_section_slogan"
                                                            value="{{ $settings['blog_section_slogan'] ?? '' }}"
                                                            placeholder="">
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="homepage_seo_title">Homepage Seo Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="homepage_seo_title"
                                                            value="{{ $settings['homepage_seo_title'] ?? '' }}"
                                                            placeholder="Enter homepage Seo Title">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="homepage_seo_description">Homepage Seo
                                                            Keywords</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="homepage_seo_description"
                                                            value="{{ $settings['homepage_seo_description'] ?? '' }}"
                                                            placeholder="Enter Homepage Seo Keywords">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="homepage_seo_keywords">Homepage Seo
                                                            Description</label>
                                                        <textarea class="form-control br-8" name="homepage_seo_keywords" rows="4" placeholder="Enter Something ...">{{ $settings['homepage_seo_keywords'] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="v-pills-about" role="tabpanel"
                                            aria-labelledby="v-pills-about-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="about_section_title">About Section
                                                            Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="about_section_title"
                                                            value="{{ $settings['about_section_title'] ?? '' }}"
                                                            placeholder="Enter About Title">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="about_section_slogan">About Section Slogan</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="about_section_slogan"
                                                            value="{{ $settings['about_section_slogan'] ?? '' }}"
                                                            placeholder="about Slogan">
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="about_section_description">About Section
                                                            Description</label>
                                                        <textarea class="form-control br-8" name="about_section_description" rows="4"
                                                            placeholder="Enter Something ...">{{ $settings['about_section_description'] ?? '' }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label for="treatment_count">Treatments</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="customer_count"
                                                            value="{{ $settings['treatment_count'] ?? '' }}"
                                                            placeholder="treatment count">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label for="rescued_count">Rescued</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="rescued_count"
                                                            value="{{ $settings['rescued_count'] ?? '' }}"
                                                            placeholder="Rescued">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label for="volunteer_count">Volunteers Count</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="volunteer_count"
                                                            value="{{ $settings['volunteer_count'] ?? '' }}"
                                                            placeholder="volunteer count">
                                                    </div>
                                                </div>

                                                {{-- <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label for="student_count_description">Student Count
                                                            Description</label>
                                                        <textarea class="form-control br-8" name="student_count_description" rows="4"
                                                            placeholder="Enter Something ...">{{ $settings['student_count_description'] ?? '' }}</textarea>
                                                    </div>
                                                </div> --}}

                                                {{-- <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label for="experienced_description">Experienced
                                                            Description</label>
                                                        <textarea name="experienced_description" rows="4" class="form-control br-8" placeholder="Enter Something ...">{{ $settings['experienced_description'] ?? '' }}</textarea>
                                                    </div>
                                                </div> --}}

                                                {{-- <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label for="country_count_description">Review Count
                                                            Description</label>
                                                        <textarea class="form-control br-8" name="country_count_description" rows="4"
                                                            placeholder="Enter Something ...">{{ $settings['country_count_description'] ?? '' }}</textarea>
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="about_vision_title">Our vision Slogan</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="about_vision_title"
                                                            value="{{ $settings['about_vision_title'] ?? '' }}"
                                                            placeholder="about Slogan">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="about_vision_description">Our vision
                                                            Description</label>
                                                        <textarea class="form-control br-8" name="about_vision_description" rows="4"
                                                            placeholder="Enter Something ...">{{ $settings['about_vision_description'] ?? '' }}</textarea>
                                                    </div>
                                                </div> --}}

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="about_section_image">About Section
                                                            Image </label>
                                                        <div class="custom-file">
                                                            <input class="about_section_image" id="about_section_image"
                                                                data-default-file="{{ $settings['about_section_image'] != null ? asset('admin/images/setting') . '/' . $settings['about_section_image'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="about_section_image">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="country_page_banner">Our Vision Image</label>
                                                        <div class="custom-file">
                                                            <input class="country_page_banner" id="country_page_banner"
                                                                data-default-file="{{ $settings['country_page_banner'] != null ? asset('admin/images/setting') . '/' . $settings['country_page_banner'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="country_page_banner">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="course_page_banner">Faqs Image</span></label>
                                                        <div class="custom-file">
                                                            <input class="course_page_banner" id="course_page_banner"
                                                                data-default-file="{{ $settings['course_page_banner'] != null ? asset('admin/images/setting') . '/' . $settings['course_page_banner'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="course_page_banner">
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>

                                        {{-- <div class="tab-pane fade" id="v-pills-feature" role="tabpanel"
                                            aria-labelledby="v-pills-feature-tab">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="feature_section_title">Feature Section Title</label>
                                                        <input type="text" name="feature_section_title"
                                                            value="{{ $settings['feature_section_title'] ?? '' }}"
                                                            class="form-control br-8" placeholder="Enter Feature Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="feature_section_description">Feature Section
                                                            Description</label>
                                                        <textarea name="feature_section_description" rows="4" class="form-control br-8"
                                                            placeholder="Enter Something ...">{{ $settings['feature_section_description'] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="tab-pane fade" id="v-pills-banner" role="tabpanel"
                                            aria-labelledby="v-pills-banner-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="about_page_banner">About page banner</label>
                                                        <div class="custom-file">
                                                            <input class="about_page_banner" id="about_page_banner"
                                                                data-default-file="{{ $settings['about_page_banner'] != null ? asset('admin/images/setting') . '/' . $settings['about_page_banner'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="about_page_banner">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="blog_page_banner">Blog Page Banner<span>(1465 x
                                                                450px)</span></label>
                                                        <div class="custom-file">
                                                            <input class="blog_page_banner" id="blog_page_banner"
                                                                data-default-file="{{ $settings['blog_page_banner'] != null ? asset('admin/images/setting') . '/' . $settings['blog_page_banner'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="blog_page_banner">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="service_page_banner">Service Page Banner<span>(1465 x
                                                                450px)</span></label>
                                                        <div class="custom-file">
                                                            <input class="service_page_banner" id="service_page_banner"
                                                                data-default-file="{{ $settings['service_page_banner'] != null ? asset('admin/images/setting') . '/' . $settings['service_page_banner'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="service_page_banner">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="gallery_page_banner">Gallery Page Banner<span>(1465 x
                                                                450px)</span></label>
                                                        <div class="custom-file">
                                                            <input class="gallery_page_banner" id="gallery_page_banner"
                                                                data-default-file="{{ $settings['gallery_page_banner'] != null ? asset('admin/images/setting') . '/' . $settings['gallery_page_banner'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="gallery_page_banner">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="team_page_banner">Teams Page Banner<span>(1465 x
                                                                450px)</span></label>
                                                        <div class="custom-file">
                                                            <input class="team_page_banner" id="team_page_banner"
                                                                data-default-file="{{ $settings['team_page_banner'] != null ? asset('admin/images/setting') . '/' . $settings['team_page_banner'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="team_page_banner">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="singlepages_page_banner">Singlepages Page
                                                            Banner<span></span></label>
                                                        <div class="custom-file">
                                                            <input class="singlepages_page_banner"
                                                                id="singlepages_page_banner"
                                                                data-default-file="{{ $settings['singlepages_page_banner'] != null ? asset('admin/images/setting') . '/' . $settings['singlepages_page_banner'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="singlepages_page_banner">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="tab-pane fade" id="v-pills-video" role="tabpanel"
                                            aria-labelledby="v-pills-video-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="video_section_title">Video Section
                                                            Title</label>
                                                        <input type="text" name="video_section_title"
                                                            value="{{ $settings['video_section_title'] ?? '' }}"
                                                            class="form-control br-8"
                                                            placeholder="Enter Video Section Title">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="video_section_link">Video Section
                                                            Youtube Link</label>
                                                        <input type="text" name="video_section_link"
                                                            value="{{ $settings['video_section_link'] ?? '' }}"
                                                            class="form-control br-8"
                                                            placeholder="Enter Video Section Title">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="video_section_description">Video Section
                                                            Description</label>
                                                        <textarea name="video_section_description" rows="8" class="form-control br-8"
                                                            placeholder="Enter Something ...">{{ $settings['video_section_description'] ?? '' }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="video_section_image">Video Section
                                                            Image <span>(1920 x
                                                                660px)</span></label>
                                                        <div class="custom-file">
                                                            <input type="file" name="video_section_image"
                                                                class="video_section_image" id="video_section_image"
                                                                data-default-file="{{ $settings['video_section_image'] != null ? asset('admin/images/setting') . '/' . $settings['video_section_image'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="tab-pane fade" id="v-pills-contacts" role="tabpanel"
                                            aria-labelledby="v-pills-contacts-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="map">Map</label>
                                                        <textarea class="form-control br-8" name="map" rows="4" placeholder="Enter Map Details">{{ $settings['map'] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="contact_section_title">Contact Section Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="contact_section_title"
                                                            value="{{ $settings['contact_section_title'] ?? '' }}"
                                                            placeholder="Enter section Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="contact_section_description">Contact Section
                                                            Description</label>
                                                        <textarea class="form-control br-8" name="contact_section_description" rows="4"
                                                            placeholder="Enter Something ...">{{ $settings['contact_section_description'] ?? '' }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_email">Site Email</label>
                                                        <input class="form-control br-8" type="text" name="site_email"
                                                            value="{{ $settings['site_email'] ?? '' }}"
                                                            placeholder="Enter Email">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_contact">Site Contact</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="site_contact"
                                                            value="{{ $settings['site_contact'] ?? '' }}"
                                                            placeholder="Enter Contact">
                                                    </div>
                                                </div>

                                                {{-- <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_email2">Site Email 2</label>
                                                        <input type="text" name="site_email2"
                                                            value="{{ $settings['site_email2'] ?? '' }}"
                                                            class="form-control br-8" placeholder="Enter Email 2">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_contact2">Site Contact 2</label>
                                                        <input type="text" name="site_contact2"
                                                            value="{{ $settings['site_contact2'] ?? '' }}"
                                                            class="form-control br-8" placeholder="Enter Contact 2">
                                                    </div>
                                                </div>

                                                {{-- <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="office_location">Office Location</label>
                                                        <input type="text" name="office_location"
                                                            value="{{ $settings['office_location'] ?? '' }}"
                                                            class="form-control br-8" placeholder="Enter Office Location">
                                                    </div>
                                                </div> --}}

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="office_location">Office Location</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="office_location"
                                                            value="{{ $settings['office_location'] ?? '' }}"
                                                            placeholder="Enter Office loaction">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="contact_seo_title">Contact Seo Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="contact_seo_title"
                                                            value="{{ $settings['contact_seo_title'] ?? '' }}"
                                                            placeholder="Enter Seo Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="contact_seo_keywords">Contact Seo
                                                            Keywords</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="contact_seo_keywords"
                                                            value="{{ $settings['contact_seo_keywords'] ?? '' }}"
                                                            placeholder="Enter Seo Keywords">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="contact_seo_description">Contact Seo
                                                            Description</label>
                                                        <textarea class="form-control br-8" name="contact_seo_description" rows="4" placeholder="Enter Something ...">{{ $settings['contact_seo_description'] ?? '' }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="contact_image">Contact Section Banner
                                                            Image <span><span>(1465 x
                                                                    450px)</span></span></label>
                                                        <div class="custom-file">
                                                            <input class="contact_image" id="contact_image"
                                                                data-default-file="{{ $settings['contact_image'] != null ? asset('admin/images/setting') . '/' . $settings['contact_image'] : null }}"
                                                                data-show-remove="false"
                                                                data-allowed-file-extensions='["jpg", "jpeg","png","bmp","gif","svg","webp"]'
                                                                type="file" name="contact_image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="v-pills-seo" role="tabpanel"
                                            aria-labelledby="v-pills-seo-tab">
                                            <fieldset class="border p-3">
                                                <legend class="float-none w-auto legend-title">Countries</legend>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="countries_seo_title">Countries Seo Title</label>
                                                            <input class="form-control br-8" type="text"
                                                                name="countries_seo_title"
                                                                value="{{ $settings['countries_seo_title'] ?? '' }}"
                                                                placeholder="Enter Seo Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="countries_seo_keywords">Countries Seo
                                                                Keywords</label>
                                                            <input class="form-control br-8" type="text"
                                                                name="countries_seo_keywords"
                                                                value="{{ $settings['countries_seo_keywords'] ?? '' }}"
                                                                placeholder="Enter Seo Keywords">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label for="countries_seo_description">Countries Seo
                                                                Description</label>
                                                            <textarea class="form-control br-8" name="countries_seo_description" rows="4"
                                                                placeholder="Enter Something ...">{{ $settings['countries_seo_description'] ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </fieldset>

                                            {{-- <fieldset class="border p-3">
                                                <legend class="float-none w-auto legend-title">Demands</legend>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="demands_seo_title">Demands Seo Title</label>
                                                            <input class="form-control br-8" type="text"
                                                                name="courses_seo_title"
                                                                value="{{ $settings['demands_seo_title'] ?? '' }}"
                                                                placeholder="Enter Seo Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="demands_seo_keywords">Demands Seo
                                                                Keywords</label>
                                                            <input class="form-control br-8" type="text"
                                                                name="demands_seo_keywords"
                                                                value="{{ $settings['demands_seo_keywords'] ?? '' }}"
                                                                placeholder="Enter Seo Keywords">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label for="Demands_seo_description">Demands Seo
                                                                Description</label>
                                                            <textarea class="form-control br-8" name="demands_seo_description" rows="4" placeholder="Enter Something ...">{{ $settings['demands_seo_description'] ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </fieldset> --}}

                                            {{-- <fieldset class="border p-3">
                                                <legend class="float-none w-auto legend-title">Courses</legend>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="courses_seo_title">Courses Seo Title</label>
                                                            <input class="form-control br-8" type="text"
                                                                name="courses_seo_title"
                                                                value="{{ $settings['courses_seo_title'] ?? '' }}"
                                                                placeholder="Enter Seo Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="courses_seo_keywords">Courses Seo
                                                                Keywords</label>
                                                            <input class="form-control br-8" type="text"
                                                                name="courses_seo_keywords"
                                                                value="{{ $settings['courses_seo_keywords'] ?? '' }}"
                                                                placeholder="Enter Seo Keywords">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label for="courses_seo_description">Courses Seo
                                                                Description</label>
                                                            <textarea class="form-control br-8" name="courses_seo_description" rows="4" placeholder="Enter Something ...">{{ $settings['courses_seo_description'] ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </fieldset> --}}

                                            <fieldset class="border p-3">
                                                <legend class="float-none w-auto legend-title">Services</legend>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="services_seo_title">Services Seo Title</label>
                                                            <input class="form-control br-8" type="text"
                                                                name="services_seo_title"
                                                                value="{{ $settings['services_seo_title'] ?? '' }}"
                                                                placeholder="Enter Seo Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="services_seo_keywords">Services Seo
                                                                Keywords</label>
                                                            <input class="form-control br-8" type="text"
                                                                name="services_seo_keywords"
                                                                value="{{ $settings['services_seo_keywords'] ?? '' }}"
                                                                placeholder="Enter Seo Keywords">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label for="services_seo_description">Services Seo
                                                                Description</label>
                                                            <textarea class="form-control br-8" name="services_seo_description" rows="4"
                                                                placeholder="Enter Something ...">{{ $settings['services_seo_description'] ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="border p-3">
                                                <legend class="float-none w-auto legend-title">Blogs</legend>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="blogs_seo_title">Blogs Seo Title</label>
                                                            <input class="form-control br-8" type="text"
                                                                name="blogs_seo_title"
                                                                value="{{ $settings['blogs_seo_title'] ?? '' }}"
                                                                placeholder="Enter Seo Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="blogs_seo_keywords">Blogs Seo
                                                                Keywords</label>
                                                            <input class="form-control br-8" type="text"
                                                                name="blogs_seo_keywords"
                                                                value="{{ $settings['blogs_seo_keywords'] ?? '' }}"
                                                                placeholder="Enter Seo Keywords">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label for="blogs_seo_description">Blogs Seo
                                                                Description</label>
                                                            <textarea class="form-control br-8" name="blogs_seo_description" rows="4" placeholder="Enter Something ...">{{ $settings['blogs_seo_description'] ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footers">
                                    <button class="btn btn-lg btn-primary" type="submit"><i
                                            class="fa-solid fa-rotate"></i> Update Setting</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.mainlogo').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $('.footerlogo').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $('.fav_icon').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $('.contact_image').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $('.banner_image').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $('.video_section_image').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
        $('.service_section_image').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $('.about_section_image').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $('.feature_section_image').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $('.about_page_banner').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $('.course_page_banner').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $('.country_page_banner').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $('.blog_page_banner').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $('.service_page_banner').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
        $('.gallery_page_banner').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
        $('.team_page_banner').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
        $('.singlepages_page_banner').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>
@endsection

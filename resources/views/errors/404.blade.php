@extends('layouts.frontend.master')
@section('seo')
    <title>{{ $settings['contact_seo_title'] ?? 'Seneca Education' }}</title>
    <meta name="keywords" content="{{ $settings['contact_seo_keywords'] ?? 'Seneca Education' }}">
    <meta name="description" content="{{ $settings['contact_seo_description'] ?? 'Seneca Education' }}">
@endsection

@section('content')
    <!-- event-area -->
    <section class="event event03 pt-120 pb-120 p-relative fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 text-center  wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                    <img src="{{ asset('frontend/assets/img/bg/404-img.png') }}" alt="logo">
                    <div class="slider-btn mt-50">
                        <a href="{{ route('home') }}" class="btn ss-btn smoth-scroll">Read More <i
                                class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- event-area -->
@endsection

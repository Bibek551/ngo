<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Donation;
use App\Models\Blog;
use App\Models\Inquiry;
use App\Models\Volunteer;
use App\Models\OurTeam;
use App\Models\Slider;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use App\Models\Setting;
use App\Models\Page;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    public function ServiceIndex()
    {
        try {
            $services = Service::oldest('order')->get();

            foreach ($services as $service) {
                $service['image'] = $service->image ? asset('admin/images/service/' . $service->image) : NULL;
                $service['logo'] = $service->image ? asset('admin/images/service/' . $service->logo) : NULL;
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $services,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    // public function serviceSingle($slug){
    //      try {
    //         $service = Service::where('slug', $slug)->first();
    //         $service['image'] = $service->image?asset('admin/images/service/'.$service->image):NULL;
    //         $service['logo'] = $service->image?asset('admin/images/service/'.$service->logo):NULL;
    //         return response()->json([
    //             "statusCode" => 200,
    //             "error" => false,
    //             "data" => $service,
    //             'message' => 'Retrieved successfully'
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
    //     }
    // }

    public function BlogIndex()
    {
        try {
            $blogs = Blog::latest()->get();

            foreach ($blogs as $blog) {
                $blog['image'] = $blog->image ? asset('admin/images/blog/' . $blog->image) : NULL;
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $blogs,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function BlogSingle($slug)
    {
        try {
            $blog = Blog::where('slug', $slug)->first();
            $blog['image'] = $blog->image ? asset('admin/images/blog/' . $blog->image) : NULL;
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $blog,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function pageDetail($slug)
    {
        try {
            $page = Page::where('slug', $slug)->first();
            $page['image'] = $page->image ? asset('admin/images/page/' . $page->image) : NULL;
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $page,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function TestimonialIndex()
    {
        try {
            $testimonials = Testimonial::oldest('order')->get();

            foreach ($testimonials as $testimonial) {
                $testimonial['image'] = $testimonial->image ? asset('admin/images/testimonial/' . $testimonial->image) : NULL;
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $testimonials,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function TeamIndex()
    {
        try {
            $teams = OurTeam::oldest('order')->get();

            foreach ($teams as $team) {
                $team['image'] = $team->image ? asset('admin/images/team/' . $team->image) : NULL;
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $teams,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function SocialmediaIndex()
    {
        try {
            $socialmedias = SocialMedia::latest()->get();

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $socialmedias,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    // public function FaqIndex(){
    //    try {
    //         $faqs = Faq::oldest('order')->get();

    //         return response()->json([
    //             "statusCode" => 200,
    //             "error" => false,
    //             "data" => $faqs,
    //             'message' => 'Retrieved successfully'
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
    //     }
    // }

    public function SliderIndex()
    {
        try {
            $sliders = Slider::latest()->get();

            foreach ($sliders as $slider) {
                $slider['image'] = $slider->image ? asset('admin/images/slider/' . $slider->image) : NULL;
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $sliders,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    // public function GalleryIndex(){
    //    try {
    //         $galleries = Gallery::latest()->get();

    //         foreach($galleries as $gallery){
    //             $gallery['image'] = $gallery->image?asset('admin/images/gallery/'.$gallery->image):NULL;
    //         }

    //         return response()->json([
    //             "statusCode" => 200,
    //             "error" => false,
    //             "data" => $galleries,
    //             'message' => 'Retrieved successfully'
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
    //     }
    // }

    public function SettingIndex()
    {
        try {
            $settings = Setting::pluck('value', 'key');

            if ($settings['site_main_logo']) {
                $settings['site_main_logo'] = asset('admin/images/setting/' . $settings['site_main_logo']);
            }

            if ($settings['site_footer_logo']) {
                $settings['site_footer_logo'] = asset('admin/images/setting/' . $settings['site_footer_logo']);
            }

            if ($settings['fav_icon']) {
                $settings['fav_icon'] = asset('admin/images/setting/' . $settings['fav_icon']);
            }

            if ($settings['about_section_image']) {
                $settings['about_section_image'] = asset('admin/images/setting/' . $settings['about_section_image']);
            }

            if ($settings['about_page_banner']) {
                $settings['about_page_banner'] = asset('admin/images/setting/' . $settings['about_page_banner']);
            }

            if ($settings['blog_page_banner']) {
                $settings['blog_page_banner'] = asset('admin/images/setting/' . $settings['blog_page_banner']);
            }

            if ($settings['service_page_banner']) {
                $settings['service_page_banner'] = asset('admin/images/setting/' . $settings['service_page_banner']);
            }

            if ($settings['gallery_page_banner']) {
                $settings['gallery_page_banner'] = asset('admin/images/setting/' . $settings['gallery_page_banner']);
            }

            if ($settings['team_page_banner']) {
                $settings['team_page_banner'] = asset('admin/images/setting/' . $settings['team_page_banner']);
            }

            if ($settings['contact_image']) {
                $settings['contact_image'] = asset('admin/images/setting/' . $settings['contact_image']);
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $settings,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function inquiryIndex(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
            ]);


            if ($validation->fails()) {
                return response()->json(['statusCode' => 401, 'error' => true, 'error_message' => $validation->errors(), 'message' => 'Please fill the input field properly']);
            }

            Inquiry::create($request->all());

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                'message' => 'Thank you, your enquiry has been submitted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function donationIndex(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'fname' => 'required',
                'lname' => 'required',
                'company' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
            ]);


            if ($validation->fails()) {
                return response()->json(['statusCode' => 401, 'error' => true, 'error_message' => $validation->errors(), 'message' => 'Please fill the input field properly']);
            }

            Donation::create($request->all());

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                'message' => 'Thank you, your enquiry has been submitted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function volunteerIndex(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'date' => 'required',
                'bloodgroup' => 'required',
                'education' => 'required',
                'nationality' => 'required',
                'gender' => 'required',
            ]);


            if ($validation->fails()) {
                return response()->json(['statusCode' => 401, 'error' => true, 'error_message' => $validation->errors(), 'message' => 'Please fill the input field properly']);
            }

            Volunteer::create($request->all());

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                'message' => 'Thank you, your enquiry has been submitted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }
}

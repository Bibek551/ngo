<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Branch;
use App\Models\Country;
use App\Models\Demand;
use App\Models\Course;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\OurTeam;
use App\Models\Page;
use App\Models\Service;
use App\Models\Slider;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use App\Models\University;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['site_main_logo', Null],
            ['site_footer_logo', Null],
            ['site_information', 'Suspendisse non sem ante. Cras pretium gravida leo a convallis. Nam malesuada interdum metus, sit amet dictum ante congue eu. Maecenas ut maximus enim.'],
            ['map', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.0107398278033!2d85.3091379762703!3d27.716954676177043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb194c6c187511%3A0x90398cc153754317!2sParadise%20InfoTech%20-%20IT%20Company%20in%20Nepal!5e0!3m2!1sen!2snp!4v1706593862490!5m2!1sen!2snp'],
            ['site_copyright', '2022 All right Reserved'],
            ['site_contact', '9800000000'],
            ['site_email', 'info@ngo.com.np'],
            ['site_contact2', '+01 5553696'],
            ['site_email2', 'ngo@gmail.com'],
            ['apply_now_link', null],
            ['office_hour', '10 am - 5 pm'],
            ['office_location', 'Bharatpur, Chitwan'],


            ['course_section_title', 'Our Demands ?'],
            ['course_section_slogan', 'Current popular demands ?'],
            ['service_section_title', 'OUR SERVICES'],
            ['service_section_slogan', 'Services We Provide?'],
            ['service_section_description', 'lorem ipsumbh dsif sahdgf sjdgfjsad fgshadk f ?'],
            ['blog_section_title', 'Blog & News'],
            ['blog_section_slogan', 'Latest Blog & News'],
            ['team_section_title', 'Our members'],
            ['team_section_slogan', 'Meet Our Experts'],
            ['testimonial_section_title', 'What Our Client Says'],
            ['testimonial_section_slogan', 'What Our Client Says'],
            ['faq_section_title', 'FAQs'],
            ['faq_section_slogan', 'Frequently Asked Questions'],
            ['faq_section_description', 'Get every single answer here.'],

            ['homepage_seo_title', 'NGO'],
            ['homepage_seo_description', 'NGO'],
            ['homepage_seo_keywords', 'NGO'],
            ['fav_icon', null],

            ['about_section_title', 'A Few Words About the Manpower'],
            ['about_section_description', 'With the help of our knowledge and experience, we can determine which companies are best for each people.'],
            ['about_section_slogan', 'About Our Consultancy'],
            ['treatment_count', '20k'],
            ['rescued_count', '10k'],
            ['volunteer_count', '5k'],
            ['guide_count', '70+'],
            ['about_section_image', null],
            ['about_section_image2', null],
            ['service_section_image', null],
            ['mission_image', null],
            ['mission_title', 'Our Company Provide High Quality Idea'],
            ['mission_description', 'consectetur adipiscing elit sed do eiusmod tem incid idunt.'],
            ['vision_image', null],
            ['vision_title', 'Our Company Provide High Quality Idea'],
            ['vision_description', 'consectetur adipiscing elit sed do eiusmod tem incid idunt.'],
            ['objective_image', null],
            ['objective_title', 'Our Company Provide High Quality Idea'],
            ['objective_description', 'consectetur adipiscing elit sed do eiusmod tem incid idunt.'],
            ['action_section_title', 'Experience the Evolution of Our Consultancy'],
            ['action_section_description', 'dagskdgfa dsaf'],
            ['donate_section_title', 'sdfgsda accept daf'],
            ['donate_section_description', 'lorem dsaf'],

            ['about_page_banner', null],
            ['blog_page_banner', null],
            ['service_page_banner', null],
            ['team_page_banner', null],
            ['getinvolve_page_banner', null],
            ['membership_page_banner', null],
            ['volunteer_page_banner', null],
            ['support_page_banner', null],
            ['awareness_page_banner', null],
            ['singlepages_page_banner', null],

            ['video_section_title', "We're Qeducato & We're Diffirent"],
            ['video_section_description', 'Our community is being called to reimagine the future. As the only university where a renowned design school colleges'],
            ['video_section_image', null],
            ['video_section_link', 'https://www.youtube.com/watch?v=vdMPP47nLhc'],

            ['contact_section_title', 'Experience the Evolution of Our Consultancy'],
            ['contact_section_description', 'We love to hear from you. Our friendly team is always here to chat'],
            ['contact_seo_title', 'NGO - Contact'],
            ['contact_seo_keywords', 'NGO'],
            ['contact_seo_description', 'NGO NGO'],
            ['contact_image', null],

            ['feature_section_title', 'Our Best Features'],
            ['feature_section_description', 'Special wedding garments are often worn, and the ceremony is sometimes followed by a wedding reception. Music, poetry.'],
            ['feature_section_image', null],

            ['countries_seo_title', 'NGO - countries'],
            ['countries_seo_keywords', 'countries'],
            ['countries_seo_description', 'countries NGO'],

            ['blogs_seo_title', 'NGO - blogs'],
            ['blogs_seo_keywords', 'blogs'],
            ['blogs_seo_description', 'blogs NGO'],

            ['services_seo_title', 'NGO - services'],
            ['services_seo_keywords', 'services'],
            ['services_seo_description', 'services NGO'],

            ['courses_seo_title', 'NGO - courses'],
            ['courses_seo_keywords', 'courses'],
            ['courses_seo_description', 'courses NGO'],

            ['demands_seo_title', 'NGO - demands'],
            ['demands_seo_keywords', 'demands'],
            ['demands_seo_description', 'demands NGO'],
        ];

        if (count($items)) {
            foreach ($items as $item) {
                \App\Models\Setting::create([
                    'key' => $item[0],
                    'value' => $item[1],
                ]);
            }
        }

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@ngo.com',
            'password' => Hash::make('password'),
        ]);

        $pages = [
            ['title' => 'Privacy Policy', 'description' => 'Lorem ipsum dolor sit amet consectetur. Enim nulla at ultrices mus porttitor. Cursus sed eu neque fringilla sed maecenas lorem vulputate tristique. Mollis massa nulla vulputate eget imperdiet nc fringilla fermentum hendrerit sagittis praesent nulla nulla. Erat nascetur ut tortor nam faucibus amet tincidunt luctus nibh. Elementum massa parturient pellentesque egestas potenti et. Diam vulputate convallis sed purus eros ac amet erat risus. Lectus quisque elementum a velit urna nulla. Sit augue vestibulum gravida ante duis vitae. Rhoncus donec mi sed metus sed cursus sed. Cursus molestie vel nisi cursus amet. A viverra magnis mattis ultrices diam dapibus. Quam amet purus lacus vitae sapien viverra sit sapien. Aenean tincidunt orci diam at amet commodo eget.', 'short_description' => null, 'slug' => 'privacy-policy', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['title' => 'Terms and Conditions', 'description' => 'Lorem ipsum dolor sit amet consectetur. Enim nulla at ultrices mus porttitor. Cursus sed eu neque fringilla sed maecenas lorem vulputate tristique. Mollis massa nulla vulputate eget imperdiet nc fringilla fermentum hendrerit sagittis praesent nulla nulla. Erat nascetur ut tortor nam faucibus amet tincidunt luctus nibh. Elementum massa parturient pellentesque egestas potenti et. Diam vulputate convallis sed purus eros ac amet erat risus. Lectus quisque elementum a velit urna nulla. Sit augue vestibulum gravida ante duis vitae. Rhoncus donec mi sed metus sed cursus sed. Cursus molestie vel nisi cursus amet. A viverra magnis mattis ultrices diam dapibus. Quam amet purus lacus vitae sapien viverra sit sapien. Aenean tincidunt orci diam at amet commodo eget.', 'short_description' => null, 'slug' => 'terms-and-conditions', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        Page::insert($pages);

        $services = [
            ['title' => 'Interview Preparation', 'status' => 1, 'short_description' => 'Seamlessly visualize quality ellectual capital without superior collaboration and idea sharing listically', 'description' => null, 'image' => null, 'logo' => null, 'slug' => 'interview-preparation', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['title' => 'Visa Documentation', 'status' => 1, 'short_description' => 'Seamlessly visualize quality ellectual capital without superior collaboration and idea sharing listically', 'description' => null, 'image' => null, 'logo' => null, 'slug' => 'visa-documentation', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        Service::insert($services);

        $courses = [
            ['name' => 'Security guard', 'status' => 1, 'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem numquam similique dolorem sapiente voluptas sint unde corporis voluptatum.', 'description' => null, 'image' => null,  'slug' => 'ielts', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['name' => 'Kitchen Helper', 'status' => 1, 'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem numquam similique dolorem sapiente voluptas sint unde corporis voluptatum.', 'description' => null, 'image' => null,  'slug' => 'tofel', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['name' => 'Guide', 'status' => 1, 'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem numquam similique dolorem sapiente voluptas sint unde corporis voluptatum.', 'description' => null, 'image' => null, 'slug' => 'sat', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        Course::insert($courses);

        $demands = [
            ['name' => 'Security guard', 'status' => 1, 'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem numquam similique dolorem sapiente voluptas sint unde corporis voluptatum.', 'description' => null, 'image' => null,  'slug' => 'ielts', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['name' => 'Kitchen Helper', 'status' => 1, 'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem numquam similique dolorem sapiente voluptas sint unde corporis voluptatum.', 'description' => null, 'image' => null,  'slug' => 'tofel', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['name' => 'Guide', 'status' => 1, 'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem numquam similique dolorem sapiente voluptas sint unde corporis voluptatum.', 'description' => null, 'image' => null, 'slug' => 'sat', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        Demand::insert($demands);

        $countries = [
            ['name' => 'AUSTRALIA', 'status' => 1, 'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem numquam similique dolorem sapiente voluptas sint unde corporis voluptatum.', 'description' => null, 'image' => null, 'banner_image' => null,  'slug' => 'australia', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['name' => 'USA', 'status' => 1, 'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem numquam similique dolorem sapiente voluptas sint unde corporis voluptatum.', 'description' => null, 'image' => null, 'banner_image' => null,  'slug' => 'usa', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['name' => 'CANADA', 'status' => 1, 'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem numquam similique dolorem sapiente voluptas sint unde corporis voluptatum.', 'description' => null, 'image' => null, 'banner_image' => null, 'slug' => 'canada', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        Country::insert($countries);


        $features = [
            ['title' => 'Skilled Teachers', 'status' => 1, 'short_description' => 'Special wedding garments are often worn, and the ceremony is sttimes followed by a wedding reception. Music, poetry, prayers, or readings from.', 'description' => null, 'image' => null, 'logo' => null, 'slug' => 'skilled-teachers', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['title' => 'Affordable Courses', 'status' => 1, 'short_description' => 'Special wedding garments are often worn, and the ceremony is sttimes followed by a wedding reception. Music, poetry, prayers, or readings from.', 'description' => null, 'image' => null, 'logo' => null, 'slug' => 'affordable-courses', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['title' => 'Efficient & Flexible', 'status' => 1, 'short_description' => 'Special wedding garments are often worn, and the ceremony is sttimes followed by a wedding reception. Music, poetry, prayers, or readings from.', 'description' => null, 'image' => null, 'logo' => null, 'slug' => 'efficient-&-flexible', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        Feature::insert($features);

        $faqs = [
            ['title' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.',   'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['title' => 'Lorem ipsum dolor2, sit amet consectetur adipisicing elit.Assumenda, quaerat.',   'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['title' => 'Lorem ipsum dolor3, sit amet consectetur adipisicing elit.Assumenda, quaerat.',   'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        Faq::insert($faqs);

        $testimonials = [
            ['name' => 'Durgesh Upadhyaya', 'position' => 'Web Developer',   'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.', 'image' => null, 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['name' => 'Kabiraj Bhatta', 'position' => 'Web Developer',   'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.', 'image' => null, 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['name' => 'Rabin Shrestha', 'position' => 'Designer',   'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.', 'image' => null, 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        Testimonial::insert($testimonials);

        $blogs = [
            ['title' => 'Blog 1', 'created_by' => '1',   'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam officiis unde excepturi, dolore consequatur commodi autem aliquid distinctio animi eius?', 'image' => null, 'description' => null, 'slug' => 'blog-1', 'date' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['title' => 'Blog 2', 'created_by' => '1',   'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam officiis unde excepturi, dolore consequatur commodi autem aliquid distinctio animi eius?', 'image' => null, 'description' => null, 'slug' => 'blog-2', 'date' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        Blog::insert($blogs);

        $socialmedias = [
            ['title' => 'Facebook', 'link' => '#',   'icon' => 'fa-facebook-f', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Instagram', 'link' => '#',  'icon' => 'fa-instagram', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Twitter', 'link' => '#',    'icon' => 'fa-twitter', 'created_at' => now(), 'updated_at' => now()],
        ];

        SocialMedia::insert($socialmedias);

        $teams = [
            ['name' => 'Durgesh Upadhyaya', 'position' => 'Developer',   'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.', 'image' => null, 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['name' => 'Kabiraj Bhatta', 'position' => 'Project Manager',   'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.', 'image' => null, 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['name' => 'Gabish Khanal', 'position' => 'CEO/Founder',   'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.Lorem ipsum dolor, sit amet consectetur adipisicing elit.Assumenda, quaerat.', 'image' => null, 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        OurTeam::insert($teams);

        $branches = [
            ['location' => 'Kathmandu', 'order' => '1', 'email' => 'info@neeckathmandu.com',   'phone' => '01-0522222', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['location' => 'Lalitpur', 'order' => '3', 'email' => 'info@neeclalitpur.com',   'phone' => '01-0522222', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['location' => 'Bhaktapur', 'order' => '4', 'email' => 'info@neecbhaktapur.com',   'phone' => '01-0522222', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        Branch::insert($branches);

        $universities = [
            ['name' => 'University of Toronto',  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem numquam similique dolorem sapiente voluptas sint unde corporis voluptatum.', 'short_description' => null, 'image' => null, 'other_image' => null, 'country' => 'Canada', 'slug' => 'university-of-toronto', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['name' => 'University of Waterloo',  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem numquam similique dolorem sapiente voluptas sint unde corporis voluptatum.', 'short_description' => null, 'image' => null, 'other_image' => null, 'country' => 'Canada',  'slug' => 'university-of-waterloo', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['name' => 'McGrill University',  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem numquam similique dolorem sapiente voluptas sint unde corporis voluptatum.', 'short_description' => null, 'image' => null, 'other_image' => null, 'country' => 'Australia', 'slug' => 'mcGrill-university', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        University::insert($universities);

        $sliders = [
            ['title' => 'Education is the best key success in life', 'slogan' => 'Welcome to Dreamcity Holidays', 'order' => 1, 'description' => 'Special wedding garments are often worn, and the ceremony is sttimes followed by a wedding reception. Music, poetry, prayers, or readings from.',  'image' => null,  'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['title' => 'Efficient & Flexible', 'slogan' => 'Dreamcity Holidays Consultancy', 'order' => 2, 'description' => 'Special wedding garments are often worn, and the ceremony is sttimes followed by a wedding reception. Music, poetry, prayers, or readings from.',  'image' => null, 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        Slider::insert($sliders);
    }
}
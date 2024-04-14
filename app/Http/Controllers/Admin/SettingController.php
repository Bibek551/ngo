<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use File;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::pluck('value', 'key');
        return view('admin.setting.edit', compact('settings'));
    }

    public function update(Request $request, Setting $setting)
    {
        $siteSettings = Setting::pluck('value', 'key');

        $old_main_logo = $siteSettings['site_main_logo'];
        $old_footer_logo = $siteSettings['site_footer_logo'];
        $old_contact_image = $siteSettings['contact_image'];
        $old_fav_icon = $siteSettings['fav_icon'];
        $old_service_section_image = $siteSettings['service_section_image'];
        $old_about_section_image = $siteSettings['about_section_image'];
        $old_about_section_image2 = $siteSettings['about_section_image2'];
        $old_mission_image = $siteSettings['mission_image'];
        $old_vision_image = $siteSettings['vision_image'];
        $old_objective_image = $siteSettings['objective_image'];
        $old_about_page_banner = $siteSettings['about_page_banner'];
        $old_blog_page_banner = $siteSettings['blog_page_banner'];
        $old_team_page_banner = $siteSettings['team_page_banner'];
        $old_service_page_banner = $siteSettings['service_page_banner'];
        $old_getinvolve_page_banner = $siteSettings['getinvolve_page_banner'];
        $old_membership_page_banner = $siteSettings['membership_page_banner'];
        $old_volunteer_page_banner = $siteSettings['volunteer_page_banner'];
        $old_support_page_banner = $siteSettings['support_page_banner'];
        $old_awareness_page_banner = $siteSettings['awareness_page_banner'];
        $old_singlepages_page_banner = $siteSettings['singlepages_page_banner'];

        $input = $request->all();
        $site_main_logo = $this->fileUpload($request, 'site_main_logo');
        $site_footer_logo = $this->fileUpload($request, 'site_footer_logo');
        $fav_icon = $this->fileUpload($request, 'fav_icon');
        $contact_image = $this->fileUpload($request, 'contact_image');
        $video_section_image = $this->fileUpload($request, 'video_section_image');
        $service_section_image = $this->fileUpload($request, 'service_section_image');
        $about_section_image = $this->fileUpload($request, 'about_section_image');
        $about_section_image2 = $this->fileUpload($request, 'about_section_image2');
        $mission_image = $this->fileUpload($request, 'mission_image');
        $vision_image = $this->fileUpload($request, 'vision_image');
        $objective_image = $this->fileUpload($request, 'objective_image');
        $feature_section_image = $this->fileUpload($request, 'feature_section_image');
        $about_page_banner = $this->fileUpload($request, 'about_page_banner');
        $country_page_banner = $this->fileUpload($request, 'country_page_banner');
        $blog_page_banner = $this->fileUpload($request, 'blog_page_banner');
        $gallery_page_banner = $this->fileUpload($request, 'gallery_page_banner');
        $team_page_banner = $this->fileUpload($request, 'team_page_banner');
        $service_page_banner = $this->fileUpload($request, 'service_page_banner');
        $getinvolve_page_banner = $this->fileUpload($request, 'getinvolve_page_banner');
        $membership_page_banner = $this->fileUpload($request, 'membership_page_banner');
        $volunteer_page_banner = $this->fileUpload($request, 'volunteer_page_banner');
        $support_page_banner = $this->fileUpload($request, 'support_page_banner');
        $awareness_page_banner = $this->fileUpload($request, 'awareness_page_banner');
        $singlepages_page_banner = $this->fileUpload($request, 'singlepages_page_banner');

        //delete old file
        if ($site_main_logo) {
            $this->removeFile($old_main_logo);
            $input['site_main_logo'] = $site_main_logo;
        } else {
            unset($input['site_main_logo']);
        }

        if ($site_footer_logo) {
            $this->removeFile($old_footer_logo);
            $input['site_footer_logo'] = $site_footer_logo;
        } else {
            unset($input['site_footer_logo']);
        }

        if ($contact_image) {
            $this->removeFile($old_contact_image);
            $input['contact_image'] = $contact_image;
        } else {
            unset($input['contact_image']);
        }

        if ($fav_icon) {
            $this->removeFile($old_fav_icon);
            $input['fav_icon'] = $fav_icon;
        } else {
            unset($input['fav_icon']);
        }


        if ($video_section_image) {
            $this->removeFile($old_video_section_image);
            $input['video_section_image'] = $video_section_image;
        } else {
            unset($input['video_section_image']);
        }

        if ($service_section_image) {
            $this->removeFile($old_service_section_image);
            $input['service_section_image'] = $service_section_image;
        } else {
            unset($input['service_section_image']);
        }

        if ($about_section_image) {
            $this->removeFile($old_about_section_image);
            $input['about_section_image'] = $about_section_image;
        } else {
            unset($input['about_section_image']);
        }
        
        if ($about_section_image2) {
            $this->removeFile($old_about_section_image2);
            $input['about_section_image2'] = $about_section_image2;
        } else {
            unset($input['about_section_image2']);
        }
        
        if ($mission_image) {
            $this->removeFile($old_mission_image);
            $input['mission_image'] = $mission_image;
        } else {
            unset($input['mission_image']);
        }

        if ($vision_image) {
            $this->removeFile($old_vision_image);
            $input['vision_image'] = $vision_image;
        } else {
            unset($input['vision_image']);
        }

        if ($objective_image) {
            $this->removeFile($old_objective_image);
            $input['objective_image'] = $objective_image;
        } else {
            unset($input['objective_image']);
        }

        if ($blog_page_banner) {
            $this->removeFile($old_blog_page_banner);
            $input['blog_page_banner'] = $blog_page_banner;
        } else {
            unset($input['blog_page_banner']);
        }
        
        if ($team_page_banner) {
            $this->removeFile($old_team_page_banner);
            $input['team_page_banner'] = $team_page_banner;
        } else {
            unset($input['team_page_banner']);
        }

        if ($service_page_banner) {
            $this->removeFile($old_service_page_banner);
            $input['service_page_banner'] = $service_page_banner;
        } else {
            unset($input['service_page_banner']);
        }

        if ($getinvolve_page_banner) {
            $this->removeFile($old_getinvolve_page_banner);
            $input['getinvolve_page_banner'] = $getinvolve_page_banner;
        } else {
            unset($input['getinvolve_page_banner']);
        }
        if ($membership_page_banner) {
            $this->removeFile($old_membership_page_banner);
            $input['membership_page_banner'] = $membership_page_banner;
        } else {
            unset($input['membership_page_banner']);
        }

        if ($volunteer_page_banner) {
            $this->removeFile($old_volunteer_page_banner);
            $input['volunteer_page_banner'] = $volunteer_page_banner;
        } else {
            unset($input['volunteer_page_banner']);
        }

        if ($support_page_banner) {
            $this->removeFile($old_support_page_banner);
            $input['support_page_banner'] = $support_page_banner;
        } else {
            unset($input['support_page_banner']);
        }
        
        if ($awareness_page_banner) {
            $this->removeFile($old_awareness_page_banner);
            $input['awareness_page_banner'] = $awareness_page_banner;
        } else {
            unset($input['awareness_page_banner']);
        }

        if ($singlepages_page_banner) {
            $this->removeFile($old_singlepages_page_banner);
            $input['singlepages_page_banner'] = $singlepages_page_banner;
        } else {
            unset($input['singlepages_page_banner']);
        }
        //end

        foreach ($input as $key => $value) {
            $setting->updateOrCreate(['key' => $key,], [
                'key' => $key,
                'value' => $value,
            ]);
        }
        return redirect()->back()->with('message', 'Setting Updated Successfully');
    }


    public function fileUpload(Request $request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
            $destinationPath = public_path() . '/admin/images/setting';
            $imageName = date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
            return $imageName;
        } else {
            return null;
        }
    }

    public function removeFile($file)
    {
        $path = public_path() . '/admin/images/setting/' . $file;
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
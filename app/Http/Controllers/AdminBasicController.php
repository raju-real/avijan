<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminBasicController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function updateWebsiteSettings(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|string|max:100',
            'email' => 'required|email|max:50',
            'mobile' => 'required|max:20',
            'phone' => 'required|max:20',
            'address' => 'required|string|max:2000',
            'google_map_url' => 'nullable|sometimes|string|max:2000',
            'facebook_url' => 'nullable|sometimes|url|max:2000',
            'linkedin_url' => 'nullable|sometimes|url|max:2000',
            'about_us_image' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'about_us_title' => 'nullable|sometimes|string|max:2000',
            'about_us' => 'required|string|max:5000',
            'mission_vission' => 'nullable|sometimes|string|max:5000',
            'privacy_policy' => 'nullable|sometimes|string|max:5000',
            'footer_text' => 'nullable|sometimes|string|max:2000',
        ]);

        // Fetch all keys from the request
        $keys = array_keys($request->all());

        // Prepare the setting data array
        $setting_data = [];

        foreach ($keys as $key) {
            $setting_data[$key] = $request->input($key, '');
        }
        if ($request->hasFile('about_us_image')) {
            $setting_data['about_us_image'] = uploadImage($request->file('about_us_image'), 'assets/files/images/website');
        } else {
            $setting_data['about_us_image'] = siteSetting()['about_us_image'];
        }

        // Convert the settings data to JSON and save it
        $newJsonString = json_encode($setting_data, JSON_PRETTY_PRINT);
        file_put_contents(base_path('assets/json/site_setting.json'), $newJsonString);

        return redirect()->route('admin.website-settings')->with(updateMessage());
    }

    public function logout()
    {
        Auth::logout();
        Session::reflash();
        return redirect()->route('home');
    }
}

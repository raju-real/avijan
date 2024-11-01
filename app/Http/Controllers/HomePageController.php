<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function home() {
        //return sliderImages();
        return view('website.pages.home');
    }

    public function eventDetails($slug) {
        $event = Event::whereSlug($slug)->firstOrFail();
        return view('website.pages.event_details',compact('event'));
    }

    public function adminLogin(Request $request) {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email, 
            'password' => $request->password
        ];
        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->intended(route('admin.dashboard'));
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'))
                ->with('message','Email or Password not matched!');
        }
    }
}

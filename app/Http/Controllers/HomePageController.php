<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Mail\SendMail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function articleDetails($slug) {
        $article = Article::whereSlug($slug)->firstOrFail();
        return view('website.pages.article_details',compact('article'));
    }

    public function storeMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'mobile' => 'required|max:20',
            'message' => 'required|max:1000'
        ]);
        $mail_data = [
            'subject' => $request->name.' wants to contact with you',
            'body' => $request->message,
            'title' => 'Someone wants to contact with you.',
            'mobile' => $request->mobile,
            'name' => $request->name,
            'email' => $request->email
        ];

        try {
            $mailSent = Mail::to(siteSetting()['email'])->send(new SendMail($mail_data));

            if (!$mailSent) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Your message has been sent successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Mail sending success, but no recipients accepted.'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Message not sent. Something went wrong!'
            ]);
        }
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
